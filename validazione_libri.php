<?php 

    require_once('configurazione.php');
    include_once('gestione_libri.php');

    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'update') {
        $titolo = trim(htmlspecialchars($_REQUEST['titolo'])) ? trim(htmlspecialchars($_REQUEST['titolo'])) : null;
        $autore = trim(htmlspecialchars($_REQUEST['autore'])) ? trim(htmlspecialchars($_REQUEST['autore'])) : null;
        $anno_pubblicazione = trim(htmlspecialchars($_REQUEST['anno_pubblicazione'])) ? trim(htmlspecialchars($_REQUEST['anno_pubblicazione'])) : null;
        $genere = trim(htmlspecialchars($_REQUEST['genere']))? trim(htmlspecialchars($_REQUEST['genere'])) : null;
        
        updateBook($titolo, $autore, $anno_pubblicazione, $genere);

    }
    


?>