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

        <form action="process_forgot_password.php" method="POST">
            <label for="email">Informe seu e-mail cadastrado:</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Enviar</button>
        </form>
    </div>

</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>