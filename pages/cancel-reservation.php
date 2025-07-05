<?php
session_start();
unset($_SESSION['reserva']);
header("Location: reservation-hotel.php");
exit();
?>
