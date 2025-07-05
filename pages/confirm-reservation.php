<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

if (!isset($_SESSION['reserva'], $_SESSION['usuario_id'])) {
    header('Location: /Hotel-Green-Garden/pages/success-reservation.php');
    exit();
}

$reserva = $_SESSION['reserva'];

$mapaSuites = [
    'classic' => ['tipo' => 'Classic', 'preco' => 300],
    'master'  => ['tipo' => 'Master', 'preco' => 500]
];

$infoSuite = $mapaSuites[$reserva['suite']] ?? null;
if (!$infoSuite) {
    die("Suíte inválida.");
}

$checkin = new DateTime($reserva['checkin']);
$checkout = new DateTime($reserva['checkout']);
$dias = max($checkin->diff($checkout)->days, 1);
$preco_total = $dias * $infoSuite['preco'];

// Obter o quarto correspondente à suíte
$stmtQuarto = $pdo->prepare("SELECT id FROM quartos WHERE tipo = :tipo LIMIT 1");
$stmtQuarto->execute([':tipo' => $infoSuite['tipo']]);
$quarto = $stmtQuarto->fetch();

if (!$quarto) {
    die("Nenhum quarto disponível para essa suíte.");
}

$id_quarto = $quarto['id'];
// Verificar se o quarto já está reservado para as datas selecionadas
$stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM reservas_quartos WHERE id_quarto = :id_quarto 
AND ((data_checkin <= :checkout AND data_checkout >= :checkin) 
 OR (data_checkin >= :checkin AND data_checkin <= :checkout))");


// Inserir no banco
$stmt = $pdo->prepare("INSERT INTO reservas_quartos 
    (id_usuario, id_quarto, tipo_suite, data_checkin, data_checkout, num_adultos, num_criancas, preco_total) 
    VALUES 
    (:id_usuario, :id_quarto, :tipo_suite, :data_checkin, :data_checkout, :num_adultos, :num_criancas, :preco_total)");

try {
    $stmt->execute([
        ':id_usuario'   => $_SESSION['usuario_id'],
        ':id_quarto'    => $id_quarto,
        ':tipo_suite'   => $reserva['suite'],
        ':data_checkin' => $reserva['checkin'],
        ':data_checkout' => $reserva['checkout'],
        ':num_adultos'  => $reserva['adultos'],
        ':num_criancas' => $reserva['criancas'],
        ':preco_total'  => $preco_total
    ]);
} catch (PDOException $e) {
    die("Erro ao salvar reserva: " . $e->getMessage());
}


unset($_SESSION['reserva']); 

header('Location: /Hotel-Green-Garden/pages/success-reservation.php');


exit();
