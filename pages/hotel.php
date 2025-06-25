<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>

<!-- Lobby -->
<section class="accommodation-row">
    <div class="accommodation-text">
        <h2>Lobby</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
    </div>
    <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/lobby.jpg" alt="Lobby">
    <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/lobby1.jpg" alt="Lobby">
</section>


<!-- Texto Central -->
<div class="greengarden-text">
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic velit reiciendis vel modi, officia dolorum, reprehenderit quidem, possimus quas sed in quos molestiae illum vitae perferendis earum omnis ducimus consequuntur?</p>
</div>

<!-- Quartos -->
<section class="accommodation-about">
    <div class="accommodation-text">
        <h2>Quartos</h2>
        <p>Em todos os hotéis da Green Garden, cada manhã começa de forma especial com um café colonial gratuito...</p>
    </div>

    <div class="img-container">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/room1.jpg" alt="Suíte Master">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/room2.jpg" alt="Suíte Master">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/room5.jpg" alt="Suíte Master">
    </div>

    <div class="btn">
        <a href="/Hotel-Green-Garden/pages/suite.php">Ver mais</a>
    </div>
</section>

<!-- Spa -->
<section class="accommodation-about">
    <div class="accommodation-text">
        <h2>Spa</h2>
        <p>Em todos os hotéis da Green Garden, cada manhã começa de forma especial com um café colonial gratuito...</p>
    </div>

    <div class="img-container">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/spa.jpg" alt="Spa">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/spa2.jpg" alt="Spa">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/spa3.jpg" alt="Spa">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/spa4.jpg" alt="Spa">
    </div>
</section>

<!-- Restaurante -->
<section class="accommodation-about">
    <div class="accommodation-text">
        <h2>Restaurante</h2>
        <p>Em todos os hotéis da Green Garden, cada manhã começa de forma especial com um café colonial gratuito...</p>
    </div>

    <div class="img-container">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/restaurant1.jpg" alt="Restaurante">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/restaurant2.jpg" alt="Restaurante">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/restaurant4.jpg" alt="Restaurante">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/restaurant3.jpg" alt="Restaurante">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/restaurant6.jpg" alt="Restaurante">
    </div>

    <div class="btn">
        <a href="/Hotel-Green-Garden/pages/restaurant.php">Ver mais</a>
    </div>
</section>

<!-- Sala de Reunião  -->
<section class="accommodation-row">
    <div class="accommodation-text">
        <h2>Sala para Reunião</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
    </div>
    <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/reunioes.jpg" alt="Reunião">
    <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/reunioes1.jpg" alt="Reunião">
</section>


<!-- Bar -->
<section class="accommodation-about">
    <div class="accommodation-text">
        <h2>Bar</h2>
        <p>Em todos os hotéis da Green Garden, cada manhã começa de forma especial com um café colonial gratuito...</p>
    </div>

    <div class="img-container">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/bar.jpg" alt="Bar">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/bar4.jpg" alt="Bar">
        <img class="img-hotel" src="/Hotel-Green-Garden/assets/image/bar4.jpg" alt="Bar">
    </div>
</section>

<!-- Lightbox para abrir imagem em tela cheia -->
<div id="lightbox" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999;">
    <img id="lightbox-img" src="" style="max-width:90%; max-height:90%; border-radius:10px;">
</div>

<script>
    const imagens = document.querySelectorAll('.img-hotel');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');

    imagens.forEach(img => {
        img.addEventListener('click', () => {
            lightbox.style.display = 'flex';
            lightboxImg.src = img.src;
        });
    });

    lightbox.addEventListener('click', () => {
        lightbox.style.display = 'none';
    });
</script>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>
