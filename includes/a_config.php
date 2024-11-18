<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/index.php":
			$CURRENT_PAGE = "Index"; 
			$PAGE_TITLE = "GCM - RBDM";
			break;
		case "/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contacto - RBDM";
			break;
		case "/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "Términos Legales - RBDM";
			break;
		case "/login.php":
			$CURRENT_PAGE = "Login";
			$PAGE_TITLE = "Login - RBDM";
			break;
		case "/signup.php":
			$CURRENT_PAGE = "Sign Up";
			$PAGE_TITLE = "Registro - RBDM";
			break;
		case "/admin.php":
			$CURRENT_PAGE = "admin";
			$PAGE_TITLE = "Administración - RBDM";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "GCM - RBDM";
			break;
	}
?>