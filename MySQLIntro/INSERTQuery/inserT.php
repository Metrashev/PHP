<?php
include '../includes/header.php';
?>

<form method="POST">
    <textarea name="txt"></textarea>
    <input type="submit" value="Добави"/>
    
</form>
<?php
$connection = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$connection) {
    echo 'no database connection!';
    exit;
}
mysqli_set_charset($connection, 'utf8');

if($_POST){
    $msg= trim($_POST['txt']);
    //ВИНАГИ ТРЯБВА ДА ПРЕКАРВАМЕ ДАННИТЕ ПРЕЗ ТАЯ ФУНКЦИЯ!!!
    $msg = mysqli_real_escape_string($connection,$msg);
    $sql = 'INSERT INTO msg (msg_text) VALUES("'.$msg.'")';
    if(mysqli_query($connection, $sql)){
        echo 'OK';
    } else {
        echo 'Error';
        echo mysql_error($connection);
    }
}

