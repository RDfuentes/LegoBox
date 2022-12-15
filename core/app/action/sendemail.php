<?php
function sendemail($mail_username, $mail_userpassword, $mail_addAddress, $template, $mail_setFromEmail, $mail_setFromName, $txt_message, $mail_subject, $olvido_pass_iden)
{
	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
	$mail->Host = 'smtp.office365.com';             // Especificar el servidor de correo a utilizar
	$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
	$mail->Username = $mail_username;          // Correo electronico remitente
	$mail->Password = $mail_userpassword; 		// Contraseña de correo remitente
	$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
	$mail->Port = 587;                          // Puerto TCP para conectarse 
	$mail->setFrom($mail_setFromEmail, $mail_setFromName); // Correo de remitente - Nombre de remitente 
	$mail->addReplyTo($mail_setFromEmail, $mail_setFromName); //Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_addAddress);   // Correo electronico receptor
	$message = file_get_contents($template);
	$message = str_replace('{{first_name}}', $mail_setFromName, $message);
	$message = str_replace('{{message}}', $txt_message, $message);
	$message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);
	$message = str_replace('{{olvido_pass_iden}}', $olvido_pass_iden, $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML

	$mail->Subject = $mail_subject;
	$mail->msgHTML($message);
	$mail->Body =
		"
	<div style='background-color:#FFF; color:#000; text-align: center'><br>


		<h2>COOPERATIVA ACREDICOM</h2><br>

		<center>
			<table class='table table-bordered' border='1' bordercolor='#000' style='font-size:18px'>
				<tr>
					<th colspan='2'  class='text-center'><strong>SOLICITUD DE CAMBIO DE CONTRASENA</strong></th>
				</tr>
				<tr>
					<th>CORREO:</th>
					<td>$mail_addAddress</td>
				</tr>
				<tr>
					<th>ACCESO:</th>
					<td>http://localhost/legobox/?view=reiniciarpassword&adm=resetpassword&recoverycode=$olvido_pass_iden</td>
				</tr>
			</table>
		</center><br><br>
		<p>2a. Av. 1-11 zona 1, Tejutla, San Marcos - PBX: 7957-2222</p><br><br>
				
	</div>
	";

	if (!$mail->send()) {
		echo '<p style="color:red">No se pudo procesar la solicitud';
		echo 'Error de correo: ' . $mail->ErrorInfo;
		echo "</p>";
	} else {
		echo '<p style="color:green">Solicitud procesada con exito!</p>';
	}
}
