<?php
/**
 * Created by PhpStorm.
 * User: aabukhalil
 * Date: 7/12/15
 * Time: 12:54 AM
 */
class Model{
    protected static $conn;
    public static function init(){
        global $settings;
        Model::$conn =
            new PDO("mysql:host={$settings['HOST']};dbname={$settings['DB_NAME']};charset=utf8",
                $settings['USER'],$settings['PASSWD']);
    }

    protected function __construct()
    {
        Model::init();
    }

}
