<!-- <?php

// configurazione per la connessione al database
    $config = [
        'mysql_host' => 'localhost',
        'mysql_user' => 'root',
        'mysql_password' => ''
    ];

    // connessione al database
    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password']
    );

    // Verifica della connessione
    if($mysqli->connect_error) {
        die($mysqli->connect_error); 
    } 

     // Creo il mio DB
    $sql = 'CREATE DATABASE IF NOT EXISTS books_list;';

    if(!$mysqli->query($sql)) { 
        die($mysqli->connect_error);
    }


    // Seleziono il DB
    $mysqli->query('USE books_list;'); 


    // creiamo la tabella
    $sql = 'CREATE TABLE IF NOT EXISTS books (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(150) NOT NULL,
        author VARCHAR(150) NOT NULL,
        publication_year INT(4) NOT NULL,
        genre VARCHAR(150) NOT NULL
    )';

    if(!$mysqli->query($sql)) { 
        die($mysqli->connect_error); 
    }


    // inseriamo dei dati nuovi
    // $sql = "INSERT INTO books (title, author, publication_year, genre) 
    //             VALUES ('Shining', 'Stephen King', 1977, 'Horror')";

    // $sql = "INSERT INTO books (title, author, publication_year, genre) 
    //             VALUES ('Harry Potter', 'J. K. Rowling', 1997, 'Fantasy')";

    // $sql = "INSERT INTO books (title, author, publication_year, genre) 
    //             VALUES ('Il Signore degli Anelli', 'J. R. R. Tolkien', 1954, 'Fantasy')";

    // $sql = "INSERT INTO books (title, author, publication_year, genre) 
    //             VALUES ('Notte buia, niente stelle', 'Stephen King', 2010, 'Horror')";

    // if(!$mysqli->query($sql)) { 
    //     die($mysqli->connect_error); 
    // }


?> -->