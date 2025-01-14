<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/index.php":
			$CURRENT_PAGE = "index"; 
			$PAGE_TITLE = "GCM - RBDM";
			break;
		case "/contact.php":
			$CURRENT_PAGE = "contact"; 
			$PAGE_TITLE = "Contacto - RBDM";
			break;
		case "/about.php":
			$CURRENT_PAGE = "about"; 
			$PAGE_TITLE = "Términos Legales - RBDM";
			break;
		case "/login.php":
			$CURRENT_PAGE = "login";
			$PAGE_TITLE = "Iniciar sesión - RBDM";
			break;
		case "/signup.php":
			$CURRENT_PAGE = "registro";
			$PAGE_TITLE = "Registro - RBDM";
			break;
		case "/topPeliculas.php":
			$CURRENT_PAGE = "topPeliculas";
			$PAGE_TITLE = "Top Películas - RBDM";
			break;
		case "/topSeries.php":
			$CURRENT_PAGE = "topSeries";
			$PAGE_TITLE = "Top Series - RBDM";
			break;
		case "/topGenero.php":
			$CURRENT_PAGE = "topGenero";
			$PAGE_TITLE = "Top Genero - RBDM";
			break;
		case "/eleccionGenero.php":
			$CURRENT_PAGE = "generos";
			$PAGE_TITLE = "Géneros - RBDM";
			break;
		case "/admin.php":
			$CURRENT_PAGE = "admin";
			$PAGE_TITLE = "Administración - RBDM";
			break;
		case "/usuario.php":
			$CURRENT_PAGE = "profile";
			$PAGE_TITLE = "Perfil - RBDM";
			break;
		case "/detalles.php":
			$CURRENT_PAGE = "details";
			$PAGE_TITLE = "Detalles - RBDM";
			break;
		default:
			$CURRENT_PAGE = "index";
			$PAGE_TITLE = "GCM - RBDM";
			break;
	}
?>