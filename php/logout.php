<?php
    session_start();
    unset($_SESSION['email']);
    header('Location: http://localhost:8080/booking-appointments/');
?>