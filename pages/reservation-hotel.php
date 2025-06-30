<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>
<section class="hero-reservation">
  <div class="overlay">
    <div class="reservation-content">
      <h2>Faça sua reserva?</h2>
      <p>Aproveite a estadia com conforto e elegancia que o Hotel Green Garden tem a oferecer.</p>

      <form action="processar_reserva.php" method="POST" class="reservation-form">
        <select name="suite" required>
          <option value="" disabled selected>Escolha a Suite</option>
          <option value="Classic">Classic</option>
          <option value="Master">Master</option>
        </select>
        <label for="">Entrada</label>
        <input type="date" placeholder="Check-in" required>
        <label for="">Saída</label>
        <input type="date" placeholder="Check-out" required>
        <label for="">Número de hóspedes</label>
        <input type="number" placeholder="Adulto" min="1" required>
        <input type="number" placeholder="Criança" min="0" required>
        <button type="submit">Confirmar</button>
      </form>
    </div>
  </div>
</section>





<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>