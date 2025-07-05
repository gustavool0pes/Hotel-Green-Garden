<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
// Variáveis para feedback
$mensagem = '';
$sucesso = false;

// Verifica envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['usuario_id'])) {
        $mensagem = 'Você precisa estar logado para fazer uma reserva.';
    } elseif (!isset($_POST['data'], $_POST['horario'], $_POST['pessoas'])) {
        $mensagem = 'Preencha todos os campos.';
    } else {
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $quantidade_pessoas = (int)$_POST['pessoas'];
        $id_usuario = $_SESSION['usuario_id'];

        $stmt = $pdo->prepare("INSERT INTO reservas_restaurante 
            (id_usuario, data_reserva, hora_reserva, quantidade_pessoas) 
            VALUES (:id_usuario, :data_reserva, :hora_reserva, :quantidade_pessoas)");

        try {
            $stmt->execute([
                ':id_usuario' => $id_usuario,
                ':data_reserva' => $data,
                ':hora_reserva' => $horario,
                ':quantidade_pessoas' => $quantidade_pessoas
            ]);
            $mensagem = 'Reserva realizada com sucesso!';
            $sucesso = true;
        } catch (PDOException $e) {
            $mensagem = 'Erro ao salvar a reserva: ' . $e->getMessage();
        }
    }
}
?>

<section class="hero-reservation-restaurant">
  <div class="overlay-restaurant">
    <div class="reservation-content-restaurant">
      <h2>Faça sua reserva!</h2>
      <p>Obtenha uma experiência gastronômica única.</p>

      <?php if (!empty($mensagem)): ?>
        <div style="margin: 10px 0; padding: 10px; background: <?= $sucesso ? '#d4edda' : '#f8d7da' ?>; color: <?= $sucesso ? '#155724' : '#721c24' ?>;">
          <?= htmlspecialchars($mensagem) ?>
        </div>
        <?php if ($sucesso): ?>
          <a href="/Hotel-Green-Garden/index.php" style="display: inline-block; margin-top: 10px; padding: 8px 16px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">Voltar para a página principal</a>
        <?php endif; ?>
      <?php endif; ?>

      <form action="" method="POST" class="reservation-form-restaurant">
        <label for="data">Data</label>
        <input type="date" id="data" name="data" required>
        <label for="horario">Horário</label>
        <input type="time" id="horario" name="horario" required>
        <label for="pessoas">Número de Pessoas</label>
        <input type="number" id="pessoas" name="pessoas" min="1" required>
        <button type="submit">Confirmar</button>
      </form>
    </div>
  </div>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>
