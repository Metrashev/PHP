
<?php
$con = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$con) {
    echo 'no database connection!';
}
mysqli_set_charset($con, 'utf8');

$stmt = mysqli_prepare($con,'SELECT * FROM users WHERE user_id=? AND user_name=?' );

mysqli_stmt_bind_param($stmt, 'is', $_GET['1007'],$_GET['SOFIA']);
mysqli_stmt_execute($stmt);
while ($row = mysqli_stmt_fetch($stmt)) {
echo '<pre>'.print_r($row,true).'</pre>';
}