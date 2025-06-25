<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

$email = $_POST['email'];


$token = bin2hex(random_bytes(50));


$stmt = $pdo->prepare("UPDATE usuarios SET reset_token = ? WHERE email = ?");
$stmt->execute([$token, $email]);


$link = "http://localhost/Hotel-Green-Garden/pages/reset_password.php?token=$token";


echo "<p>Link de recuperação (para testes): <a href='$link'>Clique aqui para redefinir sua senha</a></p>";


header('Location: forgot_password.php?success=1');
exit();
