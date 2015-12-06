<?php
/**
 * phpDocumentor
 *
 * PHP Version 7.0
 *
 * @copyright 2015 Tomasz Ignaszak
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace Ignaszak\Registry;

/**
 * 
 * @author Tomasz Ignaszak <tomek.ignaszak@gmail.com>
 * @link
 *
 */
class RequestRegistry implements IRegistry
{

    /**
     * @var object[]
     */
    private $registryArray = array();

    /**
     * @param string $name
     * @param object $value
     */
    public function set(string $name, $value)
    {
        $this->registryArray[$name] = $value;
    }

    /**
     * @param string $name
     * @return object|null
     */
    public function get(string $name)
    {
        if ($this->isAdded($name))
            return $this->registryArray[$name];

        return null;
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function remove(string $name): bool
    {
        if ($this->isAdded($name)) {
            unset($this->registryArray[$name]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function isAdded(string $name): bool
    {
        if (array_key_exists($name, $this->registryArray))
            return true;

            return false;
    }

}
