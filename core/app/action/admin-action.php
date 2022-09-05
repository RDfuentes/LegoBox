<?php 

if(isset($_GET["adm"]) && $_GET["adm"]=="register"){

	$ad = AdminData::getBy("usuario",$_POST["usuario"]);
	if($ad==null){
	$admin = new AdminData();
	$admin->nombres = $_POST["nombres"]; 
	$admin->apellidos = $_POST["apellidos"];
	$admin->usuario = $_POST["usuario"];
	$admin->password = sha1(md5($_POST["password"]));
	$admin->created_by = $_POST["created_by"];
	$admin->add();
	Core::alert("Administrador registrado con Exito!");
	}else{
		Core::alert("Error: Nombre de usuario repetido");
		Core::redir("./?view=register_admin&adm=register");
	}
	Core::redir("./?view=register_admin&adm=all");

}

else if(isset($_GET["adm"]) && $_GET["adm"]=="delete"){
	$user = AdminData::getById($_GET["id"]);
	$user->del();
	Core::alert("Administrador eliminado con Exito!");
	Core::redir("./?view=register_admin&adm=all");
}

else if(isset($_GET["adm"]) && $_GET["adm"]=="update"){
	$admin = AdminData::getById($_POST["admin_id"]);
	$admin->nombres = $_POST["nombres"];
	$admin->apellidos = $_POST["apellidos"];
	$admin->usuario = $_POST["usuario"];
	$admin->password = sha1(md5($_POST["password"]));
	$admin->estado = $_POST["estado"];
	$admin->created_by = $_POST["created_by"];
	$admin->update();
	Core::alert("Administrador actualizado con Exito!");
	Core::redir("./?view=register_admin&adm=all");

}

else if(isset($_GET["adm"]) && $_GET["adm"]=="login"){

	$db  =new Database();
	$conexion = $db->connect();
	$usuario = htmlspecialchars($_POST["usuario"]);
	$password = sha1(md5(htmlspecialchars($_POST["password"])));
	$sql = "select * from administrador where usuario=\"$usuario\" and password=\"$password\" and estado=1";
	$query = $conexion->query($sql);

	if($query!=null)
	{
		$admin = $query->fetch_object();

		if($admin!=null){

			$_SESSION["admin_id"]=$admin->id;
		}
	}

	if(isset($_SESSION["admin_id"]))
	{
		Core::redir("./?view=welcome");
	}

	else
	{
		Core::alert("DATOS ERRONEOS, VERIFIQUE!");
		Core::redir("./");
	}
}

else if(isset($_GET["adm"]) && $_GET["adm"]=="logout"){
	unset($_SESSION["admin_id"]);
	session_destroy();
	Core::redir("./");
}
