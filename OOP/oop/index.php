<?php

$user = new User(30, 'Miro');
//echo $user->getAge();
$user->username = 'ivan';
$user->email = 'bla@buk.com';

echo $user->username;

class User {

    private $username;
    private $age;
    private $email;
    private $data = array();

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getData() {
        return $this->data;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setData($data) {
        $this->data = $data;
    }

        //Не е предпочитан вариант за конструктор
//    public function User() {
//        echo 'GO!';
//    }
//    
//    public function __construct($age, $username) {
//        $this->age = $age;
//        $this->username = $username;
    //echo 'init_1';
//    }
    public function __set($name, $value) {
//        echo $name.''.$value;
        $this->data[$name] = $value;
    }

    public function __get($name) {
//        echo $name;
//        exit;
        return $this->data[$name];
    }

//    public function __destruct() {
//        echo 'ExiT';
//    }        




    public function normalizationName() {
        return strtoupper($this->username);
    }

    private function setAge($age) {
        if ($age > 17 && $age < 61) {
            $this->age = $age;
        }
    }

    public function getAge() {
        return $this->age;
    }

}
