<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<main style="min-height: 80vh; display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center; padding: 2rem;">
    
    <h1 style="color: green; margin-bottom: 1.5rem;">Reserva Confirmada com Sucesso!</h1>
    <p>Obrigado por reservar conosco. Em breve entraremos em contato para mais detalhes.</p>
    
    <div style="margin-top: 2rem;">
        <a href="/Hotel-Green-Garden/index.php" style="background-color: #333; color: #fff; padding: 0.8rem 1.2rem; border-radius: 5px; text-decoration: none;">Voltar para o Início</a>
    </div>

</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>
