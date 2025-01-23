<?php
session_start();
include("funciones.php");
$conn = conectarConBBDD();

/*if ($_SESSION['captcha_text'] != $_POST['captcha_challenge']) {
  header("Location:index.php?captchaerror");
} else {
 */

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$birthdate = $_POST['birthdate'];
$postalcode = $_POST['postalcode'];
$phone = $_POST['telefono'];
$pais = $_POST['pais'];
$imagen = $_POST['imagen'];

$claveEncriptada = password_hash($pass, PASSWORD_DEFAULT); // Encriptamos la contraseña

$sql = "INSERT INTO usuario (correo,clave,nombre,apellidos,fecha,pais,codigo_postal,telefono,tipo,imagen)" .
  " VALUES ('$email','$claveEncriptada','$firstname','$lastname','$birthdate','$pais','$postalcode','$phone','cliente','$imagen')";

try {
  $insertado = $conn->exec($sql);
  if ($insertado) {
    try {
      $result = $conn->prepare("SELECT * FROM usuario WHERE correo=?");
      $result->bindParam(1, $email);
      $result->execute();
      if ($result->rowCount()) {
        $user = $result->fetchObject();
        $_SESSION['usuario'] = $user;
        header("Location:index.php?email=" . $user->correo);
        exit;
      }
    } catch (PDOException $ex) {
      echo $ex->getCode() . "<br>" . $ex->getMessage();
    }
  }
} catch (PDOException $ex) {
  echo $ex->getCode() . "<br>" . $ex->getMessage();
  header("Location:logout.php");
  exit;
}
//}