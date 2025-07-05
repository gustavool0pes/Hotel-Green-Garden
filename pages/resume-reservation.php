<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['reserva'])) {
    header('Location: reservation-hotel.php');
    exit();
}

$reserva = $_SESSION['reserva'];

$mapaSuites = [
    'classic' => ['tipo' => 'Classic', 'preco' => 300],
    'master'  => ['tipo' => 'Master', 'preco' => 500]
];

$infoSuite = $mapaSuites[$reserva['suite']] ?? null;
if (!$infoSuite) {
    die("Suíte inválida.");
}

$checkin = new DateTime($reserva['checkin']);
$checkout = new DateTime($reserva['checkout']);
$dias = max($checkin->diff($checkout)->days, 1);
$preco_total = $dias * $infoSuite['preco'];
?>

<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<style>
  .container-confirm-reservation {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background: #000;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .container-confirm-reservation h2,
  .container-confirm-reservation p {
    color: #fff;
    margin-bottom: 15px;
  }

  .container-confirm-reservation button {
    color: #fff;
    padding: 0.7rem 1.5rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px;
    transition: background-color 0.3s;
  }

      .container-confirm-reservation .btn-rs-co {
    background-color:rgb(22, 192, 36);
  }

      .container-confirm-reservation .btn-rs-co:hover {
    background-color: rgb(3, 153, 15);
  }

    .container-confirm-reservation .btn-rs-e {
    background-color:rgb(197, 197, 197);
  }

    .container-confirm-reservation .btn-rs-e:hover {
    background-color: rgb(156, 156, 156);
  }

      .container-confirm-reservation .btn-rs-ca {
    background-color:rgb(211, 46, 46);
  }

  .container-confirm-reservation .btn-rs-ca:hover {
    background-color: rgb(255, 2, 2);
  }

  .btn-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
  }
</style>

<main style="margin-top: 150px; margin-bottom: 100px;">
  <div class="container-confirm-reservation">
    <h2>Resumo da Reserva</h2>
    <p><strong>Suíte:</strong> <?= htmlspecialchars($infoSuite['tipo']) ?></p>
    <p><strong>Check-in:</strong> <?= $reserva['checkin'] ?></p>
    <p><strong>Check-out:</strong> <?= $reserva['checkout'] ?></p>
    <p><strong>Adultos:</strong> <?= $reserva['adultos'] ?></p>
    <p><strong>Crianças:</strong> <?= $reserva['criancas'] ?></p>
    <p><strong>Diárias:</strong> <?= $dias ?></p>
    <p><strong>Valor da diária:</strong> R$ <?= number_format($infoSuite['preco'], 2, ',', '.') ?></p>
    <p><strong>Total:</strong> <span style="color: limegreen; font-size: 18px;">R$ <?= number_format($preco_total, 2, ',', '.') ?></span></p>

    <div class="btn-group">
      <form method="POST" action="confirm-reservation.php">
        <button class="btn-rs-co" type="submit">Confirmar Reserva</button>
      </form>

      <form method="POST" action="reservation-hotel.php">
        <button class="btn-rs-e" type="submit">Editar</button>
      </form>

      <form method="POST" action="cancel-reservation.php">
        <button class="btn-rs-ca" type="submit">Cancelar</button>
      </form>
    </div>
  </div>
</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>
