<?php

require_once "configurazione.php";

// leggiamo i dati dell'info + controllo
$book = [
    "titolo" => isset($_POST['titolo']) ? $_POST['titolo'] : '',
    "autore" => isset($_POST['autore']) ? $_POST['autore'] : '',
    "anno_pubblicazione" => isset($_POST['anno_pubblicazione']) ? $_POST['anno_pubblicazione'] : '',
    "genere" => isset($_POST['genere']) ? $_POST['genere'] : ''
];

// leggiamo i libri dal database
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

// aggiungiamo un nuovo libro
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

// rimuoviamo un libro
function removeBook($mysqli, $id)
{
    if (!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Libro rimosso con successo!';
    }
}

// aggiorniamo un libro
function updateBook($mysqli, $id, $titolo, $autore, $anno_pubblicazione, $genere)
{
    $sql = "UPDATE books SET 
                        titolo = '" . $titolo . "', 
                        autore = '" . $autore . "',
                        anno_pubblicazione = '" . $anno_pubblicazione . "',
                        genere = '" . $genere . "'
                        WHERE id = " . $id;
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Libro modificato con successo!';
    }
}

// if else per aggiornare o rimuovere
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        updateBook($mysqli, $_POST['id'], $_POST['titoloUp'], $_POST['autoreUp'], $_POST['annoUp'], $_POST['genereUp']);
        exit(header('Location: index.php'));
    } else {
        AddLibri($mysqli, $book);
    }

} else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'remove') {
    removeBook($mysqli, $_REQUEST['id']);
    exit(header('Location: index.php'));
}





?>
