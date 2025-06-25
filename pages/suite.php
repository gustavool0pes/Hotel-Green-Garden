<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>

<main>

    <!-- Suite Classic -->
    <section class="accommodation-suite">
        <div class="accommodation-text">
            <h2 style="text-align: center;">Suíte Classic</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit facilis veritatis libero
                inventore delectus dolorem exercitationem quia, sunt atque fugiat culpa quas fuga porro quae reiciendis. Iusto rerum sed repellendus?</p>
            <div class="btn">
                <a href="\Hotel-Green-Garden\pages\reservation.php">Faça sua reserva</a>
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

    <div class="greengarden-text">
        <p style="text-align: center;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt sint pariatur corrupti suscipit cumque error quibusdam. Perspiciatis, minima fuga at sit, inventore reiciendis iste consectetur laborum voluptatum beatae id facere.</p>
    </div>

    <section class="accommodation-suite">
        <div class="accommodation-text">
            <h2 style="text-align: center;">Suíte Luxo Especial</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit facilis veritatis libero
                inventore delectus dolorem exercitationem quia, sunt atque fugiat culpa quas fuga porro quae reiciendis. Iusto rerum sed repellendus?</p>
            <div class="btn">
                <a href="\Hotel-Green-Garden\pages\reservation.php">Faça sua reserva</a>
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