<?php
    session_start();
    if(!isset($_SESSION['email']))
    {
        header('Location: http://localhost:8080/booking-appointments/');
    }
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedi recensioni</title>
    <link rel="icon" href="img/booking.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script>
        
        if (window.history.replaceState) //evita di ricevere messaggio errore dopo refresh pagina   
            window.history.replaceState(null, null, window.location.href);
    
    </script>
</head>

<body class = "bg-info">
    <h1 class = "text-center text-white mt-5">VEDI RECENSIONI</h1>
    
    <div class="text-center mt-5 mb-4"><a style="font-size: 1.25em;" href="index.php">Torna in homepage</a></div>

      <?php
        $sql = "SELECT * FROM recensioni";
        require_once('php/config.php');
        $risultato = mysqli_query($connessione, $sql);
        print('<div class="d-flex flex-column align-items-center">');
        while($riga = mysqli_fetch_assoc($risultato))                        
            print('<div class="mt-4 mb-4 w-25 bg-dark p-2" style="border-radius: 4em;"><div class="d-flex w-100 align-items-center flex-column gap-3 bg-warning pt-3 pb-3" style="border-radius: 4em;"><p class="w-auto">'.$riga['COMMENTO'].'</p><b><span>VOTO: '.$riga['VOTO'].'</span></b></div></div>');
        print('</div>');
      ?>
    
    <!-- Bootstrap -->
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity = "sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin = "anonymous"></script>
</body>

</html>