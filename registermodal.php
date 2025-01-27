<!--Cuando llamemos a este modal la sesión de Google está abierta, pero el usuario
aún no está en la base de datos.
Cuando el usuario complete todos los campos correctamente y pulse "Submit" se redigirá 
a register.php. En caso de que cancele el modal redirigimos a logout.php, ya que el 
registro es obligatorio.
-->
<?php
$pattern1 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/'; // Email
$pattern2 = '/^[a-zA-Z\s]+$/'; // Nombre, Apellidos, Pais
$pattern3 = '/^[a-zA-Z0-9]*$/'; // CP
$pattern4 = '/^[6-9]\d{0,8}$/'; // Telf

$error = false;

if (isset($_POST['signup'])) {
  if (empty($_POST['email']) || !preg_match($pattern1, $_POST['email']) || empty($_POST['pass']) || empty($_POST['confirmPass']) || $_POST['pass'] != $_POST['confirmPass'] || empty($_POST['firstname']) || empty($_POST['lastname'])  || empty($_POST['birthdate']) || empty($_POST['pais']) || !preg_match($pattern2, $_POST['pais']) || empty($_POST['postalcode']) || !preg_match($pattern3, $_POST['postalcode']) || empty($_POST['telefono']) || !preg_match($pattern4, $_POST['telefono'])) {
    $error = true;
  }

  if (!$error) {
    if (registro($_POST['email'], $_POST['pass'], $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST['pais'], $_POST['postalcode'], $_POST['telefono'],  $_POST['imagen'])) {
      header("Location:index.php");
      exit;
    } else {

      $error = true;
    }
  }
}
?>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none';location.href='logout.php'" class="close"
    title="Close Modal">&times;</span>
  <form class="modal-content" action="" method="POST">
    <div class="container">
      <img src="<?php echo $_SESSION['usuario']->imagen ?>">
      <input type="hidden" name="imagen" value="<?php echo $_SESSION['usuario']->imagen ?>">
      <h1 class="modal-title">Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <?php
      if ($error) {
        echo "<span class='error'>Algo ha salido mal :(</span>";
      }
      ?>
      <div class='row-form'>
        <div class='column-form'>
          <label for="email"><b>E-mail</b></label>
          <input type="email" id="email" placeholder="Enter Email" name="email"
            value="<?php echo $_SESSION['usuario']->correo; ?>" readonly>
          <label for="firstname"><b>First Name</b></label>
          <input type="text" name="firstname" value="<?php echo $_SESSION['usuario']->nombre; ?>" readonly>
          <label for="lastname"><b>Last Name</b></label>
          <input type="text" name="lastname" value="<?php echo $_SESSION['usuario']->apellidos; ?>" readonly>
          <label for="pass"><b>Clave</b></label>
          <input type="password" id="password" name="pass" required>
          <span id="errorPass" class="noError">El contraseña debe superar los 8 carácteres y contener mayúsuculas, mínusculas, números y alfanuméricos</span>
          <label for="confirmPass"><b>Confirmar Clave</b></label>
          <input type="password" id="password2" name="confirmPass" required>
          <span id="errorPass2" class="noError">Las contraseñas deben de coincidir</span>
        </div>
        <div class='column-form'>
          <label for=" birthdate"><b>Birth date</b></label>
          <input type="date" name="birthdate" required>
          <label for="postalcode"><b>Postal Code</b></label>
          <input type="text" id="cp" placeholder="Enter six digit postal code" name="postalcode" required>
          <span id="errorCP" class="noError">El Código Postal solo acepta carácteres alfanuméricos (no se admiten acentos, tampoco ñ/ç/similares)</span>

          <label for="telefono"><b>Phone Number</b></label>
          <input type="tel" id="telf" name="telefono" required>
          <span id="errorTelf" class="noError">El teléfono debe de comenzar por 6, 7, 8 ó 9 y tener un máximo de 9 digitos</span>
          <label for="pais"><b>Pais</b></label>
          <input type="text" id="pais" name="pais" required>
          <span id="errorPais" class="noError">El pais solo puede estar compuesto por letras y espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
        </div>
      </div>
      <label>
        <input type="checkbox" required name="terms" style="margin-bottom:15px"> I've read and accept the <a
          href="about.php" style="color:dodgerblue" target="_blank">Terms & Privacy</a>.
      </label>
      <div class="clearfix">
        <button type="button"
          onclick="document.getElementById('id01').style.display='none';location.href='logout.php'"
          class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn" name="signup">Sign Up</button>
      </div>
    </div>
  </form>

  <script src="/js/signup.js"></script>
</div>