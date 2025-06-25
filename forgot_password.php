<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /Hotel-Green-Garden/pages/login.php');
    exit();
}
?>

<main class="change-password-container">
    <h2>Recuperar Senha</h2>

    <?php if (isset($_GET['success'])): ?>
        <p style="color:green;">Se o e-mail estiver cadastrado, enviamos instruções para redefinir sua senha.</p>
    <?php endif; ?>

    <form action="process_forgot_password.php" method="POST">
        <label for="email">Informe seu e-mail cadastrado:</label>
        <input type="email" name="email" id="email" required>

        <button type="submit">Enviar Instruções</button>
    </form>
</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>