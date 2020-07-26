<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb313b251640d600238777c444207f9bf
{
    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'homevip\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'homevip\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb313b251640d600238777c444207f9bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb313b251640d600238777c444207f9bf::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}