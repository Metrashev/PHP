<?php
$title = 'Книги';
include './includes/header.php';
?>
<a href="index.php">Списък</a>
<a href="authors.php">Автори</a>
<form method="POST" action="books.php">
    Име на книга: <input type="text" name="book_name" />

    <?php
    $authors = getAuthors($db);
    if (!$authors) {
        echo 'Грешка';
    }
    ?>

    <div>
        Автори:<select name="authors[]" multiple="multiple" size="8">
            <?php
            foreach ($authors as $row) {
                echo '<option value="' . $row['author_id'] . '">' . $row['author_name'] . '</option>';
            }
            ?>
        </select>
    </div>
    <input type="submit" value="Добави"/>
</form>

<?php
if ($_POST) {
    $book_name = trim($_POST['book_name']);
    if (!isset($_POST['$authors'])) {
        $_POST['$authors'] = '';
    }
    $er = array();

    if (mb_strlen($book_name) < 2) {
        $er[] = '<p>Невалидно име</p>';
    }
    if (!is_array($authors) || count($authors) == 0) {
        $er[] = '<p>Невалидни автори</p>';
    }
    if (!isAuthorIdExists($db, $authors)) {
        $er[] = '<p>Невалидeн автор</p>';
    }
    
    
    if (count($er) > 0) {
        foreach ($er as $v) {
            echo '<p>' . $v . '</p>';
        }
    } else {
        mysqli_query($db, 'INSERT INTO books (book_title) '
                . 'VALUES("'.  mysql_real_escape_string($db,$book_name).'")');
        if (mysqli_error($db)) {
            echo 'Error!';
            exit;
        }
        $id = mysqli_insert_id($db);
        echo $id;
    }
    
    
}
?>

<?php
include './includes/footer.php';
?>