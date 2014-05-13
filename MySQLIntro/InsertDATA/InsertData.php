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
for ($i = 0; $i < 500; $i++) {
    $sql = 'INSERT INTO users (user_name, age, is_active) VALUES("USER'.$i.'",'.rand(3, 65).','.rand(0, 1).')'; 
    mysqli_query($connection, $sql);
}

