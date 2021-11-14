<?php

namespace Comodojo\Foundation\Validation;

/**
 * @package     Comodojo Foundation
 * @author      Marco Giovinazzi <marco.giovinazzi@comodojo.org>
 * @license     MIT
 *
 * LICENSE:
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

class DataFilter
{

    /**
     * Filter an integer.
     *
     * This method is a shortcut to filter_var using FILTER_VALIDATE_INT
     *
     * @param int $int Int to filter
     * @param int $min Min value (default to ~PHP_INT_MAX)
     * @param int $max Max value (default to PHP_INT_MAX)
     * @param int $default Default value
     * @return int
     */
    public static function filterInteger(
        int $int,
        int $min = ~PHP_INT_MAX,
        int $max = PHP_INT_MAX,
        int $default = 0)
    {
        return filter_var($int, FILTER_VALIDATE_INT, [
            'options' => [
                'default' => $default,
                'min_range' => $min,
                'max_range' => $max
            ]
        ]);
    }

    /**
     * Filter a TCP/UDP port
     *
     * @param int $port
     * @param int $default
     * @return int
     */
    public static function filterPort(int $port, int $default = 80)
    {
        return self::filterInteger($port, 1, 65535, $default);
    }

    /**
     * filter a bool.
     *
     * This method is a shortcut to filter_var using FILTER_VALIDATE_BOOLEAN
     *
     * @param bool $bool
     * @param bool $default
     * @return bool
     */
    public static function filterBoolean($bool, bool $default = false)
    {
        return filter_var($bool, FILTER_VALIDATE_BOOLEAN, [
            'options' => [
                'default' => $default
            ]
        ]);
    }
}
