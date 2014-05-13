
<?php
//ПРАВИЛНИЯ НАЧИН ЗА СТАРТИРАНЕ НА СЕСИЯ В PHP
session_name('MySecuritySession');
//Задаваме тая функция за бисквитката с определени параметри:
//      1)живота на бисквитката - 3600 секунди(1час);
//      2)пътя
//      3)домейн 
//      4)дали е секюрната false - защото тоя сайт не работи в https режим - това също е важно да е true
//      5)дали работи в httpsonly режим  - много е важно да е true
session_set_cookie_params(3600, '/','localhost', false,true);
session_start();
