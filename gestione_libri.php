<?php

require_once "configurazione.php";


$book = [
    "titolo" => isset($_POST['titolo']) ? $_POST['titolo'] : '',
    "autore" => isset($_POST['autore']) ? $_POST['autore'] : '',
    "anno_pubblicazione" => isset($_POST['anno_pubblicazione']) ? $_POST['anno_pubblicazione'] : '',
    "genere" => isset($_POST['genere']) ? $_POST['genere'] : ''
];

function getAllBooks($mysqli)
{
    $libri = [];
    $sql = "SELECT * FROM books;";
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $libri[] = $row;
        }
    }
    return $libri;
}

function AddLibri($mysqli, $book)
{
    $titolo = $book['titolo'];
    $autore = $book['autore'];
    $anno_pubblicazione = $book['anno_pubblicazione'];
    $genere = $book['genere'];

    $sql = "INSERT INTO books (titolo, autore, anno_pubblicazione, genere) 
                VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$genere')";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
    header('location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    AddLibri($mysqli, $book);
} else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'remove') {
    removeBook($mysqli, $_REQUEST['id']);
    exit(header('Location: index.php'));
}

function removeBook($mysqli, $id) {


    if (!$mysqli->query('DELETE FROM books WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'eliminato con successo!!!';
    }
}


?>
