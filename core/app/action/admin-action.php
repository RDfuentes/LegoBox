<?php

if (isset($_GET["adm"]) && $_GET["adm"] == "register") {

	$ad = AdminData::getBy("usuario", $_POST["usuario"]);
	if ($ad == null) {
		$admin = new AdminData();
		$admin->nombres = $_POST["nombres"];
		$admin->apellidos = $_POST["apellidos"];
		$admin->email = $_POST["email"];
		$admin->usuario = $_POST["usuario"];
		$admin->password = sha1(md5($_POST["password"]));
		$admin->created_by = $_POST["created_by"];
		$admin->add();
		Core::alert("Administrador registrado con Exito!");
	} else {
		Core::alert("Error: Nombre de usuario repetido");
		Core::redir("./?view=register_admin&adm=register");
	}
	Core::redir("./?view=register_admin&adm=all");
} 

else if (isset($_GET["adm"]) && $_GET["adm"] == "delete") {
	$user = AdminData::getById($_GET["id"]);
	$user->del();
	Core::alert("Administrador eliminado con Exito!");
	Core::redir("./?view=register_admin&adm=all");
} 

else if (isset($_GET["adm"]) && $_GET["adm"] == "update") {
	$admin = AdminData::getById($_POST["admin_id"]);
	$admin->nombres = $_POST["nombres"];
	$admin->apellidos = $_POST["apellidos"];
	$admin->email = $_POST["email"];
	$admin->usuario = $_POST["usuario"];
	$admin->password = sha1(md5($_POST["password"]));
	$admin->estado = $_POST["estado"];
	$admin->created_by = $_POST["created_by"];
	$admin->update();
	Core::alert("Administrador actualizado con Exito!");
	Core::redir("./?view=register_admin&adm=all");
} 

//FUNCION SOLICITUD DE CAMBIO DE CONTRASEÑA
else if (isset($_GET["adm"]) && $_GET["adm"] == "passwordreset") {
	$ad = AdminData::getBy("email", $_POST["email"]);
	if ($ad == null) {
		Core::alert("Error: El correo electronico no existe");
		Core::redir("./?view=reiniciarpassword&adm=passwordreset");
	} else {
		$ad->email = $_POST["email"];
		$ad->olvido_pass_iden = $_POST["olvido_pass_iden"];
		$ad->updatepassword();

		// PROCESO DE ENVIO DEL MENSAJE COMO SONSTANCIA
		include("sendemail.php"); // documento sendemail.php

		/*Configuracion de variables para enviar el correo*/
		$mail_username = "rdfuentes@acredicom.com.gt"; //Correo electronico remitente
		$mail_userpassword = "Ir0nM@n21"; //Contraseña remitente 
		$mail_addAddress = $_POST["email"]; //Correo de receptor variable
		$olvido_pass_iden = $_POST["olvido_pass_iden"]; //Correo de receptor variable

		/*Inicio captura de datos enviados por $_POST para enviar el correo */
		$mail_setFromEmail = "rdfuentes@acredicom.com.gt";
		$mail_setFromName = "ProyectosAcredicom";
		$mail_subject = "Costancia de cambio de contrasena";

		sendemail(
			$mail_username,
			$mail_userpassword,
			$mail_addAddress,
			$template,
			$mail_setFromEmail,
			$mail_setFromName,
			$txt_message,
			$mail_subject,
			$olvido_pass_iden
		);	

		// FIN DE PROCESO DE ENVIO DE CORREO ELECTRONICO 

		Core::alert("Solicitud procesada con exito, REVISA TU CORREO ELECTRÓNICO!");
		Core::redir("./");
	}
} 

//FUNCION PARA CAMBIAR CONTRASEÑA
else if (isset($_GET["adm"]) && $_GET["adm"] == "resetpassword") {
	$ad = AdminData::getBy("olvido_pass_iden", $_POST["olvido_pass_iden"]);
	if ($ad == null) {
		$olvido_pass_iden = $_POST["olvido_pass_iden"];
		Core::alert("Error: El código de recuperación NO ES CORRECTO!");
		Core::redir("./?view=reiniciarpassword&adm=resetpassword&recoverycode=$olvido_pass_iden");
	} else {
		if (($_POST["password"]) == $_POST["confirm_password"]){
			$ad->password = sha1(md5($_POST["password"]));
			Core::alert("La contraseña a sido cambiada con exito");
			$ad->passwordupdate();
			Core::redir("./");
		}
		else{
			$olvido_pass_iden = $_POST["olvido_pass_iden"];
			Core::alert("La contraseña NO COINCIDE");
			Core::redir("./?view=reiniciarpassword&adm=resetpassword&recoverycode=$olvido_pass_iden");
		}
	}
}

else if (isset($_GET["adm"]) && $_GET["adm"] == "login") {

	$db  = new Database();
	$conexion = $db->connect();
	$usuario = htmlspecialchars($_POST["usuario"]);
	$password = sha1(md5(htmlspecialchars($_POST["password"])));
	$sql = "select * from administrador where usuario=\"$usuario\" and password=\"$password\" and estado=1";
	$query = $conexion->query($sql);

	if ($query != null) {
		$admin = $query->fetch_object();

		if ($admin != null) {

			$_SESSION["admin_id"] = $admin->id;
		}
	}

	if (isset($_SESSION["admin_id"])) {
		Core::redir("./?view=welcome");
	} else {
		Core::alert("DATOS ERRONEOS, VERIFIQUE!");
		Core::redir("./");
	}
} 

else if (isset($_GET["adm"]) && $_GET["adm"] == "logout") {
	unset($_SESSION["admin_id"]);
	session_destroy();
	Core::redir("./");
}
