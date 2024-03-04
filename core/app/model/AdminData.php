<?php
class AdminData
{
	public static $tablename = "administrador";

	public function __construct()
	{
		$this->nombres = "";
		$this->apellidos = "";
		$this->email = "";
		$this->usuario = "";
		$this->password = "";
		$this->olvido_pass_iden = "";
		$this->rol_id = "";
		$this->estado = "1";
		$this->created_by = "";
		$this->created_at = date("Y-m-d H:i:s");
		$this->updated_at = date("Y-m-d H:i:s");
	}

	public function add()
	{
		try {
			$sql = "INSERT INTO " . self::$tablename . " (nombres,apellidos,email,usuario,password,rol_id,estado,created_by,created_at,updated_at) ";
			$sql .= "VALUES ('$this->nombres','$this->apellidos','$this->email','$this->usuario','$this->password','$this->rol_id','$this->estado','$this->created_by',NOW(),NOW())";
			Executor::doit($sql);
		} catch (Exception $e) {
			die("Error al almacenar en la base de datos: " . $e->getMessage());
		}
	}

	public function del()
	{
		try {
			$sql = "DELETE FROM " . self::$tablename . " WHERE id=$this->id";
			Executor::doit($sql);
		} catch (Exception $e) {
			die("Error al eliminar en la base de datos: " . $e->getMessage());
		}
	}

	public function update()
	{
		try {
			$sql = "UPDATE " . self::$tablename . " SET nombres=\"$this->nombres\",apellidos=\"$this->apellidos\",email=\"$this->email\",usuario=\"$this->usuario\",password=\"$this->password\",rol_id=\"$this->rol_id\",estado=\"$this->estado\",created_by=\"$this->created_by\", updated_at=NOW() WHERE id=$this->id";
			Executor::doit($sql);
		} catch (Exception $e) {
			die("Error al actualizar en la base de datos: " . $e->getMessage());
		}
	}

	// FUNCION BUSCAR CORREO Y CAMBIO DE CONTRASEÑA
	public function updatepassword()
	{
		try {
			$sql = "UPDATE " . self::$tablename . " SET olvido_pass_iden=\"$this->olvido_pass_iden\", updated_at=NOW() WHERE id=$this->id";
			Executor::doit($sql);
		} catch (Exception $e) {
			die("Error al actualizar la contraseña en la base de datos: " . $e->getMessage());
		}
	}

	// FUNCION CAMBIO DE CONTRASEÑA
	public function passwordupdate()
	{
		try {
			$sql = "UPDATE " . self::$tablename . " SET password=\"$this->password\", updated_at=NOW() WHERE id=$this->id";
			Executor::doit($sql);
		} catch (Exception $e) {
			die("Error al actualizar la contraseña en la base de datos: " . $e->getMessage());
		}
	}

	public static function getById($id)
	{
		$sql = "select * from " . self::$tablename . " where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new AdminData());
	}

	public static function getBy($k, $v)
	{
		$sql = "select * from " . self::$tablename . " where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0], new AdminData());
	}

	public static function getAll()
	{
		$sql = "select * from " . self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0], new AdminData());
	}
}
