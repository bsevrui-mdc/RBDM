<?php
$pattern1 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/'; // Email
$pattern2 = '/^[a-zA-Z\s]+$/'; // Nombre, Apellidos, Pais
$pattern3 = '/^[a-zA-Z0-9]*$/'; // CP
$pattern4 = '/^[6-9]\d{0,8}$/'; // Telf

$errorCaptcha = false;
$errorRegistro = false;

if (isset($_POST['signup'])) {
  if ($_POST['captcha'] != $_COOKIE['captchaString']) {
    $errorCaptcha = true;
  } else {
    setcookie("captchaString", "", time() - 3600, '/');

    if (empty($_POST['email']) || !preg_match($pattern1, $_POST['email']) || empty($_POST['password']) || empty($_POST['password']) || $_POST['password'] != $_POST['password'] || empty($_POST['firstname']) || empty($_POST['lastname'])  || empty($_POST['birthdate']) || empty($_POST['pais']) || !preg_match($pattern2, $_POST['pais']) || empty($_POST['cp']) || !preg_match($pattern3, $_POST['cp']) || empty($_POST['telf']) || !preg_match($pattern4, $_POST['telf'])) {
      $errorRegistro = true;
    } else {
      if (registro($_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST['pais'], $_POST['cp'], $_POST['telf'],  $_POST['imagen'])) {
        header("Location:index.php");
        exit;
      } else {
        $errorRegistro = true;
      }
    }
  }
}
?>
<div id="id01" class="registermodal modal" role="dialog" aria-labelledby="titulo-modal">
  <span onclick="document.getElementById('id01').style.display='none';location.href='logout.php'" class="close"
    title="Close Modal" aria-label="Cancelar registro">&times;</span>
  <form class="modal-content" action="" method="POST">
    <div class="container">
      <img src="<?php echo $_SESSION['usuario']->imagen ?>" alt="Imagen del usuario">
      <input type="hidden" name="imagen" value="<?php echo $_SESSION['usuario']->imagen ?>">
      <h1 id="titulo-modal" class="modal-title">Registrarse</h1>
      <p>Por favor rellena este formulario para registrarte.</p>
      <hr>
      <?php
      if ($errorRegistro) {
        echo "<span class='error' role='alert'>Algo ha salido mal :(</span>";
      }
      ?>
      <div class='row-form'>
        <div class='column-form'>
          <label for="email"><b>E-mail</b></label>
          <input type="email" id="email" placeholder="Enter Email" name="email"
            value="<?php echo $_SESSION['usuario']->correo; ?>" readonly>
          <label for="firstname"><b>First Name</b></label>
          <input type="text" id="firstname" name="firstname"
            value="<?php echo $_SESSION['usuario']->nombre; ?>" readonly>
          <label for="lastname"><b>Last Name</b></label>
          <input type="text" id="lastname" name="lastname"
            value="<?php echo $_SESSION['usuario']->apellidos; ?>" readonly>
          <label for="password"><b>Clave</b></label>
          <input type="password" id="password" name="password" required>
          <span id="errorPass" role="alert" class="noError">
            El contraseña debe superar los 8 carácteres y
            contener
            mayúsuculas, mínusculas, números y alfanuméricos</span>
          <label for="password2"><b>Confirmar Clave</b></label>
          <input type="password" id="password2" name="password2" required>
          <span id="errorPass2" role="alert" class="noError">Las contraseñas deben de coincidir</span>
        </div>

        <div class='column-form'>
          <label for="birthdate"><b>Birth date</b></label>
          <input type="date" name="birthdate" id="birthdate" required>
          <label for="cp"><b>Postal Code</b></label>
          <input type="text" id="cp" placeholder="Enter six digit postal code" name="cp" required>
          <span id="errorCP" role="alert" class="noError">El Código Postal solo acepta carácteres
            alfanuméricos (no se
            admiten acentos, tampoco ñ/ç/similares)</span>

          <label for="telf"><b>Phone Number</b></label>
          <input type="tel" id="telf" name="telf" required>
          <span id="errorTelf" role="alert" class="noError">
            El teléfono debe de comenzar por 6, 7, 8 ó 9 y
            tener un máximo
            de 9 digitos</span>
          <label for="pais"><b>Pais</b></label>
          <input type="text" id="pais" name="pais" required>
          <span id="errorPais" role="alert" class="noError">
            El pais solo puede estar compuesto por letras y
            espacios (no se
            admiten acentos, tampoco ñ/ç/similares)</span>

          <div class="mb-3 text-center">
            <img id="captchaImage" src="./includes/captcha.php" alt="CAPTCHA" class="mb-3">
            <i id="refreshCaptcha" aria-label="Recargar Captcha" role="button" class="fas fa-redo"></i>
            <label for="captcha" class="visually-hidden">Captcha:</label>
            <input type="text" id="captcha" name="captcha" class="form-control"
              placeholder="Introduzca el CAPTCHA mostrado arriba">
          </div>
        </div>
      </div>
      <label>
        <input type="checkbox" required name="terms" style="margin-bottom:15px">He leido y acepto los <a
          href="about.php" style="color:dodgerblue" target="_blank">Terminos & Condiciones</a>.
      </label>
      <div class="clearfix">
        <button type="button"
          onclick="document.getElementById('id01').style.display='none';location.href='logout.php'"
          class="cancelbtn btn-primary">Cancelar</button>
        <button type="submit" class="signupbtn btn-primary" name="signup">Registrar</button>
      </div>
    </div>
  </form>

  <script src="/js/signup.js"></script>
  <script src="./js/captcha.js"></script>
</div>