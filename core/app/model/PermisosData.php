<?php
class PermisosData
{
    public static $tablename = "permisos";

    public function __construct()
    {
        $this->nombre = "";
        $this->permisos = "";
        $this->estado = "1";
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    public function add()
    {
        try {
            $sql = "insert into " . self::$tablename . " (nombre,permisos,estado,created_by,created_at) ";
            $sql .= "value (\"$this->nombre\",\"$this->permisos\",\"$this->estado\",NOW(),NOW())";
            Executor::doit($sql);
        } catch (Exception $e) {
            die("Error al ejecutar la consulta SQL: " . $e->getMessage());
        }
    }

    public function del()
    {
        $sql = "delete from " . self::$tablename . " where id=$this->id";
        Executor::doit($sql);
    }

    public function update()
    {
        $sql = "update " . self::$tablename . " set nombre=\"$this->nombre\",permisos=\"$this->permisos\",estado=\"$this->estado\",created_by=\"$this->created_by\", created_at=NOW() where id=$this->id";
        Executor::doit($sql);
    }

    public static function getById($id)
    {
        $sql = "select * from " . self::$tablename . " where id=$id";
        $query = Executor::doit($sql);
        return Model::one($query[0], new PermisosData());
    }

    public static function getBy($k, $v)
    {
        $sql = "select * from " . self::$tablename . " where $k=\"$v\"";
        $query = Executor::doit($sql);
        return Model::one($query[0], new PermisosData());
    }

    public static function getAll()
    {
        $sql = "select * from " . self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new PermisosData());
    }
}
