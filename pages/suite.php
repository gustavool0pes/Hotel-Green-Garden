<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>

<main>

    <!-- Suite Classic -->
    <section class="accommodation-suite" style="margin-top: 50px;">
        <div class="accommodation-text" style="margin-top: 70px;">
            <h2 style="text-align: center;">Suite Classic</h2>
            <p>Desfrute do conforto e da elegância atemporal da nossa Suíte Clássica.
                Projetada para oferecer uma estadia acolhedora e funcional, esta suíte combina um design sofisticado com todas as comodidades modernas necessárias para o seu descanso.
                Ideal para viagens de negócios ou lazer, a Suíte Clássica é o refúgio perfeito para relaxar após um dia explorando a cidade ou em compromissos importantes.
                Viva uma experiência de hospedagem que valoriza a tradição e o bem-estar.</p>
            <div class="btn">
                <a href="\Hotel-Green-Garden\pages\reservation-hotel.php">Faça sua reserva</a>
            </div>
        </div>
        <div class="img-suite" style="margin-top: 50px;">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room1.jpg" class="d-block w-100" alt="Suite 1">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room2.jpg" class="d-block w-100" alt="Suite 2">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room3.jpg" class="d-block w-100" alt="Suite 3">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room5.jpg" class="d-block w-100" alt="Suite 4">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room7.jpg" class="d-block w-100" alt="Suite 5">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>

        </div>
    </section>

    <div class="greengarden-text" style="background-color: #000; color: #fff;">
        <p style="text-align: center;">Onde o conforto encontra a elegância: cada detalhe é pensado para proporcionar uma experiência de hospedagem excepcional e memorável.</p>
    </div>

    <section class="accommodation-suite">
        <div class="accommodation-text">
            <h2 style="text-align: center;">Suite Master</h2>
            <p>Experimente o auge do luxo e da exclusividade em nossa Suite Luxo Especial. Com um design arrojado e acabamentos de alta qualidade, esta suíte oferece um ambiente
                de requinte e privacidade. Relaxe em uma banheira espaçosa, aproveite a vista privilegiada e desfrute de serviços personalizados. Criada para proporcionar
                uma experiência inesquecível, a Suite Luxo Especial é perfeita para ocasiões únicas, celebrações ou para quem busca o máximo em conforto e sofisticação.</p>
            <div class="btn">
                <a href="\Hotel-Green-Garden\pages\reservation-hotel.php">Faça sua reserva</a>
            </div>
        </div>
        <div class="img-suite">
            <div id="carouselLuxoEspecial" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room9.jpg" class="d-block w-100" alt="Suite 1">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room11.jpg" class="d-block w-100" alt="Suite 2">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room12.jpg" class="d-block w-100" alt="Suite 3">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room10.jpg" class="d-block w-100" alt="Suite 4">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room6.jpg" class="d-block w-100" alt="Suite 5">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="/Hotel-Green-Garden/assets/image/room8.jpg" class="d-block w-100" alt="Suite 6">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselLuxoEspecial" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>
    </section>

</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>