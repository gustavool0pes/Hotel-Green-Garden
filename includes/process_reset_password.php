<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

$token = $_POST['token'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

if ($new_password !== $confirm_password) {
    die("As senhas não conferem. <a href='reset_password.php?token=$token'>Tentar novamente</a>");
}

$stmt = $pdo->prepare("SELECT id FROM usuarios WHERE reset_token = ?");
$stmt->execute([$token]);
$user = $stmt->fetch();

if ($user) {
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $update = $pdo->prepare("UPDATE usuarios SET senha = ?, reset_token = NULL WHERE id = ?");
    $update->execute([$hashed_password, $user['id']]);

    header('Location: login.php?senha_alterada=1');
    exit();
} else {
    die("Token inválido ou expirado.");
}
