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
declare(strict_types=1);

namespace Ignaszak\Registry;

/**
 *
 * @author Tomasz Ignaszak <tomek.ignaszak@gmail.com>
 * @link
 *
 */
class RegistryFactory
{

    /**
     * @var IRegistry[]
     */
    private static $_registryArray = [];

    /**
     * @param string $registry
     * @return Registry
     */
    public static function start(string $registry = 'request'): Registry
    {
        if (array_key_exists($registry, self::$_registryArray)) {
            return self::$_registryArray[$registry];
        } else {
            self::$_registryArray[$registry] = new Registry(
                self::getRegistryInstance($registry)
            );
            return self::$_registryArray[$registry];
        }
    }

    /**
     * @param string $registry
     * @return string
     * @throws Exception
     */
    private static function getRegistryInstance(string $registry): Scope\IRegistry
    {
        switch ($registry) {
            case 'request':
                return new Scope\RequestRegistry();
            break;
            case 'session':
                return new Scope\SessionRegistry();
            break;
            case 'cookie':
                return new Scope\CookieRegistry();
            break;
            case 'file':
                return new Scope\FileRegistry();
            break;
            default:
                throw new Exception('Incorrect argument');
        }
    }
}
