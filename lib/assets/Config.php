<?php

namespace app\assets;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class Config
{

    /**
     * Application's essential credentials
     *
     * @param array $config
     *
     */
    protected static $config = [
        'mysql' => [
            'server'    =>  'localhost',
            'host'      =>  'root',
            'password'  =>  '',
            'dbName'    =>  'housing-quest'
        ],
    ];



    /**
     * Returns the value of a config parameter
     *
     * @param string $param
     *
     * @return string $config
     */
    public static function get(string $param)
    {
        $paths      =   explode('/', $param);
        $config     =   static::$config;

        foreach ($paths as $path) {
            if (isset($config[$path])) {
                $config = $config[$path];
            } else {
                return false;
            }
        }

        return $config;
    }
}
