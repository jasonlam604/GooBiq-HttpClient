<?php
namespace GooBiq\Core\Http;

/**
 * HttpMethod
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
class HttpMethod
{

    const HEAD = 'HEAD';

    const GET = 'GET';

    const POST = 'POST';

    const PUT = 'PUT';

    const DELETE = 'DELETE';

    const PATCH = 'PATCH';

    const OPTIONS = 'OPTIONS';

    const TRACE = 'TRACE';

    const CONNECT = 'CONNECT';

    const PURGE = 'PURGE';

    const LINK = 'LINK';

    const UNLINK = 'UNLINK';

    private static $httpMethods = array(
        self::HEAD,
        self::GET,
        self::POST,
        self::PUT,
        self::DELETE,
        self::PATCH,
        self::OPTIONS,
        self::TRACE,
        self::CONNECT,
        self::PURGE,
        self::LINK,
        self::UNLINK
    );

    public static function validMethod($httpMethod)
    {
        return in_array($httpMethod, self::$httpMethods);
    }

    public static function validMethods(array $httpMethods)
    {
        foreach ($httpMethods as $httpMethod) {
            if (! self::validMethod($httpMethod))
                return false;
        }
        return true;
    }
}
