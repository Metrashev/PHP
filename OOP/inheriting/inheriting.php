<?php
class Human extends Mamal{
    public function playLOL() {
        echo 'playing';
    }
    //overloading
    public function move() {
        parent::move();
        echo 'human moving';
    }
}

class Monkey extends Mamal{
    public function throwbanana() {
        echo 'eat banana';
    }
}
class Mamal {

    public function move() {
        echo 'move body....<br>';
    }

    public function eat() {
        echo 'eat';
    }

}
$ivan = new Human();
$ivan->move();