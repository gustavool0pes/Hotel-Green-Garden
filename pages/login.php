<!-- Header -->
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php');
?>

<main style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 2rem 1rem;">

    <!-- LOGIN -->
    <div class="login-box" style="background-color: #000;">
        <form action="login.php" method="POST">
            <h1 style="color: #fff;">Login</h1>
            <br>
            <div class="group">
                <label for="login-email" class="label" style="color: #fff;">Email</label>
                <input id="login-email" name="email" type="email" class="input" required placeholder="Coloque seu email">
            </div>
            <div class="group">
                <label for="login-pass" class="label" style="color: #fff;">Senha</label>
                <input id="login-pass" name="senha" type="password" class="input" required placeholder="Digite sua senha">
            </div>
            <div class="group">
                <input id="check" type="checkbox" class="check" checked>
                <label for="check" style="color: #fff;">Lembrar de mim</label>
            </div>
            <div class="group">
                <input type="submit" class="button" value="Logar" name="login">
            </div>
            <div class="hr"></div>
            <div class="foot">
                <a href="\Hotel-Green-Garden\pages\cadastro.php" >Criar conta!</a><br><br>
                <a href="\Hotel-Green-Garden\forgot_password.php">Esqueceu a senha?</a>
            </div>
        </form>
    </div>

</main>



<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>