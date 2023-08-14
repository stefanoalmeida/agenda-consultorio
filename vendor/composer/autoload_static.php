<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e200e7f562bd0f64e2b4843e30d153d
{
    public static $files = array (
        'fe3952da990a042ed345048cdd96dbab' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'C' => 
        array (
            'CoffeeCode\\DataLayer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'CoffeeCode\\DataLayer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/datalayer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2e200e7f562bd0f64e2b4843e30d153d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2e200e7f562bd0f64e2b4843e30d153d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2e200e7f562bd0f64e2b4843e30d153d::$classMap;

        }, null, ClassLoader::class);
    }
}