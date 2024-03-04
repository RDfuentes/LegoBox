<?php
class PermisosData
{
    public static $tablename = "permisos";

    public function __construct()
    {
        $this->nombre = "";
        $this->permisos = "";
        $this->estado = "1";
        $this->created_by = "";
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    public function add()
    {
        try {
            $db = Database::getCon();
            $sql = "INSERT INTO " . self::$tablename . " (nombre, permisos, estado, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("ssss", $this->nombre, $this->permisos, $this->estado, $this->created_by);
            $stmt->execute();
        } catch (Exception $e) {
            die("Error al ejecutar la consulta SQL: " . $e->getMessage());
        }
    }

    public function del()
    {
        try {
            $sql = "delete from " . self::$tablename . " where id=$this->id";
            Executor::doit($sql);
        } catch (Exception $e) {
            die("Error al eliminar en la base de datos: " . $e->getMessage());
        }
    }

    public function update()
    {
        try {
            $sql = "update " . self::$tablename . " set nombre=\"$this->nombre\",estado=\"$this->estado\",created_by=\"$this->created_by\", updated_at=NOW() where id=$this->id";
            Executor::doit($sql);
        } catch (Exception $e) {
            die("Error al actualizar en la base de datos: " . $e->getMessage());
        }
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

    public static function getAllAct()
    {
        $sql = "select * from " . self::$tablename . " where estado=1";
        $query = Executor::doit($sql);
        return Model::many($query[0], new PermisosData());
    }
}
