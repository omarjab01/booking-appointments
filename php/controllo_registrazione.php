<!-- script registrazione -->
<?php    
    if(isset($_POST['sign_up'])) //controllo tasto "submit" premuto//
    {
        require_once('config.php'); 

        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email']; 
        $password = $_POST['password'];

        if($nome === "" || $cognome === "" || $email === "" || $password === "") //controllo campi vuoti//
            print('<br><p style = "color: red; font-weight: bold"><b>Hai lasciato uno o più campi vuoti</b></p>');
        
        
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) //validazione email
            print('<br><p style = "color: red; font-weight: bold"><b>Email non valida</b></p>');        
        
        else
        {
            $sql = "SELECT * FROM utenti WHERE utenti.email = '$email'";
            $riga = mysqli_query($connessione, $sql);    
            
            if (mysqli_num_rows($riga) > 0) //controllo email già utilizzata// 
                print('<br><p style = "color:red; font-weight: bold"><b>Questa email è già stata utilizzata</b></p>');
            
            else //inserimento dati nel database
            {
                $sql = "INSERT INTO utenti (NOME, COGNOME, EMAIL, PASSWORD) VALUES ('$nome', '$cognome', '$email', '$password')";
                $riga = mysqli_query($connessione, $sql);    
                header("Location: http://localhost:8080/booking-appointments/login.php");
            }
        }
    }
?>