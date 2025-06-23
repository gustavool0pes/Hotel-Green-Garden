<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['login'])) {
    //LOGIN
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
      $_SESSION['usuario_id'] = $usuario['id'];
      header('Location: \Hotel-Green-Garden\index.php');
      exit();
    } else {
      $erro = 'Email ou senha incorretos!';
    }
  } elseif (isset($_POST['cadastro'])) {
    //CADASTRO 
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $senha2 = $_POST['senha2'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    if ($senha !== $senha2) {
      $erro = 'As senhas não coincidem!';
    } else {
      $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
      $stmt->execute([$email]);
      if ($stmt->fetch()) {
        $erro = 'Este email já está cadastrado.';
      } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $senha_hash, $telefone]);
        $erro = 'Cadastro realizado com sucesso!';
      }
    }
  }
}
?>

<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<main style="min-height: 100vh; background-color: #c8c8c8; display: flex; justify-content: center; align-items: center; padding: 2rem 1rem;">
  <div class="login-box">
    <div class="login-snip">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
      <label for="tab-1" class="tab">Login</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up">
      <label for="tab-2" class="tab">Cadastro</label>
      <div class="login-space">

        <?php if (!empty($erro)): ?>
          <div style="color: red; text-align: center; margin-bottom: 10px;">
            <?= htmlspecialchars($erro) ?>
          </div>
        <?php endif; ?>

        <!-- LOGIN -->
        <div class="login">
          <form action="login.php" method="POST">
            <br>
            <div class="group">
              <label for="login-email" class="label">Email</label>
              <input id="login-email" name="email" type="email" class="input" required placeholder="Coloque seu email">
            </div>
            <div class="group">
              <label for="login-pass" class="label">Senha</label>
              <input id="login-pass" name="senha" type="password" class="input" required placeholder="Digite sua senha">
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Lembrar de mim</label>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Logar" name="login">
            </div>
            <div class="hr"></div>
            <div class="foot">
              <a href="#">Esqueceu a senha?</a>
            </div>
          </form>
        </div>

        <!-- CADASTRO -->
        <div class="sign-up-form">
          <form action="login.php" method="POST">
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
              <a href="#">Já possui conta?</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>