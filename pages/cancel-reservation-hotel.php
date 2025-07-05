<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /Hotel-Green-Garden/pages/login.php');
    exit();
}

$id_usuario = $_SESSION['usuario_id'];
$reserva_id = $_GET['id'] ?? null;

if ($reserva_id) {
    try {
        // Verificar se a reserva pertence ao usuário
        $verifica = $pdo->prepare("SELECT * FROM reservas_quartos WHERE id = :id AND id_usuario = :usuario_id");
        $verifica->execute([
            ':id' => $reserva_id,
            ':usuario_id' => $id_usuario
        ]);

        if ($verifica->rowCount() === 1) {
            // Excluir a reserva
            $delete = $pdo->prepare("DELETE FROM reservas_quartos WHERE id = :id");
            $delete->execute([':id' => $reserva_id]);

            $_SESSION['mensagem_sucesso'] = "Reserva cancelada com sucesso.";
        } else {
            $_SESSION['mensagem_erro'] = "Reserva não encontrada ou não pertence a você.";
        }
    } catch (PDOException $e) {
        $_SESSION['mensagem_erro'] = "Erro ao cancelar: " . $e->getMessage();
    }
} else {
    $_SESSION['mensagem_erro'] = "ID da reserva inválido.";
}

header('Location: reservation-user.php');
exit();
