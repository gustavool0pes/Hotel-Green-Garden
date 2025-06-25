<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');

$token = $_GET['token'] ?? '';

?>

<main class="change-password-container">
    <h2>Definir Nova Senha</h2>

    <form action="process_reset_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

        <label for="new_password">Nova Senha:</label>
        <input type="password" name="new_password" id="new_password" required>

        <label for="confirm_password">Confirmar Nova Senha:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit">Salvar Nova Senha</button>
    </form>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>
