<?php
//Сесиите помагат да бъдат запазени определени данни за последващо използване. 
//Това позволява да се изградят по-персонализирани приложения.
//След като се стартира сесия, header-ите са изпратени ---
//т.е името на бисквитката със стойността вече е изпратена
//Бисквитките се използват за разпознаване данните на потребителя.
session_start();
include '../Session/header.php';
if ($_SESSION['isLogged'] = TRUE) {
    echo 'Здрасти!<a href="destroy.php">Изход</а>';
} else 

    if ($_POST) {
        $username = trim($_POST['username']);
        $pass = trim($_POST['pass']);
        if ($username == 'Vladimir' && $pass == 'qwerty') {
            $_SESSION['isLogged'] = TRUE;
            header('Location Session/Sess.php');
            exit; 
        } else {
            echo 'Грешни данни';
        }
    }
    ?>

<form method="POST">
    <div>Име:<input type="text" name="username" /></div>
    <div>Парола:<input type="password" name="pass " /></div>
    <div><input type="submit" value="Вход" /></div>
</form>