<?php
class User {

    private $username;
    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }


}
//Правим достъп чрез инстанция/обект на класа User
$vladi = new User();
$vladi->setUsername('Mig');
echo $vladi->getUsername();
//User::$username = 'Gogo';
//echo User::$username;
