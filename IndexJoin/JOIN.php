<?php
$connection = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$connection) {
    echo 'no database connection!';
    exit;
}
mysqli_set_charset($connection, 'utf8');
$query = mysqli_query($connection, 'SELECT * FROM users JOIN pictures ON users.user_id = pictures.user_id WHERE users.user_id = "1"');
$result = array();
while ($row = mysqli_fetch_assoc($query)) {
    $result[$row['user_id']]['user_name'] = $row['user_name'];
    $result[$row['user_id']]['pictures'][] = $row['picture_name'];
    //echo '<tr><td>'.$row['user_name'].'</td><td>'.$row['picture_name'].'</td></tr>';
   // echo '<pre>'.print_r($row,true).'</pre>';
}
echo '<pre>'.print_r($result,true).'</pre>'; 
echo '<table><tr><td>Username</td><td>Pictures</td></tr>';
foreach ($result as  $v) {
    echo '<tr><td>'.$v['user_name'].'</td><td>';
    $data = array();
    foreach ($v['pictures'] as $vv) {
          $data[]=$vv;
    }
    echo implode(',', $data);
    '</td></tr>';
}
echo '</table>';
