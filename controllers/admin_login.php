<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<main style="min-height: 100vh; background-color: #c8c8c8; display: flex; justify-content: center; align-items: center; padding: 2rem 1rem;">
    <div class="login-box">
        <div class="login-snip">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab" style="cursor: none; text-decoration: none;">Login Administrador</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <div class="login-space">

                <?php if (!empty($erro)): ?>
                    <div style="color: red; text-align: center; margin-bottom: 10px;">
                        <?= htmlspecialchars($erro) ?>
                    </div>
                <?php endif; ?>

                <!-- LOGIN -->
                <div class="login">
                    <form action="login.php" method="POST">
                        <h1></h1>
                        <div class="hr"></div>
                        <div class="group">
                            <label for="login-email" class="label">Email</label>
                            <input id="login-email" name="email" type="email" class="input" required placeholder="Coloque seu email">
                        </div>
                        <div class="group">
                            <label for="login-pass" class="label">Senha</label>
                            <input id="login-pass" name="senha" type="password" class="input" required placeholder="Digite sua senha">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Logar" name="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>