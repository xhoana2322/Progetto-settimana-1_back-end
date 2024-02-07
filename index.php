<?php  

    require_once "configurazione.php";
    require_once "funzioni.php";

    $book_list = getAllBooks($mysqli);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
<?php include "navbar.php"; ?>

    <div class="mt-3 p-4">
        <div class="text-center">
           <h2>Welcome to your Book_List!</h2>
            <p>You can add, edit and delete your personal books right below to keep up with your new interests!</p> 
            
            <button type="button" class="btn btn-success my-3 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add a new Book!
            </button>
        </div>

            <!-- Modal -->
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
                            <form method="POST" action="gestione.php">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Author</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Publication year</label>
                                    <input type="number" step="1" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <div>
        <!-- <h4 class="text-center my-4">Check your collection</h4> -->
        <table class="table container table-hover border border-dark border-3">
            <thead>
                <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Publication year</th>
                <th scope='col'>Genre</th>
                <th scope='col'>Edit</th>
                </tr>
            </thead>
            <tbody class="text-center table-group-divider">
                <?php 
                    if($book_list){
                    foreach ($book_list as $key => $books) { 
                    ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $books['title'] ?></td>
                            <td><?= $books['author'] ?></td>
                            <td><?= $books['publication_year'] ?></td>
                            <td><?= $books['genre'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary py-1 px-2"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-danger py-1 px-2"><i class="bi bi-trash"></i></button>                            </td>
                            </td>                        
                        </tr>
                    <?php } }?>
            </tbody> 
        </table>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>