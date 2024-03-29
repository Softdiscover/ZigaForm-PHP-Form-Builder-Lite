<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c0de98131857fccfd37a29a51864dce
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'ReCaptcha\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ReCaptcha\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/ReCaptcha',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c0de98131857fccfd37a29a51864dce::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c0de98131857fccfd37a29a51864dce::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c0de98131857fccfd37a29a51864dce::$classMap;

        }, null, ClassLoader::class);
    }
}
