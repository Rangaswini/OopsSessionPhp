<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2cf2474565e61dbb78b5045cf4580b4a
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rivsen\\Demo\\' => 12,
            'Rango\\Registration\\' => 19,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rivsen\\Demo\\' => 
        array (
            0 => __DIR__ . '/..' . '/rivsen/hello-world/src',
        ),
        'Rango\\Registration\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2cf2474565e61dbb78b5045cf4580b4a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2cf2474565e61dbb78b5045cf4580b4a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
