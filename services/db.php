<?php
class Database
{
    private static $instance = null;

    private static function getInstance(){
        if (self::$instance){
            return self::$instance;
        }

        $iniFile = __DIR__ . "/config.ini";
        $ini_parsed = parse_ini_file($iniFile,true);

        $driver = $ini_parsed [ "db_driver" ] ;
        $user = $ini_parsed [ "db_user" ] ;
        $password = $ini_parsed [ "db_password" ] ;
        $options = $ini_parsed [ "db_options" ] ;
        $attributes = $ini_parsed [ "db_attributes" ] ;

        $dsn = "${driver}:" ;

        foreach ( $ini_parsed [ "dsn" ] as $k => $v ) {
            $dsn .= "${k}=${v};" ;
        }

        //hardcode charset
        $dsn .= "charset=utf8;";

        self::$instance = new PDO($dsn,$user,$password,$options);

        //set atttributes
        foreach($attributes as $key => $val){
            self::$instance->setAttribute(constant("PDO::{$key}"), constant("PDO::{$val}"));
        }

        return self::$instance;
    }

    public static function __callStatic($name, $args){
        $call = array( self::getInstance(), $name);
        return call_user_func_array($call, $args);
    }

}