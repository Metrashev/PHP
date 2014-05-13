<?php

//ПЪРВИЯ НАЧИН С md5 и СОЛЧИЦА
//$pass = 'qwerty';
//$salt = 'dgfkgmfgm';
//echo md5(md5($salt).sha1($pass).  md5($salt));
//
//
//ВТОРИ НАЧИН ПО-ЕФЕКТИВЕН
$options = [
    'cost' => 32,
];
echo password_hash("qwerty", PASSWORD_BCRYPT, $options)."\n";