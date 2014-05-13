<?php
$connection = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$connection) {
    echo 'no database connection!';
    exit;
}
mysqli_set_charset($connection, 'utf8');
mysqli_query($connection, 'UPDATE users SET is_actice = 1 WHERE age>=18 AND age<4 AND is_active=0');



$q = mysqli_query($connection, 'SELECT user_name AS un, age, is_active FROM users ORDER BY age LIMIT 0,10');
if (!$q) {
    echo 'ERROR';
}
if ($q->num_rows>0) {
    
    echo '<table>'
    . '<tr>'
    . '<td>USERNAME</td>'
    . '<td>AGE</td>'
    . '<td>IS_ACTIVE</td>'
    . '</tr>';
    while ($row = $q->fetch_assoc()) {
        echo '<tr><td>' . $row['un'] . '</td>
              <td>' . $row['age'] . '</td>
              <td>' . $row['is_active'] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo 'NO RESULTS';
}
