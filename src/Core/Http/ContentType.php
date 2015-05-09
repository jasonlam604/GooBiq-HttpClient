<?php
namespace GooBiq\Core\Http;

/**
 * ContentType
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
class ContentType
{
    /* Definitely NOT a full list, will need to add this over time */
    const APPLICATION_JSON = 'application/json';

    const APPLICATION_JSON_UTF8 = 'application/json; charset=utf-8';

    const APPLICATION_XML = 'application/xml';

    const APPLICATION_XHTML = 'application/html+xml';

    const APPLICATION_FORM = 'application/x-www-form-urlencoded';

    const APPLICATION_UPLOAD = 'multipart/form-data';

    const APPLICATION_PLAIN = 'text/plain';

    const APPLICATION_JS = 'text/javascript';

    const APPLICATION_HTML = 'text/html';

    const APPLICATION_YAML = 'application/x-yaml';

    const APPLICATION_CSV = 'text/csv';

    const APPPLICATION_NONE = '';

    private $type;

    final public function __construct($type)
    {
        if (empty($type))
            $this->type = self::APPPLICATION_NONE;
        else
            $this->type = $type;
    }

    public function equals(ContentType $contentType)
    {
        if ($contentType != NULL && $this->toString() == $contentType->toString())
            return true;
        else
            return false;
    }

    public function toString()
    {
        return $this->type;
    }
}