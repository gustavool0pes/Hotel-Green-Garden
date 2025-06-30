<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>

<!-- Conteúdo Principal -->
<main>
  
  <section class="hero">
    <div class="tittle" style="text-align: center; font-size: 1.7rem; margin-top: 45px;">
      <h1>Restaurante Green Garden</h1><br><br>
    </div>
    <div class="hero-content">
      <div class="hero-text">
        <h1>Uma experiência única gastronômica.</h1>
        <p>No coração do Hotel Green Garden, nosso restaurante oferece uma fusão entre tradição, inovação e ingredientes da mais alta qualidade. Cada detalhe foi pensado para
          proporcionar aos nossos clientes uma viagem de sabores autênticos, unindo o melhor da culinária japonesa moderna com toques contemporâneos.
          Aqui, cada prato é uma celebração da técnica, do frescor e do respeito aos ingredientes, em um ambiente sofisticado e acolhedor.</p>
      </div>
      <div class="hero-image">
        <img src="/Hotel-Green-Garden/assets/image/restaurant4.jpg" alt="">
      </div>
    </div>
    <div class="btn" style="display: flex; margin: 0 auto; text-align: center; margin-top: 20px;">
      <a href="reservation-restaurant.php">Faça sua Reserva</a>
    </div>
  </section>

  <section class="menu-box">
    <div class="menu-restaurant">
      <h2>Menu</h2><br><br>
      <p>Menu Degustação “Kaiseki Moderno”</p><br>
      <p>Menu “Umi”</p><br>
      <p>Menu “Fusão Contemporânea”</p><br>
    </div>
    <div class="btn">
      <a href="menu-restaurant.php">Ver mais</a>
    </div>
  </section>

  <section class="team">
    <h2>Chefes</h2>
    <div class="team-cards">
      <div class="card">
        <div class="photo photo-light">
          <img src="/Hotel-Green-Garden/assets/image/chefe_hiroshi.png" alt="" style="max-width: 245px; border-radius: 10px;">
        </div>
        <h3>Chef Hiroshi Tanaka</h3>
        <p>Mestre da culinária japonesa tradicional, especialista em técnicas refinadas e na arte dos sushis clássicos.</p>
      </div>
      <div class="card">
        <div class="photo photo-dark">
          <img src="/Hotel-Green-Garden/assets/image/chefe_miki.png" alt="" style="max-width: 245px; border-radius: 10px;">
        </div>
        <h3>Chef Miki Yamamoto</h3>
        <p>Inovador da gastronomia japonesa, cria releituras modernas com elegância e precisão milimétrica.</p>
      </div>
      <div class="card">
        <div class="photo photo-light">
          <img src="/Hotel-Green-Garden/assets/image/chefe_marsia.png" alt="" style="max-width: 245px; border-radius: 10px;">
        </div>
        <h3>Chef Rafaela Cruz</h3>
        <p>Combina o toque vibrante da culinária latina com a delicadeza e a técnica da gastronomia japonesa.</p>
      </div>
    </div>
  </section>

  <section class="awards">
    <h2>Prêmios</h2>
    <div class="award-icons">
      <div class="icon">
        <img class="icon" src="\Hotel-Green-Garden\assets\image\michelin.png" style="max-width: 80px; margin-top: 25px; margin-bottom: 10px;" alt=""><br>
        <p style=" font-size: 1.3rem;">Michelin</p>
      </div>
      <div class="icon">
        <img class="icon" src="\Hotel-Green-Garden\assets\image\chefsaward.png" style="max-width: 90px;" alt="">
        <p style=" font-size: 1.3rem; white-space: nowrap; ">Chef’s Award</p>
      </div>
    </div>
  </section>


  <section class="contact">
    <div class="contact-grid">
      <div>
        <h4>Visite a gente!</h4>
        <p>123 Copacabana<br>Rio de Janeiro, Brazil.</p>
      </div>
      <div class="contact-hours">
        <h4>Horas</h4>
        <p style="white-space: nowrap;">Terça–Quinta: 11:00 – 00:00</p>
        <p style="white-space: nowrap;">Sexta–Domingo: 11:00 – 02:00</p>
        <p style="text-align: center;">Segunda: Fechado</p>

      </div>
      <div>
        <h4>Contato</h4>
        <p>info@restaurant.com<br>+21 91234-5678</p>
      </div>
    </div>
    <div class="restaurant-social">
      <h2>Siga nossas redes sociais para mais informações.</h2>
      <div class="social-icon">
        <img src="/Hotel-Green-Garden/assets/image/instagram.png" alt="Instagram" style="max-width: 35px; cursor: pointer;">
        <img src="/Hotel-Green-Garden/assets/image/facebook.png" alt="Facebook" style="max-width: 35px; cursor: pointer;">
      </div>
    </div>

  </section>
</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>