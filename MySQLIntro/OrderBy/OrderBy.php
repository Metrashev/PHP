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
//заявка, която изкарва името и годините на хората, сортира 
//данните и изкарва първите 10 от тях.Ако имеме 10,10 ще започне 
//от 10тия и ще изкара 10 записа
$q = mysqli_query($connection, 'SELECT user_name AS un, age, is_active FROM users ORDER BY age LIMIT 0,10');
if (!$q) {
    echo 'ERROR';
}
echo '<table>'
        .'<tr>'
        . '<td>USERNAME</td>'
        . '<td>AGE</td>'
        . '<td>IS_ACTIVE</td>'
        . '</tr>';
       while ($row =$q->fetch_assoc()) {
           echo '<tr><td>'.$row['un'].'</td>
              <td>'.$row['age'].'</td>
              <td>'.$row['is_active'].'</td></tr>';
}
echo '</table>' ;
