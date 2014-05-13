<?php

$con = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$con) {
    echo 'no database connection!';
}
mysqli_set_charset($con, 'utf8');

$stmt = mysqli_prepare($con, 'INSERT INTO users VALUES (?, ?, ?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'isiis', $user_id, $user_name, $age, $is_active, $pass);
$user_id = 1007;
$user_name = 'SOFIA';
$age = 25;
$is_active = 0;
$pass = 'mechka';
mysqli_stmt_execute($stmt);
printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));