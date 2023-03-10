<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita4a2ad1c8d21f7a44653906e508d7f7a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInita4a2ad1c8d21f7a44653906e508d7f7a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita4a2ad1c8d21f7a44653906e508d7f7a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita4a2ad1c8d21f7a44653906e508d7f7a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
