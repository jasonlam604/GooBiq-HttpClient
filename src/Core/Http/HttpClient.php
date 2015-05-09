<?php
namespace GooBiq\Core\Http;

use GooBiq\Core\Exception\ExceptionCode;
use GooBiq\Core\Exception\GooBiqCoreException;

/**
 * HttpClient
 *
 * Class for HTTP request with request options. It doesn't not attempt to enforce RFC standards
 * due 3rd party APIs that do not adhere to the RFC 100%. For example, DELETE technically doesn't
 * expect a payload in the body but a Vendor API may expecting a payload.
 *
 * @author Jason Lam <jasonlam604@gmail.com>
 * @copyright 2015 Jason Lam
 * @package /GooBiq/Core/Http
 *         
 * @license MIT LICENSE
 *         
 *          Permission is hereby granted, free of charge, to any person obtaining
 *          a copy of this software and associated documentation files (the
 *          "Software"), to deal in the Software without restriction, including
 *          without limitation the rights to use, copy, modify, merge, publish,
 *          distribute, sublicense, and/or sell copies of the Software, and to
 *          permit persons to whom the Software is furnished to do so, subject to
 *          the following conditions:
 *         
 *          The above copyright notice and this permission notice shall be
 *          included in all copies or substantial portions of the Software.
 *         
 *          THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 *          EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 *          MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 *          NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 *          LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 *          OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 *          WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
class HttpClient
{

    private $request;

    private $header;

    public function __construct()
    {}

    function execute()
    {
        if (empty($this->request))
            throw new GooBiqCoreException('GooBiq\Core\Http\Request not set', ExceptionCode::HTTP_REQUEST_MISSING_REQUEST_OBJECT);
        
        $this->header = '';
        
        $options = array(
            CURLOPT_RETURNTRANSFER => true, // return web page
                                            // CURLOPT_HEADER => true, // return header info
            CURLOPT_FOLLOWLOCATION => true, // follow redirects
            CURLOPT_ENCODING => "", // handle all encodings
                                          // CURLOPT_USERAGENT => "spider", // who am i
            CURLOPT_AUTOREFERER => true, // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
            CURLOPT_TIMEOUT => 120, // timeout on response
            CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
            CURLOPT_HEADERFUNCTION => array(
                $this,
                'headerCallback'
            )
        );
        
        if ($this->request->isSSL() && $this->request->isIgnoreBadSSLCert()) {
            $options[CURLOPT_SSL_VERIFYPEER] = false;
        }
        
        $ch = curl_init($this->request->getUrl());
        curl_setopt_array($ch, $options);
        
        if (Value::notEmpty($this->request->getUserAgent())) {
            curl_setopt($ch, CURLOPT_USERAGENT, $this->request->getUserAgent());
        }
        
        if ($this->request->isAuth() && $this->request->getAuthType() == HttpRequest::AUTH_TYPE_BASIC_AUTHENICATION) {
            curl_setopt($ch, CURLOPT_USERPWD, '$this->request->getUsername():$this->request->getUsername()');
        }
        
        /*
         * Does not explicityly check for a METHOD that allows for Body like POST
         * Not all APIs adhere standards
         */
        if ($this->request->isBodyContent()) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->request->getBodyContent());
        }
        
        if ($this->request->isSession()) {
            curl_setopt($ch, CURLOPT_COOKIE, $this->request->getSession());
        }
        
        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $data = curl_getinfo($ch);
        curl_close($ch);
        
        $data['errno'] = $err;
        $data['errmsg'] = $errmsg;
        $data['content'] = $content;
        $data['header'] = $this->header;
        
        $response = new HttpResponse();
        $response->loadFromCurl($data);
        
        return $response;
    }

    /**
     * This callback is called for each line in the header response.
     * Line data is concatenated
     */
    private function headerCallback($ch, $header_line)
    {
        $this->header .= $header_line;
        return strlen($header_line);
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }
}