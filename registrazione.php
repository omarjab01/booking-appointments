<!-- script registrazione -->
<?php

require_once('config.php'); 

$email = $connessione->real_escape_string($_POST['email']); 
$password = $connessione->real_escape_string($_POST['password']);

$sql = "INSERT INTO utenti (EMAIL, PASSWORD) VALUES ('$email', '$password')";

if($connessione->query($sql) === true)
    echo "Registrazione effettuata con successo";
else
    echo "Errore durante registrazione utente $sql. " . $connessione->error;
?>