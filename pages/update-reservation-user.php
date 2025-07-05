<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /Hotel-Green-Garden/pages/login.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reserva_id = $_POST['reserva_id'] ?? null;
    $checkin = $_POST['checkin'] ?? null;
    $checkout = $_POST['checkout'] ?? null;
    $adultos = $_POST['adultos'] ?? null;
    $criancas = $_POST['criancas'] ?? null;

    
    if ($reserva_id && $checkin && $checkout && $adultos !== null && $criancas !== null) {
        try {
            
            $stmt = $pdo->prepare("
                UPDATE reservas_quartos
                SET data_checkin = :checkin,
                    data_checkout = :checkout,
                    num_adultos = :adultos,
                    num_criancas = :criancas
                WHERE id = :id AND id_usuario = :usuario_id
            ");
            $stmt->execute([
                ':checkin' => $checkin,
                ':checkout' => $checkout,
                ':adultos' => $adultos,
                ':criancas' => $criancas,
                ':id' => $reserva_id,
                ':usuario_id' => $_SESSION['usuario_id']
            ]);

            $_SESSION['mensagem_sucesso'] = "Reserva atualizada com sucesso!";
        } catch (PDOException $e) {
            $_SESSION['mensagem_erro'] = "Erro ao atualizar reserva: " . $e->getMessage();
        }
    } else {
        $_SESSION['mensagem_erro'] = "Preencha todos os campos corretamente.";
    }
}


header('Location: reservation-user.php');
exit();

?>

