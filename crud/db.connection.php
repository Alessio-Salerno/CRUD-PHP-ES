<?php
$servername = "localhost";
$username = "root";  // Nome utente del database
$password = "";      // Password per MySQL (lascia vuoto se non hai impostato una password)
$dbname = "tutorial";  // Il nome corretto del tuo database

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
