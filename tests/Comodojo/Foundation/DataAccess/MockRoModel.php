<?php declare(strict_types=1);

namespace Comodojo\Foundation\Tests\DataAccess;

use \Comodojo\Foundation\DataAccess\Model;

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

class MockRoModel extends Model
{

    protected int $mode = self::READONLY;

    protected array $data = [
        "question" => "Ultimate Question of Life, The Universe, and Everything",
        "answer" => 42
    ];

    public function mockSetRaw($name, $value)
    {
        return $this->setRaw($name, $value);
    }
}
