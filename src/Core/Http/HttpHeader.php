<?php
namespace GooBiq\Core\Http;

/**
 * HttpHeader
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
class HttpHeader
{

    private $rawHeaderContent;

    private $headers;

    public function __construct($rawHeaderContent)
    {
        $this->rawHeaderContent = $rawHeaderContent;
        if ($this->rawHeaderContent != null) {
            $this->parseHeaderInfo();
        }
    }

    private function parseHeaderInfo()
    {
        $this->headers = array();
        
        $header_text = substr($this->rawHeaderContent, 0, strpos($this->rawHeaderContent, "\r\n\r\n"));
        
        foreach (explode("\r\n", $header_text) as $i => $line) {
            if ($i === 0) {
                $this->headers['http_code'] = $line;
            } else {
                list ($key, $value) = explode(': ', $line);
                $this->headers[$key] = $value;
            }
        }
    }

    public function getHttpCode()
    {
        return $this->headers['http_code'];
    }

    public function getDate()
    {
        return $this->headers['Date'];
    }

    public function getServer()
    {
        return $this->headers['Server'];
    }

    public function getXPoweredBy()
    {
        return $this->headers['X-Powered-By'];
    }

    public function getCookie()
    {
        return $this->headers['Set-Cookie'];
    }

    public function getSessionId()
    {
        return $this->getCookie();
    }

    public function getExpires()
    {
        return $this->headers['Expires'];
    }

    public function getCacheControl()
    {
        return $this->headers['Cache-Control'];
    }

    public function getPragma()
    {
        return $this->headers['Pragma'];
    }

    public function getContentLength()
    {
        return $this->headers['Content-Length'];
    }

    public function getContentType()
    {
        return $this->headers['Content-Type'];
    }

    public function toArray()
    {
        return $this->headers;
    }
}