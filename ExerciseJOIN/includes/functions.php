<?php

$db = mysqli_connect('localhost', 'Vladimir', 'vladi', 'telerik', 3306);
if (!$db) {
    echo 'No connection!';
}
mysqli_set_charset($db, 'utf8');
mb_internal_encoding('UTF-8');

function getAuthors($db) {
    $query = mysqli_query($db, 'SELECT * FROM authors');
    if (mysqli_error($db)) {
        echo 'Грешка!';
        return FALSE;
    }
    $ret = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $ret[] = $row;
    }
    return $ret;
}

function isAuthorIdExists($db, $ids) {
//    $id = (int)$id;
    if (!is_array($ids)) {
        return FALSE;
    }
    $query = mysqli_query($db, 'SELECT * FROM authors WHERE author_id IN(' . implode(',', $ids) . ')');
    if (mysqli_error($db)) {
        return FALSE;
    }
    echo mysqli_num_rows($query);
    if (mysqli_num_rows($query) == count($ids)) {
        return TRUE;
    }
    return FALSE;
}
