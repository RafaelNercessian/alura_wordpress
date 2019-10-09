<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf9510a10d87df6dcfa5125ace2608933
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf9510a10d87df6dcfa5125ace2608933::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf9510a10d87df6dcfa5125ace2608933::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}