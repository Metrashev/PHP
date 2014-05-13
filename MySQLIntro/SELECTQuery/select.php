<?php
$connection = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$connection) {
    echo 'no database connection!';
    exit;
}
mysqli_set_charset($connection, 'utf8');
$query = mysqli_query($connection, 'SELECT * FROM `users`');
if (!$query) {
    echo 'page not found 404';
       echo mysqli_error($connection);
}
while ($row = $query->fetch_assoc()) {
    echo '<pre>'.print_r($row,true).'</pre>';
}
