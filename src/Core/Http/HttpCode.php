<?php
namespace GooBiq\Core\Http;

use GooBiq\Core\Http\HttpException;

/**
 * HttpCode
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
class HttpCode
{

    const HTTP_CONTINUE = 100;

    const HTTP_SWITCHING_PROTOCOLS = 101;

    const HTTP_OK = 200;

    const HTTP_CREATED = 201;

    const HTTP_ACCEPTED = 202;

    const HTTP_NONAUTHORITATIVE_INFORMATION = 203;

    const HTTP_NO_CONTENT = 204;

    const HTTP_RESET_CONTENT = 205;

    const HTTP_PARTIAL_CONTENT = 206;

    const HTTP_MULTIPLE_CHOICES = 300;

    const HTTP_MOVED_PERMANENTLY = 301;

    const HTTP_FOUND = 302;

    const HTTP_SEE_OTHER = 303;

    const HTTP_NOT_MODIFIED = 304;

    const HTTP_USE_PROXY = 305;

    const HTTP_UNUSED = 306;

    const HTTP_TEMPORARY_REDIRECT = 307;

    const HTTP_BAD_REQUEST = 400;

    const HTTP_UNAUTHORIZED = 401;

    const HTTP_PAYMENT_REQUIRED = 402;

    const HTTP_FORBIDDEN = 403;

    const HTTP_NOT_FOUND = 404;

    const HTTP_METHOD_NOT_ALLOWED = 405;

    const HTTP_NOT_ACCEPTABLE = 406;

    const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;

    const HTTP_REQUEST_TIMEOUT = 408;

    const HTTP_CONFLICT = 409;

    const HTTP_GONE = 410;

    const HTTP_LENGTH_REQUIRED = 411;

    const HTTP_PRECONDITION_FAILED = 412;

    const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;

    const HTTP_REQUEST_URI_TOO_LONG = 414;

    const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;

    const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;

    const HTTP_EXPECTATION_FAILED = 417;

    const HTTP_INTERNAL_SERVER_ERROR = 500;

    const HTTP_NOT_IMPLEMENTED = 501;

    const HTTP_BAD_GATEWAY = 502;

    const HTTP_SERVICE_UNAVAILABLE = 503;

    const HTTP_GATEWAY_TIMEOUT = 504;

    const HTTP_VERSION_NOT_SUPPORTED = 505;
    
    /* Not Used */
    private function __construct()
    {}

    private function __clone()
    {}

    public static function getText($code)
    {
        if ($code == null || ! is_numeric($code))
            throw new HttpCodeException('Invalid HTTP Code', $code);
        
        switch ($code) {
            case self::HTTP_CONTINUE:
                $text = 'Continue';
                break;
            case self::HTTP_SWITCHING_PROTOCOLS:
                $text = 'Switching Protocols';
                break;
            case self::HTTP_OK:
                $text = 'OK';
                break;
            case self::HTTP_CREATED:
                $text = 'Created';
                break;
            case self::HTTP_ACCEPTED:
                $text = 'Accepted';
                break;
            case self::HTTP_NONAUTHORITATIVE_INFORMATION:
                $text = 'Non-Authoritative Information';
                break;
            case self::HTTP_NO_CONTENT:
                $text = 'No Content';
                break;
            case self::HTTP_RESET_CONTENT:
                $text = 'Reset Content';
                break;
            case self::HTTP_PARTIAL_CONTENT:
                $text = 'Partial Content';
                break;
            case self::HTTP_MULTIPLE_CHOICES:
                $text = 'Multiple Choices';
                break;
            case self::HTTP_MOVED_PERMANENTLY:
                $text = 'Moved Permanently';
                break;
            case self::HTTP_FOUND:
                $text = 'Moved Temporarily';
                break;
            case self::HTTP_SEE_OTHER:
                $text = 'See Other';
                break;
            case self::HTTP_NOT_MODIFIED:
                $text = 'Not Modified';
                break;
            case self::HTTP_UNUSED:
                $text = 'Use Proxy';
                break;
            case self::HTTP_BAD_REQUEST:
                $text = 'Bad Request';
                break;
            case self::HTTP_UNAUTHORIZED:
                $text = 'Unauthorized';
                break;
            case self::HTTP_PAYMENT_REQUIRED:
                $text = 'Payment Required';
                break;
            case self::HTTP_FORBIDDEN:
                $text = 'Forbidden';
                break;
            case self::HTTP_NOT_FOUND:
                $text = 'Not Found';
                break;
            case self::HTTP_METHOD_NOT_ALLOWED:
                $text = 'Method Not Allowed';
                break;
            case self::HTTP_NOT_ACCEPTABLE:
                $text = 'Not Acceptable';
                break;
            case self::HTTP_PROXY_AUTHENTICATION_REQUIRED:
                $text = 'Proxy Authentication Required';
                break;
            case self::HTTP_REQUEST_TIMEOUT:
                $text = 'Request Time-out';
                break;
            case self::HTTP_CONFLICT:
                $text = 'Conflict';
                break;
            case self::HTTP_GONE:
                $text = 'Gone';
                break;
            case self::HTTP_LENGTH_REQUIRED:
                $text = 'Length Required';
                break;
            case self::HTTP_PRECONDITION_FAILED:
                $text = 'Precondition Failed';
                break;
            case self::HTTP_REQUEST_ENTITY_TOO_LARGE:
                $text = 'Request Entity Too Large';
                break;
            case self::HTTP_REQUEST_URI_TOO_LONG:
                $text = 'Request-URI Too Large';
                break;
            case self::HTTP_UNSUPPORTED_MEDIA_TYPE:
                $text = 'Unsupported Media Type';
                break;
            case self::HTTP_INTERNAL_SERVER_ERROR:
                $text = 'Internal Server Error';
                break;
            case self::HTTP_NOT_IMPLEMENTED:
                $text = 'Not Implemented';
                break;
            case self::HTTP_BAD_GATEWAY:
                $text = 'Bad Gateway';
                break;
            case self::HTTP_SERVICE_UNAVAILABLE:
                $text = 'Service Unavailable';
                break;
            case self::HTTP_GATEWAY_TIMEOUT:
                $text = 'Gateway Time-out';
                break;
            case self::HTTP_VERSION_NOT_SUPPORTED:
                $text = 'HTTP Version not supported';
                break;
            default:
                throw new HttpException('Unknown HTTP Code', $code);
                break;
        }
        return $text;
    }
}