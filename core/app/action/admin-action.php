<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Requerir los archivos de PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if (isset($_GET["adm"]) && $_GET["adm"] == "register") {

	$ad = AdminData::getBy("usuario", $_POST["usuario"]);
	if ($ad == null) {
		$admin = new AdminData();
		$admin->nombres = $_POST["nombres"];
		$admin->apellidos = $_POST["apellidos"];
		$admin->email = $_POST["email"];
		$admin->usuario = $_POST["usuario"];
		$admin->password = sha1(md5($_POST["password"]));
		$admin->rol_id = $_POST["rol_id"];
		$admin->created_by = $_POST["created_by"];
		$admin->add();
		Core::alert("Administrador registrado con Exito!");
	} else {
		Core::alert("Error: Nombre de usuario repetido");
		Core::redir("./?view=usuarios/index");
	}
	Core::redir("./?view=usuarios/index");
} 

else if (isset($_GET["adm"]) && $_GET["adm"] == "delete") {
	$user = AdminData::getById($_GET["id"]);
	$user->del();
	Core::alert("Administrador eliminado con Exito!");
	Core::redir("./?view=usuarios/index");
} 

else if (isset($_GET["adm"]) && $_GET["adm"] == "update") {
    $admin = AdminData::getById($_POST["admin_id"]);
    $admin->nombres = $_POST["nombres"];
    $admin->apellidos = $_POST["apellidos"];
    $admin->email = $_POST["email"];
    $admin->usuario = $_POST["usuario"];

    // Si la request password viene vacia, no actualizar el campo password
    if (!empty($_POST["password"])) {
        $admin->password = sha1(md5($_POST["password"]));
    }

    $admin->rol_id = $_POST["rol_id"];
    $admin->estado = $_POST["estado"];
    $admin->created_by = $_POST["created_by"];
    $admin->update();
    Core::alert("Administrador actualizado con Éxito!");
    Core::redir("./?view=usuarios/index");
}

//FUNCION SOLICITUD DE CAMBIO DE CONTRASEÑA
else if (isset($_GET["adm"]) && $_GET["adm"] == "passwordreset") {
	$ad = AdminData::getBy("email", $_POST["email"]);
	if ($ad == null) {
		Core::alert("Error: El correo electronico proporcionado NO EXISTE!");
		Core::redir("./?view=reiniciarpassword&adm=passwordreset");
	} else {
		$ad->email = $_POST["email"];
		$ad->olvido_pass_iden = $_POST["olvido_pass_iden"];
		$ad->updatepassword();

		// ENVIO DE CORREO ELECTRONICO
		$to = $_POST["email"]; // Dirección de correo electrónico del destinatario
		$olvido_pass_iden = $_POST["olvido_pass_iden"]; // Dirección de correo electrónico del destinatario
		$subject = "Solicitud de cambio de Password"; // Asunto del correo electrónico

		// CONTENIDO DEL CORREO
		$message = "
		<div style='background-color:#FFF; color:#000; text-align: center'><br>
			<h2>NEWSOFT</h2><br>
			<center>
				<table class='table table-bordered' border='1' bordercolor='#000' style='font-size:18px'>
					<tr>
						<th colspan='2'  class='text-center'><strong>SOLICITUD DE CAMBIO DE CONTRASEÑA</strong></th>
					</tr>
					<tr>
						<th>CORREO:</th>
						<td>$to</td>
					</tr>
					<tr>
						<th>ACCESO:</th>
						<td>http://localhost/sistemasmvc/LegoBox/?view=reiniciarpassword&adm=resetpassword&recoverycode=$olvido_pass_iden</td>
					</tr>
				</table>
			</center><br><br>
			<p>SOFTWARE DEVELOPMENT</p><br><br>		
		</div>
		";

		// CONFIGURACIÓN DE PHPMailer
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'sandbox.smtp.mailtrap.io';
		$mail->SMTPAuth = true;
		$mail->Username = '30cb65f9bbfa4a';
		$mail->Password = 'b7781517b721b4';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 2525;

		// DIRECCIÓN DE CORREO Y NOMBRE DE REMITENTE
		$mail->setFrom('ronaldfuentes.newsoft@gmail.com', 'NewSoft');

		// DESTINATARIO
		$mail->addAddress($to);

		// ASUNTO Y CUERPO DEL CORREO ELECTRONICO
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->isHTML(true); // Indicar que el cuerpo del correo es HTML

		// ENVIO DEL CORREO ELECTRONICO
		if ($mail->send()) {
			// SATISFACTORIO
			Core::alert("Solicitud aprobada, se ha enviado un correo");
		} else {
			// NO SATISFACTORIO
			Core::alert("Solicitud aprobada, pero el envío del correo falló");
		}
		// FIN DE PROCESO DE ENVIO DE CORREO ELECTRONICO 

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
		if (($_POST["password"]) == $_POST["confirm_password"]) {
			$ad->password = sha1(md5($_POST["password"]));
			Core::alert("La contraseña a sido cambiada con exito");
			$ad->passwordupdate();
			Core::redir("./");
		} else {
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
