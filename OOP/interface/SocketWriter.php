<?php

class SocketWriter implements IWriteInterface{
    
     public function write($data) {
         echo 'write to socket';
    }

}
