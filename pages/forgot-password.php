<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    // Verifica se existe o email
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Gerar token
        $token = bin2hex(random_bytes(32));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Salvar no banco
        $stmt = $pdo->prepare("UPDATE usuarios SET reset_token = ?, reset_token_expira = ? WHERE id = ?");
        $stmt->execute([$token, $expira, $usuario['id']]);

        // Enviar e-mail 
        $link = "http://localhost/Hotel-Green-Garden/pages/change-password.php?token=$token";
        $assunto = "Redefinição de Senha - Hotel Green Garden";
        $mensagemEmail = "Clique no link para redefinir sua senha:\n\n$link";
        $headers = "From: no-reply@hotelgreengarden.com";

        mail($email, $assunto, $mensagemEmail, $headers);

        $mensagem = "Um e-mail foi enviado com instruções para redefinir sua senha.";
    } else {
        $mensagem = "E-mail não encontrado.";
    }
}
?>

<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');

?>

<main>
    <div class="change-password-container" style="margin-top: 150px;">
        <h2>Recuperar Senha</h2>
        <?php if (isset($_GET['success'])): ?>
            <p style="color:green;">Se o e-mail estiver cadastrado, enviamos instruções para redefinir sua senha.</p>
        <?php endif; ?>

        <form method="POST">
            <label for="email">Informe seu e-mail cadastrado:</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Enviar</button>
        </form>
    </div>

</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>