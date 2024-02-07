
<?php

function getAllBooks($mysqli) {
    $books_table = [];
    $sql = "SELECT * FROM books;";
    $res = $mysqli->query($sql);

    if (!$res) {
        die("Errore nella query: " . $mysqli->error);
    }

    while ($row = $res->fetch_assoc()) {
        $books_table[] = $row;
    }

    $res->close();
    return $books_table;
}



?>



