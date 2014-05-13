<?php
$title = 'Автори';
include './includes/header.php';
?>
<a href="index.php">Списък</a>
<a href="books.php">Книги</a>
<form method="POST" action="authors.php">
    Име: <input type="text" name="author_name" />
    <input type="submit" value="Добави"/>   
</form>
<?php
if ($_POST) {
    $author_name = trim($_POST['author_name']);
    if (mb_strlen($author_name) < 2) {
        echo 'Невалидно име';
        //exit;
    } else {

        $author_esc = mysqli_real_escape_string($db, $author_name);
        $query = mysqli_query($db, 'SELECT * FROM authors WHERE '
                . 'author_name ="' . $author_esc . '"');
        if (mysqli_num_rows($query) > 0) {
            echo 'Има такъв автор';
        } else {
            mysqli_query($db, 'INSERT INTO authors (author_name)'
                    . 'VALUES("' . $author_esc . '")');
            if (mysqli_error($db)) {
                echo 'Грешка!';
            } else {
                echo 'Записа е вкаран в базата данни!';
            }
        }

        $authors = getAuthors($db);
        if (!$authors) {
            echo 'Грешка!';
        }
    }
}
?>
<table border="1">
    <tr><th>Aвтор</th></tr>
    <?php
    foreach ($authors as $row) {

        echo '<tr><td>' . $row['author_name'] . '</td></tr>';
    }
    ?>
</table>

<?php
include './includes/footer.php';
?>
   