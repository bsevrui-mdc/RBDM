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
			$PAGE_TITLE = "Términos Legales";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "GCM - RBDM";
	}
?>