<?php
$con = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$con) {
    echo 'no database connection!';
}
mysqli_set_charset($con, 'utf8');

$stmt = mysqli_prepare($con,'SELECT user_name, age FROM users' );
if (!$stmt) {
    echo 'Error';
}
//mysqli_stmt_bind_param($stmt, 's', $_GET['mig']);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $user_name,$age);
while (mysqli_stmt_fetch($stmt)) {
echo $user_name.'----'.$age.'<br>';
    
}
