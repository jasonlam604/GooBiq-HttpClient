<?php
namespace GooBiq\Core\Http;

use GooBiq\Core\Http\HttpMethod;

/**
 * HttpRequest
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
class HttpRequest
{

    const AUTH_TYPE_BASIC_AUTHENICATION = "_BASIC_AUTHENTICATION_";

    private $validAuths = array(
        HttpRequest::AUTH_TYPE_BASIC_AUTHENICATION
    );

    private $url;

    private $method;

    private $ignoreBadSSLCert;

    private $bodyContent;

    private $session;

    private $useSession;

    private $isAuth;

    private $authType;

    private $username;

    private $password;

    private $userAgent;

    public function __construct()
    {
        $ignoreBadSSLCert->false;
    }

    public function isSSL()
    {
        if (! empty($_SERVER['https']))
            return true;
        
        if (! empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
            return true;
        
        return false;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function ignoreBadSSLCert()
    {
        $this->ignoreBadSSLCert = true;
    }

    public function isIgnoreBadSSLCert()
    {
        return $this->ignoreBadSSLCert;
    }

    public function setBodyContent($bodyContent)
    {
        $this->bodyContent = $bodyContent;
    }

    public function getBodyContent()
    {
        return $this->bodyContent;
    }

    public function clearBodyContent()
    {
        $this->bodyContent = null;
    }

    public function isBodyContent()
    {
        return $this->bodyContent != null ? true : false;
    }

    public function setSession($session)
    {
        $this->session = $session;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function enableSession()
    {
        $this->useSession = true;
    }

    public function disableSession()
    {
        $this->useSession = false;
    }

    public function isSession()
    {
        return $this->useSession;
    }

    public function clearCredentials()
    {
        $this->username = null;
        $this->password = null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setCredentials($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function setAuthType($authType)
    {
        if (in_array($authType, $this->validAuths)) {
            $this->authType = $authType;
        } else {
            throw new HttpException('Invalid Authentication Type');
        }
    }

    public function getAuthType()
    {
        return $this->authType;
    }

    public function isAuth()
    {
        return $this->isAuth;
    }

    public function enableAuth()
    {
        $this->isAuth = true;
    }

    public function disableAuth()
    {
        $this->isAuth = false;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }
}