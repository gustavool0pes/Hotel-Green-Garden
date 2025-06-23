<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotel Green Garden</title>
  <link rel="stylesheet" href="/Hotel-Green-Garden/assets/css/index.css">
  <link rel="stylesheet" href="/Hotel-Green-Garden/assets/css/login.css">
  <link rel="stylesheet" href="/Hotel-Green-Garden/assets/css/restaurant.css">
  <link rel="stylesheet" href="/Hotel-Green-Garden/assets/css/menu-restaurant.css">
  <link rel="stylesheet" href="/Hotel-Green-Garden/assets/css/suite.css">
  <link rel="stylesheet" href="/Hotel-Green-Garden/assets/css/header.css">
  <link rel="stylesheet" href="/Hotel-Green-Garden/assets/css/footer.css">
</head>

<body>
  <!-- header -->
  <header>
    <div class="menu_box">
      <div class="text-menu">
        <p>Hotel Green Garden</p>
      </div>
      <input type="checkbox" id="navcheck" role="button" title="menu">
      <label for="navcheck" aria-hidden="true" title="menu">
        <span class="burger">
          <span class="bar">
            <span class="visuallyhidden">Menu</span>
          </span>
        </span>
      </label>
      <nav id="menu">
        <?php if (isset($_SESSION['usuario_id'])): ?>
          <a href="/Hotel-Green-Garden/index.php">Início</a>
          <a href="/Hotel-Green-Garden/pages/suite.php">Suítes</a>
          <a href="/Hotel-Green-Garden/pages/reservation.php">Reservas</a>
          <a href="/Hotel-Green-Garden/pages/restaurant.php">Restaurante</a>
          <a href="/Hotel-Green-Garden/pages/perfil.php">Perfil</a>
          <a href="/Hotel-Green-Garden/pages/logout.php">Sair</a>
        <?php else: ?>
          <a href="/Hotel-Green-Garden/index.php">Início</a>
          <a href="/Hotel-Green-Garden/pages/suite.php">Suítes</a>
          <a href="/Hotel-Green-Garden/pages/reservation.php">Reservas</a>
          <a href="/Hotel-Green-Garden/pages/restaurant.php">Restaurante</a>
          <a href="/Hotel-Green-Garden/pages/login.php">Login</a>
        <?php endif; ?>

      </nav>
    </div>
  </header>