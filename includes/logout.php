<?php
session_start();
session_destroy();
header('Location: /Hotel-Green-Garden/index.php');
exit();
?>
