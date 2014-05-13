<?php

class Registry {

    private static $data = array();

    public static function setData($key, $val) {
        self::$data[$key] = $val;
    }
    public static function getData($key) {
        return self::$data[$key];
    }
}

Registry::setData('username', 'mico');
echo Registry::getData('username');