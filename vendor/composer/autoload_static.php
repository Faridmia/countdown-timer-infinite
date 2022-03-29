<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe3c40bf8d1f2d25f0f7a131242036a0
{
    public static $files = array (
        '87e1c8698e69db206be94ad1a227aae8' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CountdownCdt\\Helper\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CountdownCdt\\Helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe3c40bf8d1f2d25f0f7a131242036a0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe3c40bf8d1f2d25f0f7a131242036a0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe3c40bf8d1f2d25f0f7a131242036a0::$classMap;

        }, null, ClassLoader::class);
    }
}