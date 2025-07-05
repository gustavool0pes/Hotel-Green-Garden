<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/conection.php');

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /Hotel-Green-Garden/pages/login.php');
    exit();
}

$id_usuario = $_SESSION['usuario_id'];

// Buscar reservas do hotel
$stmtHotel = $pdo->prepare("SELECT * FROM reservas_quartos WHERE id_usuario = :id_usuario");
$stmtHotel->execute([':id_usuario' => $id_usuario]);
$reservasHotel = $stmtHotel->fetchAll(PDO::FETCH_ASSOC);

// Buscar reservas do restaurante
$stmtRestaurante = $pdo->prepare("SELECT * FROM reservas_restaurante WHERE id_usuario = :id_usuario");
$stmtRestaurante->execute([':id_usuario' => $id_usuario]);
$reservasRestaurante = $stmtRestaurante->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<style>
    .user-reservation-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .user-reservation-content h1 {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 100px;
    }

    .user-reservation-content h2 {
        margin-top: 30px;
        color: #333;
    }

    .user-reservation-content table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .user-reservation-content table th,
    .user-reservation-content table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .user-reservation-content table th {
        background-color: #f2f2f2;
    }

    .user-reservation-content table tr:hover {
        background-color: #f1f1f1;
    }

    .user-reservation-content table a {
        color: #007bff;
        text-decoration: none;
    }

    .user-reservation-content table a:hover {
        text-decoration: underline;
    }

    .user-reservation-content p {
        text-align: center;
        color: #666;
    }

    .user-reservation-content .message {
        margin: 10px 0;
        padding: 10px;
        background: #d4edda;
        color: #155724;
        border-radius: 5px;
    }

    .user-reservation-content .error {
        margin: 10px 0;
        padding: 10px;
        background: #f8d7da;
        color: #721c24;
        border-radius: 5px;
    }

    .user-reservation-content .success {
        margin: 10px 0;
        padding: 10px;
        background: #d4edda;
        color: #155724;
        border-radius: 5px;
    }

    .user-reservation-content .success a {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 16px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .user-reservation-content .success a:hover {
        background: #218838;
    }

    .user-reservation-content form {
        display: flex;
        flex-direction: column;
    }

    .user-reservation-content form label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .user-reservation-content form input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .user-reservation-content form button {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .editar-btn,
    .editar-restaurante-btn,
    .btn-cancelar {
        padding: 6px 12px;
        margin: 2px;
        border-radius: 5px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    .editar-btn,
    .editar-restaurante-btn {
        background-color: #007bff;
        color: white;
    }

    .editar-btn:hover,
    .editar-restaurante-btn:hover {
        background-color: #0056b3;
    }

    a.btn-cancelar {
        background-color: #dc3545 !important;
        color: white !important;
        text-decoration: none !important;
        display: inline-block;
        padding: 6px 12px;
        margin: 2px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    a.btn-cancelar:hover {
        background-color: #c82333 !important;
    }



    .user-reservation-content form button:hover {
        background-color: #0056b3;
    }

    .user-reservation-content form input[type="date"],
    .user-reservation-content form input[type="time"] {
        width: 100%;
        max-width: 200px;
    }

    .user-reservation-content form input[type="number"] {
        width: 100%;
        max-width: 100px;
    }

    .user-reservation-content form button[type="submit"] {
        width: 100%;
        max-width: 150px;
        align-self: center;
    }

    .user-reservation-content h2 {
        text-align: center;
    }

    form {
        margin-top: 20px;
    }

    form label {
        margin-bottom: 5px;
    }

    form input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form button {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #0056b3;
    }

    form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
        background-color: #000;
        padding: 20px;
        border-radius: 8px;
        color: white;
    }

    form input {
        width: 100%;
        margin-bottom: 15px;
        margin: 0 auto;
    }

    form label {
        margin-bottom: 5px;
        font-weight: bold;
        color: white;
        margin: 0 auto;
    }

    @media (max-width: 768px) {

        .user-reservation-content table,
        .user-reservation-content thead,
        .user-reservation-content tbody,
        .user-reservation-content th,
        .user-reservation-content td,
        .user-reservation-content tr {
            display: block;
            width: 100%;
        }

        .user-reservation-content table thead {
            display: none !important;
            visibility: hidden;
            height: 0;
            overflow: hidden;
        }

        .user-reservation-content table tr {
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #fff;
        }

        .user-reservation-content table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        .user-reservation-content table td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            top: 10px;
            font-weight: bold;
            text-align: left;
        }
    }
</style>

<div class="user-reservation-content">
    <h1>Minhas Reservas</h1>

    <?php if (isset($_SESSION['mensagem_sucesso'])): ?>
        <div class="success" style="text-align: center;">
            <?= $_SESSION['mensagem_sucesso'] ?>
            <?php unset($_SESSION['mensagem_sucesso']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['mensagem_erro'])): ?>
        <div class="error">
            <?= $_SESSION['mensagem_erro'] ?>
            <?php unset($_SESSION['mensagem_erro']); ?>
        </div>
    <?php endif; ?>


    <h2>🏨 Hotel</h2>
    <?php if (count($reservasHotel) > 0): ?>
        <table>
            <tr>
                <th>Suíte</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Adultos</th>
                <th>Crianças</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($reservasHotel as $reserva): ?>
                <tr>
                    <td data-label="Suíte"><?= $reserva['tipo_suite'] ?></td>
                    <td data-label="Check-in"><?= $reserva['data_checkin'] ?></td>
                    <td data-label="Check-out"><?= $reserva['data_checkout'] ?></td>
                    <td data-label="Adultos"><?= $reserva['num_adultos'] ?></td>
                    <td data-label="Crianças"><?= $reserva['num_criancas'] ?></td>
                    <td data-label="Total">R$<?= $reserva['preco_total'] ?></td>
                    <td data-label="Ações">
                        <button class="editar-btn" data-id="<?= $reserva['id'] ?>"
                            data-checkin="<?= $reserva['data_checkin'] ?>"
                            data-checkout="<?= $reserva['data_checkout'] ?>"
                            data-adultos="<?= $reserva['num_adultos'] ?>"
                            data-criancas="<?= $reserva['num_criancas'] ?>">
                            Editar
                        </button>
                        |
                        <a class="btn-cancelar" href="cancel-reservation-hotel.php?id=<?= $reserva['id'] ?>">Cancelar</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>

        <!-- Formulário oculto -->
        <form id="editar-form" action="update-reservation-user.php" method="post" style="display:none;">
            <h3>Atualizar Reserva</h3>
            <input type="hidden" name="reserva_id" id="reserva_id">

            <label for="checkin">Novo Check-in:</label>
            <input type="date" name="checkin" id="form_checkin">

            <label for="checkout">Novo Check-out:</label>
            <input type="date" name="checkout" id="form_checkout">

            <label for="adultos">Adultos:</label>
            <input type="number" name="adultos" id="form_adultos" min="1">

            <label for="criancas">Crianças:</label>
            <input type="number" name="criancas" id="form_criancas" min="0">

            <button type="submit">Atualizar</button>
        </form>

    <?php else: ?>
        <p>Você não tem reservas de hotel.</p>
    <?php endif; ?>


    <h2>🍽️ Restaurante</h2>
    <?php if (count($reservasRestaurante) > 0): ?>
        <table>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Pessoas</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($reservasRestaurante as $reserva): ?>
                <tr>
                    <td><?= $reserva['data_reserva'] ?></td>
                    <td><?= $reserva['hora_reserva'] ?></td>
                    <td><?= $reserva['quantidade_pessoas'] ?></td>
                    <td>
                        <button class="editar-restaurante-btn"
                            data-id="<?= $reserva['id'] ?>"
                            data-data="<?= $reserva['data_reserva'] ?>"
                            data-hora="<?= $reserva['hora_reserva'] ?>"
                            data-pessoas="<?= $reserva['quantidade_pessoas'] ?>">
                            Editar
                        </button>
                        <a class="btn-cancelar" href="cancel-reservation-restaurant.php?id=<?= $reserva['id'] ?>">Cancelar</a>


                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Formulário oculto de edição de restaurante -->
        <form id="editar-form-restaurante" action="update-reservation-restaurant.php" method="post" style="display:none;">
            <h3>Atualizar Reserva do Restaurante</h3>
            <input type="hidden" name="reserva_id" id="reserva_restaurante_id">

            <label for="data_reserva">Nova Data:</label>
            <input type="date" name="data_reserva" id="form_data_reserva" required>

            <label for="hora_reserva">Nova Hora:</label>
            <input type="time" name="hora_reserva" id="form_hora_reserva" required>

            <label for="quantidade_pessoas">Pessoas:</label>
            <input type="number" name="quantidade_pessoas" id="form_quantidade_pessoas" min="1" required>

            <button type="submit">Atualizar</button>
        </form>

    <?php else: ?>
        <p>Você não tem reservas de restaurante.</p>
    <?php endif; ?>
</div>

<script>
    // Formulário de edição de reserva do hotel
    document.querySelectorAll('.editar-btn').forEach(button => {
        button.addEventListener('click', () => {

            const form = document.getElementById('editar-form');
            form.style.display = 'flex';


            document.getElementById('reserva_id').value = button.dataset.id;
            document.getElementById('form_checkin').value = button.dataset.checkin;
            document.getElementById('form_checkout').value = button.dataset.checkout;
            document.getElementById('form_adultos').value = button.dataset.adultos;
            document.getElementById('form_criancas').value = button.dataset.criancas;


            form.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

<script>
    // Formulário de edição de restaurante
    document.querySelectorAll('.editar-restaurante-btn').forEach(button => {
        button.addEventListener('click', () => {
            const formRestaurante = document.getElementById('editar-form-restaurante');
            formRestaurante.style.display = 'flex';

            document.getElementById('reserva_restaurante_id').value = button.dataset.id;
            document.getElementById('form_data_reserva').value = button.dataset.data;
            document.getElementById('form_hora_reserva').value = button.dataset.hora;
            document.getElementById('form_quantidade_pessoas').value = button.dataset.pessoas;

            formRestaurante.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>