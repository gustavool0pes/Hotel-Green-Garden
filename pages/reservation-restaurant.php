<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>

<section class="hero-reservation-restaurant">
  <div class="overlay-restaurant">
    <div class="reservation-content-restaurant">
      <h2>Faça sua reserva!</h2>
      <p>Obtenha uma experiência gastronomica única.</p>

      <form action="processar_reserva.php" method="POST" class="reservation-form-restaurant">
        <label for="">Data</label>
        <input type="date" placeholder="Check-in" required>
        <label for="">Horário</label>
        <input type="time" placeholder="Check-out" required>
        <label for="">Número de Pessoas</label>
        <input type="number" placeholder="Pessoas" min="1" required>
        <button type="submit">Confirmar</button>
      </form>
    </div>
  </div>
</section>





<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>