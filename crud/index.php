<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUDE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   
<!-- navbar -->


<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:black; color:white;">
    PHP CRUD 
</nav>


<div class="container">
    <?php
    
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    
    ?>

</div>









<!-- FORM -->

<div class="container">
    <a href="add_new.php" class="btn btn-dark mb-3">Aggiungi Uomo + </a>


    <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Cognome</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php

     include "db.connection.php";

     $sql = "SELECT * FROM `crud` ";
     $result = mysqli_query($conn , $sql);
     while ($row = mysqli_fetch_assoc($result)) {
        ?>

<tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['nome'] ?></td>
      <td><?php echo $row['cognome'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['gender'] ?></td>
      
      <td>
      <a href="edit.php?id= <?php echo $row['id']?>"
       class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
       <a href="delete.php?id=<?php echo $row['id']?>" class="link-dark ms-2" onclick="return confirm('Sei sicuro di voler cancellare questo record?');">
              <i class="fa-solid fa-trash"></i>
            </a>  
    </td>
 </tr>
   
        <?php

     }


    ?>


  </tbody>
</table>



</div>





<script src="https://kit.fontawesome.com/f0488c32c1.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>