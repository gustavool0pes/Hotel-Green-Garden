<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['reserva_id'];
    $data = $_POST['data_reserva'];
    $hora = $_POST['hora_reserva'];
    $pessoas = $_POST['quantidade_pessoas'];

    $stmt = $pdo->prepare("UPDATE reservas_restaurante SET data_reserva = ?, hora_reserva = ?, quantidade_pessoas = ? WHERE id = ?");
    $sucesso = $stmt->execute([$data, $hora, $pessoas, $id]);

    if ($sucesso) {
        $_SESSION['mensagem_sucesso'] = 'Reserva do restaurante atualizada com sucesso!';
    } else {
        $_SESSION['mensagem_erro'] = 'Erro ao atualizar a reserva.';
    }

    header('Location: /Hotel-Green-Garden/pages/reservation-user.php');
    exit();
}
?>