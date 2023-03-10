<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita4a2ad1c8d21f7a44653906e508d7f7a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita4a2ad1c8d21f7a44653906e508d7f7a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita4a2ad1c8d21f7a44653906e508d7f7a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita4a2ad1c8d21f7a44653906e508d7f7a::$classMap;

        }, null, ClassLoader::class);
    }
}
