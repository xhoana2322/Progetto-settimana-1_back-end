

<?php
require_once 'configurazione.php';
require_once 'gestione_libri.php';

$libri = getAllBooks($mysqli);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Book_List!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
    <?php require_once 'navbar.php'; ?>

    <div class="mt-3 p-4">
        <div class="text-center">
           <h2>Welcome to your Book_List!</h2>
            <p>You can add, edit and delete your personal books right below to keep up with your new interests!</p> 
            
            <button type="button" class="btn btn-success my-3 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add a new Book!
            </button>
        </div>

            <!-- modale creare libro -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add your new book's detail!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="gestione_libri.php">
                                <div class="mb-3">
                                    <label for="titoloLibro" class="form-label">Titolo</label>
                                    <input type="text" class="form-control" id="titoloLibro" aria-describedby="titoloLibro"
                                        name="titolo">
                                </div>
                                <div class="mb-3">
                                    <label for="autoreLibro" class="form-label">Autore</label>
                                    <input type="text" class="form-control" id="autoreLibro" name="autore">
                                </div>
                                <div class="mb-3">
                                    <label for="annoLibro" class="form-label">Anno di pubblicazione</label>
                                    <input type="number" step="1" class="form-control" id="annoLibro" name="anno_pubblicazione">
                                </div>
                                <div class="mb-3">
                                    <label for="genereLibro" class="form-label">Genere</label>
                                    <input type="text" class="form-control" id="genereLibro" name="genere">
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Aggiungi il libro</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modale modifica -->
    <div class="modal fade" id="modaleUpdate" tabindex="-1" aria-labelledby="modaleUpdate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Modifica i dati</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="gestione.php">
                        <div class="mb-3">
                            <label for="titoloLibro" class="form-label">Titolo</label>
                            <input type="text" class="form-control" id="titoloLibro" aria-describedby="titoloLibro"
                                name="titolo">
                        </div>
                        <div class="mb-3">
                            <label for="autoreLibro" class="form-label">Autore</label>
                            <input type="text" class="form-control" id="autoreLibro" name="autore">
                        </div>
                        <div class="mb-3">
                            <label for="annoLibro" class="form-label">Anno di pubblicazione</label>
                            <input type="number" step="1" class="form-control" id="annoLibro" name="anno">
                        </div>
                        <div class="mb-3">
                            <label for="genereLibro" class="form-label">Genere</label>
                            <input type="text" class="form-control" id="genereLibro" name="genere">
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Aggiorna libro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <div>
        <!-- <h4 class="text-center my-4">Check your collection</h4> -->
        <table class="table container table-hover border border-dark border-3">
            <thead>
                <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Publication year</th>
                <th scope='col'>Genre</th>
                <th scope='col'>Edit</th>
                </tr>
            </thead>
            <tbody class="text-center table-group-divider">
                <?php 
                    foreach ($libri as $key => $books) { 
                      echo '<tr>
                            <th scope="row">'. $books['id']. '</th>
                            <td>' . $books['titolo'] . '</td>
                            <td>' . $books['autore'] . '</td>
                            <td>' . $books['anno_pubblicazione'] . '</td>
                            <td>' . $books['genere'] . '</td>
                            <td>
                                <a role="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaleUpdate"><i class="bi bi-pencil"></i></a>
                                <a role="button" class="btn btn-danger"  href="gestione_libri.php?action=remove&id=' . $books['id'] .'"><i class="bi bi-trash"></i></a>
                            </td>                        
                        </tr>' 
                    ;} 
                ?>
            </tbody> 
        </table>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

