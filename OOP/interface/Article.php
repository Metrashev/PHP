<?php

include '../interface/IWriteInterface.php';
include '../interface/FileWriter.php';
include '../interface/TestWriter.php';

class Article {

    private $data;

    public function write(IWriteInterface $obj) {

        $obj->write($this->data);
    }

}

$a = new Article();
$writer = new FileWriter();
$testWriter = new TestWriter();
$a->write($writer);
