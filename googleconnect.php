<?php
//Cuando el index.php es llamado desde Google tras la autenticación
//nos pasa el parámetro "code" mediante una petición get.
if (isset($_GET["code"])) {
  //Obtenemos el objeto token
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //Si ha habido algún error en la autenticación, el array asociativo $token 
  //contendrá la variable "error", en caso contrario hay éxito y 
  //ya podemos recuperar los datos del perfil del usuario

  if (!isset($token['error'])) {

    //Set the access token used for requests
    $google_client->setAccessToken($token['access_token']);

    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['access_token'] = $token['access_token'];

    //Create Object of Google Service OAuth 2 class
    $google_service = new Google_Service_Oauth2($google_client);


    //Get user profile data from google
    $data = $google_service->userinfo->get();

    if (!isset($_SESSION['usuario']) || !is_object($_SESSION['usuario'])) {
      $_SESSION['usuario'] = new stdClass(); // Crear un objeto vacío si no existe
    }

    //Below you can find Get profile data and store into $_SESSION variable
    if (!empty($data['given_name'])) {
      $_SESSION['usuario']->nombre = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['usuario']->apellidos = $data['family_name'];
    }

    if (!empty($data['email'])) {
      $_SESSION['usuario']->correo = $data['email'];
    }

    if (!empty($data['gender'])) {
      $_SESSION['user_gender'] = $data['gender'];
    }

    if (!empty($data['picture'])) {
      $_SESSION['usuario']->imagen = $data['picture'];
    }
    $email = $data['email'];

    //A continuación recuperamos el usuario de la base de datos
    //Su id quedará almacenado en la sesión para uso posterior.

    $sql = "SELECT * FROM usuario WHERE correo = '$email'";

    if (!$resultado = $conn->query($sql)) {
      // ¡Oh, no! La consulta falló. 
      echo "Lo sentimos, este sitio web está experimentando problemas.";

      // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
      // cómo obtener información del error
      echo "Error: La ejecución de la consulta falló debido a: \n";
      echo "Query: " . $sql . "\n";
      echo "Errno: " . $conn->errno . "\n";
      echo "Error: " . $conn->error . "\n";
      exit;
    } else {
      if ($resultado->rowCount() > 0) {
        $usuario = $resultado->fetchObject();
        $_SESSION["usuario"] = $usuario;
        header("Location:index.php");
        exit;
      }
    }
  }


  //Si no se ha hecho el login con Google correctamente mostramos un botón para logarse.
  if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="assets/img/sign-in-with-google.png" class="googlebtn"/></a>';
  }
}
