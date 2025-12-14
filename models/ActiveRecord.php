<?php
namespace Model;

class ActiveRecord {

    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    protected static $alertas = [];

    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    public static function consultarSQL($query) {
        $resultado = self::$db->query($query);

        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function atributos() {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function sincronizar($args = []) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function guardar() {
        return !is_null($this->id)
            ? $this->actualizar()
            : $this->crear();
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC";
        return self::consultarSQL($query);
    }

    public static function find($id) {
        $id = (int) $id;
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id} LIMIT 1";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function get($limite) {
        $limite = (int) $limite;
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT {$limite}";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function where($columna, $valor) {
        $valor = self::$db->escape_string($valor);
        $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}' LIMIT 1";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public function crear() {
        $atributos = $this->sanitizarAtributos();

        $query  = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "')";

        $resultado = self::$db->query($query);

        return [
            'resultado' => $resultado,
            'id' => self::$db->insert_id
        ];
    }

    public function actualizar() {
        $atributos = $this->sanitizarAtributos();
        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $id = self::$db->escape_string($this->id);

        $query  = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '{$id}' LIMIT 1";

        return self::$db->query($query);
    }

    public function eliminar() {
        $id = self::$db->escape_string($this->id);
        $query = "DELETE FROM " . static::$tabla . " WHERE id = {$id} LIMIT 1";
        return self::$db->query($query);
    }
}
