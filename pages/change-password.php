<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

$token = $_GET['token'] ?? '';
$mensagem = '';
$erro = '';

// Processa o formulário se for POST e tiver token
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($token)) {
    $novaSenha = $_POST['novaSenha'] ?? '';
    $confirmarSenha = $_POST['confirmarSenha'] ?? '';

    if ($novaSenha !== $confirmarSenha) {
        $erro = "As senhas não coincidem.";
    } else {
        // Verifica token válido e não expirado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE reset_token = ? AND reset_token_expira > NOW()");
        $stmt->execute([$token]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE usuarios SET senha = ?, reset_token = NULL, reset_token_expira = NULL WHERE id = ?");
            $stmt->execute([$senhaHash, $usuario['id']]);

            // Redireciona para remover token da URL
            header("Location: change-password.php?success=1");
            exit();
        } else {
            $erro = "Token inválido ou expirado.";
        }
    }
}
?>

<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<main>
    <div class="change-password-container" style="margin-top: 150px;">
        <h2>Redefinir Senha</h2>

        <?php if (isset($_GET['success'])): ?>
            <p style="color: green;">Senha redefinida com sucesso! <a href="/Hotel-Green-Garden/pages/login.php">Faça login</a> com sua nova senha.</p>
        <?php elseif (!empty($token)): ?>
            <?php if ($erro): ?>
                <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>

            <form method="POST">
                <label>Nova senha:</label>
                <input type="password" name="novaSenha" required>

                <label>Confirmar nova senha:</label>
                <input type="password" name="confirmarSenha" required>

                <button type="submit">Redefinir Senha</button>
            </form>
        <?php else: ?>
            <p style="color: red;">Token inválido ou ausente.</p>
        <?php endif; ?>
    </div>
</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>
