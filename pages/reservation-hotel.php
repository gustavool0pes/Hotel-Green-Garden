<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$mensagem = "";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $suite = $_POST['suite'] ?? '';
    $checkin = $_POST['checkin'] ?? '';
    $checkout = $_POST['checkout'] ?? '';
    $adultos = $_POST['adultos'] ?? 1;
    $criancas = $_POST['criancas'] ?? 0;
    $hoje = date('Y-m-d');

    if (empty($suite) || empty($checkin) || empty($checkout)) {
        $mensagem = "Todos os campos são obrigatórios.";
    } elseif ($checkin < $hoje) {
        $mensagem = "A data de check-in não pode ser no passado.";
    } elseif (strtotime($checkin) >= strtotime($checkout)) {
        $mensagem = "A data de check-out deve ser posterior à de check-in.";
    } else {
        $_SESSION['reserva'] = [
            'suite' => $suite,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'adultos' => $adultos,
            'criancas' => $criancas,
        ];
        header("Location: resume-reservation.php");
        exit();
    }
}
?>




<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<section class="hero-reservation">
  <div class="overlay">
    <div class="reservation-content">
      <h2>Faça sua reserva</h2>
      <p>Aproveite a estadia com conforto e elegância que o Hotel Green Garden tem a oferecer.</p>
      <?php if (!empty($mensagem)): ?>
        <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px;">
          <?= htmlspecialchars($mensagem) ?>
        </div>
      <?php endif; ?>


      <form method="POST" class="reservation-form">
        <select name="suite" required>
          <option value="" disabled selected>Escolha a Suíte</option>
          <option value="classic">Classic</option>
          <option value="master">Master</option>
        </select>

        <label for="checkin">Entrada</label>
        <input type="date" name="checkin" id="checkin" required required min="<?= date('Y-m-d') ?>">

        <label for="checkout">Saída</label>
        <input type="date" name="checkout" id="checkout" required>

        <label for="adultos">Número de Hóspedes</label>
        <input type="number" name="adultos" id="adultos" placeholder="Adultos" min="1" required>
        <input type="number" name="criancas" id="criancas" placeholder="Crianças" min="0" required>

        <button type="submit">Confirmar</button>
      </form>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>