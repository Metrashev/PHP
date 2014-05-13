<?php
//Това е вариация на Singleton 
// Позволява ни да имаме един глобален обект , който има само една инстанция. Може 
// да си слагаме стойности вътре и да ги взимаме от някъде другаде.
class Registry {

    private static $instance = NULL;
    private $data;

    public function __construct() {
        
    }

    public function setValue($key, $val) {
        $this->data[$key] = $val;
    }

    public function getValue($key) {
        return $this->data[$key];
    }

    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new Registry();
        }
        return self::$instance;
    }
}

$registry = Registry::getInstance();
$registry->setValue('username', 'ivan');

//друга променлива която изкарва абсолютно същата стойност
$registry33 = Registry::getInstance();

echo $registry->getValue('username');