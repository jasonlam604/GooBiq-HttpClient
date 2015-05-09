<?php
namespace GooBiq\Core\Http;

/**
 * HttpResponse
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
class HttpResponse
{

    private $requestUrl;

    private $redirectUrl;

    private $redirectCount;

    private $redirectTime;

    private $httpCode;

    private $headerSize;

    private $requestSize;

    private $fileTime;

    private $sslVerifyResult;

    private $certInfo;

    private $downloadContentLength;

    private $uploadConentLength;

    private $ip;

    private $port;

    private $errorCode;

    private $errorMsg;

    private $content;

    private $contentType;
    
    /*
     * @var HttpHeader $httpHeader
     */
    private $httpHeader;

    public function __construct()
    {}

    /**
     *
     * @param array $data            
     */
    public function loadFromCurl($data)
    {
        $this->requestUrl = $data['url'];
        $this->redirectTime = $data['redirect_time'];
        $this->redirectUrl = $data['redirect_url'];
        $this->redirectCount = (int) $data['redirect_count'];
        $this->contentType = $data['content_type'];
        $this->httpCode = (int) $data['http_code'];
        $this->headerSize = $data['header_size'];
        $this->requestSize = $data['request_size'];
        $this->fileTime = $data['filetime'];
        $this->sslVerifyResult = $data['ssl_verify_result'];
        $this->certInfo = $data['certinfo'];
        $this->downloadContentLength = $data['download_content_length'];
        $this->uploadConentLength = $data['upload_content_length'];
        $this->ip = $data['primary_ip'];
        $this->port = $data['primary_port'];
        $this->errorCode = $data['errno'];
        $this->errorMsg = $data['errmsg'];
        $this->content = $data['content'];
        
        $this->httpHeader = new HttpHeader($data['header']);
    }

    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function getRedirectCount()
    {
        return $this->redirectCount;
    }

    public function getRedirectTime()
    {
        return $this->redirectTime;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function getHttpCodeText()
    {
        return HttpCode::getText($this->httpCode);
    }

    public function getHeaderSize()
    {
        return $this->headerSize;
    }

    public function getRequestSize()
    {
        return $this->requestSize;
    }

    public function getFileTime()
    {
        return $this->fileTime;
    }

    public function getSSLVerifyResult()
    {
        return $this->sslVerifyResult;
    }

    public function getCertInfo()
    {
        return $this->certInfo;
    }

    public function getDownloadContentLength()
    {
        return $this->downloadContentLength;
    }

    public function getUploadContentLength()
    {
        return $this->uploadContentLength;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function getContentType()
    {
        return $this->contentType;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getHeader()
    {
        return $this->httpHeader;
    }
}