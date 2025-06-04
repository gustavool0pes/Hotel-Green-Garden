<!-- Header -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/header.php'); ?>

<!-- Login Section -->
<main style="min-height: 100vh; background-color: #c8c8c8; display: flex; justify-content: center; align-items: center; padding: 2rem 1rem;">
  <div class="login-box">
    <div class="login-snip">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
      <label for="tab-1" class="tab">Login</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up">
      <label for="tab-2" class="tab">Cadastro</label>
      <div class="login-space">
        <!-- LOGIN -->
        <div class="login">
          <br>
          <div class="group">
            <label for="user" class="label">Email</label>
            <input id="user" type="text" class="input" placeholder="Coloque seu email">
          </div>
          <div class="group">
            <label for="pass" class="label">Senha</label>
            <input id="pass" type="password" class="input" placeholder="Digite sua senha">
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Lembrar de mim</label>
          </div>
          <div class="group">
            <input type="submit" class="button" value="Logar">
          </div>
          <div class="hr"></div>
          <div class="foot">
            <a href="#">Esqueceu a senha?</a>
          </div>
        </div>

        <!-- CADASTRO -->
        <div class="sign-up-form">
          <br>
          <div class="group">
            <label for="user" class="label">Email</label>
            <input id="user" type="text" class="input" placeholder="Coloque seu email">
          </div>
          <div class="group">
            <label for="pass" class="label">Senha</label>
            <input id="pass" type="password" class="input" placeholder="Crie sua senha">
          </div>
          <div class="group">
            <label for="pass" class="label">Repita a senha</label>
            <input id="pass" type="password" class="input" placeholder="Repita a senha">
          </div>
          <div class="group">
            <label for="tel" class="label">Telefone</label>
            <input id="tel" type="tel" class="input" placeholder="Digite seu telefone">
          </div>
          <div class="group">
            <input type="submit" class="button" value="Cadastrar">
          </div>
          <div class="hr"></div>
          <div class="foot">
            <a href="#">Ja possui conta?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Hotel-Green-Garden/includes/footer.php'); ?>
