<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

// Verifica se está logado
if (!isset($_SESSION['usuario_id'])) {
  header('Location: /Hotel-Green-Garden/pages/login.php');
  exit();
}

$usuario_id = $_SESSION['usuario_id'];
$mensagem = "";

// Atualização de dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'] ?? '';
  $email = $_POST['email'] ?? '';
  $telefone = $_POST['telefone'] ?? '';
  $senha = $_POST['senha'] ?? '';



  try {
    if (!empty($senha)) {
      $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
      $sql = "UPDATE usuarios SET nome = ?, email = ?, telefone = ?, senha = ? WHERE id = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$nome, $email, $telefone, $senha_hash, $usuario_id]);
    } else {
      $sql = "UPDATE usuarios SET nome = ?, email = ?, telefone = ? WHERE id = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$nome, $email, $telefone, $usuario_id]);
    }

    $mensagem = "Perfil atualizado com sucesso!";
  } catch (PDOException $e) {
    $mensagem = "Erro ao atualizar: " . $e->getMessage();
  }
}

// Buscar dados atuais
$stmt = $pdo->prepare("SELECT nome, email, telefone FROM usuarios WHERE id = ?");
$stmt->execute([$usuario_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!-- Header -->
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>

<section class="profile" style="margin-top: 150px; margin-bottom: 100px;">
  <h2>Seu Perfil</h2>
  
  <form id="profileForm" method="POST" action="profile.php">
    
    <div class="form-group-profile">
      <label for="fullName">Nome Completo:</label>
      <input type="text" id="fullName" name="nome" placeholder="Seu nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
    </div>

    <div class="form-group-profile">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="seuemail@email.com" value="<?= htmlspecialchars($usuario['email']) ?>" required>
    </div>

    <div class="form-group-profile">
      <label for="phone">Telefone:</label>
      <input type="tel" id="phone" name="telefone" placeholder="(21) 99999-9999" value="<?= htmlspecialchars($usuario['telefone']) ?>">
    </div>

    <div class="form-group-profile">
      <label for="password">Nova Senha:</label>
      <input type="password" id="password" name="senha" placeholder="Digite a nova senha">
    </div>

    <button class="btn-profile" type="submit">Salvar Alterações</button>
  </form>
</section>


<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>