<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastro'])) {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    if ($senha !== $senha2) {
        $erro = "As senhas não conferem.";
    } else {
        try {
            // Verifica se o e-mail já está cadastrado
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $erro = "Este e-mail já está cadastrado.";
            } else {
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senhaHash);
                $stmt->bindParam(':telefone', $telefone);

                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit();
                } else {
                    $erro = "Erro ao cadastrar usuário.";
                }
            }
        } catch (PDOException $e) {
            $erro = "Erro no banco de dados: " . $e->getMessage();
        }
    }
}
?>
<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>



<main style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 2rem 1rem;">

    <!-- CADASTRO -->
    <div class="login-box" style="background-color: #000; margin-top: 80px; margin-bottom: 80px;">
        <?php if (isset($erro)) : ?>
            <div style="color: red; text-align: center; margin-bottom: 10px; margin-top: 100px;">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>

        <form action="cadastro.php" method="POST">
            <h1 style="color: #fff;">Cadastro</h1>
            <br>
            <div class="group">
                <label for="cad-nome" class="label">Nome</label>
                <input id="cad-nome" name="nome" type="text" class="input" required placeholder="Digite seu nome completo">
            </div>
            <div class="group">
                <label for="cad-email" class="label">Email</label>
                <input id="cad-email" name="email" type="email" class="input" required placeholder="Coloque seu email">
            </div>
            <div class="group">
                <label for="cad-pass" class="label">Senha</label>
                <input id="cad-pass" name="senha" type="password" class="input" required placeholder="Crie sua senha">
            </div>
            <div class="group">
                <label for="cad-pass-repeat" class="label">Repita a senha</label>
                <input id="cad-pass-repeat" name="senha2" type="password" class="input" required placeholder="Repita a senha">
            </div>
            <div class="group">
                <label for="cad-tel" class="label">Telefone</label>
                <input id="cad-tel" name="telefone" type="tel" class="input" required placeholder="Digite seu telefone">
            </div>
            <div class="group">
                <input type="submit" class="button" value="Cadastrar" name="cadastro">
            </div>
            <div class="hr"></div>
            <div class="foot">
                <p style="color: #fff; font-size: 1.2rem; text-align: center;">Já possui conta?</p>
                <a href="\Hotel-Green-Garden\pages\login.php">Clique aqui!</a>

            </div>
        </form>
    </div>


</main>



<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>