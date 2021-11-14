<?php

namespace Comodojo\Foundation\Base;

use \Comodojo\Foundation\Base\{
    Configuration,
    ConfigurationTrait,
    PrefixTrait
};

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

abstract class AbstractVersion
{
    use ConfigurationTrait;
    use PrefixTrait;

    protected string $fullVersionTemplate = "\n{ascii}\n{description} ({version})\n";
    protected string $configurationItemOverrideTemplate = "{prefix}version-{item}";

    /**
     * Component name
     *
     * @var string
     */
    protected string $name;

    /**
     * Brief description
     *
     * @var string
     */
    protected string $description;

    /**
     * Current version
     *
     * @var string
     */
    protected string $version;

    /**
     * Ascii logo
     *
     * @var     string
     */
    protected string $ascii;

    /**
     * Create a version identifier class
     *
     * @param Configuration|null $configuration
     */
    public function __construct(?Configuration $configuration = null)
    {
        if ($configuration !== null) {
            $this->setConfiguration($configuration);
        }
    }

    /**
     * Get the version name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getConfigurationOverride("name") ?? $this->name;
    }

    /**
     * Get the version description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getConfigurationOverride("description") ?? $this->description;
    }

    /**
     * Get the current version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->getConfigurationOverride("version") ?? $this->version;
    }

    /**
     * Get the version ascii
     *
     * @return string
     */
    public function getAscii()
    {
        return $this->getConfigurationOverride("ascii") ?? $this->ascii;
    }

    /**
     * Return a composed-version of nominal values
     *
     * @return  string
     */
    public function getFullDescription()
    {
        return strtr($this->fullVersionTemplate, [
            "{name}" => $this->getName(),
            "{description}" => $this->getDescription(),
            "{version}" => $this->getVersion(),
            "{ascii}" => $this->getAscii(),
        ]);
    }

    protected function getConfigurationOverride(string $item): ?string
    {
        if ($this->getConfiguration() === null) {
            return null;
        }
        
        $ovverrideName = strtr($this->configurationItemOverrideTemplate, [
            "{prefix}" => $this->getPrefix(),
            "{item}" => $item
        ]);
        return $this->getConfiguration()->get($ovverrideName);
    }
}
