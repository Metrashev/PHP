<?php

class Stat {

    public static $username;
    
    public static function getUsername() {
        echo 'Statiiiic';
    }

    public static function setUsername($username) {
        self::$username = $username;
    }
}
//Тук не създаваме инстанция, а static е глобално и е с предимство пред инстанциите на класа
Stat::$username='misho';
echo Stat::$username;

//Викане на метод чрез static
Stat::getUsername();