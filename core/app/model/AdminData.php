<?php  
class AdminData {
	public static $tablename = "administrador";

	public function __construct(){
		$this->nombres = "";
		$this->apellidos = "";
		$this->email = "";
		$this->usuario = "";
		$this->password = "";
		$this->olvido_pass_iden = "";
		$this->estado = "1";
		$this->created_by = "";
        $this->created = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombres,apellidos,email,usuario,password,estado,created_by,created) ";
		$sql .= "value (\"$this->nombres\",\"$this->apellidos\",\"$this->email\",\"$this->usuario\",\"$this->password\",\"$this->estado\",\"$this->created_by\",$this->created)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombres=\"$this->nombres\",apellidos=\"$this->apellidos\",email=\"$this->email\",usuario=\"$this->usuario\",password=\"$this->password\",estado=\"$this->estado\",created_by=\"$this->created_by\", created=NOW() where id=$this->id";
		Executor::doit($sql);
	}

	// FUNCION BUSCAR CORREO Y CAMBIO DE CONTRASEÑA
	public function updatepassword(){
		$sql = "update ".self::$tablename." set olvido_pass_iden=\"$this->olvido_pass_iden\", created=NOW() where id=$this->id";
		Executor::doit($sql);
	}

	// FUNCION CAMBIO DE CONTRASEÑA
	public function passwordupdate(){
		$sql = "update ".self::$tablename." set password=\"$this->password\", created=NOW() where id=$this->id";
		Executor::doit($sql);
	}
	
	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AdminData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AdminData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AdminData());
	}
}
