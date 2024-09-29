<?php

include "db.connection.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    // Controlla che tutti i campi siano compilati
    if (empty($nome) || empty($cognome) || empty($email) || empty($gender)) {
        echo "";
    } else {
        $sql = "UPDATE `crud` 
        SET `nome`='$nome',`cognome`='$cognome',`email`='$email',`gender`='$gender' WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?msg= Modifica avvenuta con successo");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
}



?>











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


<div class="cotainer">
    <div class="text-center mb-4">
        <h3>Modifica informazioni</h3>
        <p class="text-muted">Clicca per altre informazioni</p>
    </div>
</div>

<?php

$sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>



<!-- FORM -->
<div class="container d-flex justify-content-center">
    <form action="" method="post">

      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control"  name="nome"
        value="<?php echo $row['nome']?>">
      </div>


      <div class="mb-3">
        <label class="form-label">Cognome</label>
        <input type="text" class="form-control"  name="cognome" 
        value="<?php echo $row['cognome']?>">
      </div>

      <div class="mb-3">
      <label class="form-label">Email</label>
        <input type="email" class="form-control"  name="email" 
        value="<?php echo $row['email']?>">
      </div>


      <div class="form-group mb-3">
        <label>Gender : </label>&nbsp;
        <input type="radio" class="form-check-input" name="gender" id="male" 
        value="male" <?php echo ($row['gender']== 'male')? "checked": ""; ?>>
        <label for="male" class="form-input-label">Male</label> 

         &nbsp;
        <input type="radio" class="form-check-input" name="gender" id="female" value="female"
        <?php echo ($row['gender']== 'female')? "checked": ""; ?>>
        <label for="female" class="form-input-label">Female</label> 

    </div>

      <div class="contaier">
        <button type="submit" class="btn btn-success" name="submit">Aggiorna</button>
        <a href="index.php" class="btn btn-danger">Cancel</a>
      </div>

    </form>
</div>







<script src="https://kit.fontawesome.com/f0488c32c1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>