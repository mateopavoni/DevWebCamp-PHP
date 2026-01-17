<?php

namespace Model;

class ActiveRecord {

    // Base de Datos
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas
    protected static $alertas = [];

    // Setear DB
    public static function setDB($database) {
        self::$db = $database;
    }

    // Alertas
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

    // ===============================
    // CONSULTAS
    // ===============================
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

    // ===============================
    // ATRIBUTOS
    // ===============================
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
            if (property_exists($this, $key) && $value !== null) {
                $this->$key = $value;
            }
        }
    }

    // ===============================
    // CRUD
    // ===============================
    public function guardar() {
        return !is_null($this->id) ? $this->actualizar() : $this->crear();
    }

    public static function all($orden = 'DESC') {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id {$orden}";
        return self::consultarSQL($query);
    }

    public static function find($id) {
        $id = self::$db->escape_string($id);
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT {$limite}";
        return self::consultarSQL($query);
    }

    public static function paginar($por_pagina, $offset) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT {$por_pagina} OFFSET {$offset}";
        return self::consultarSQL($query);
    }

    public static function where($columna, $valor) {
        $valor = self::$db->escape_string($valor);
        $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function ordenar($columna, $orden) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY {$columna} {$orden}";
        return self::consultarSQL($query);
    }

    public static function ordenarLimite($columna, $orden, $limite) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY {$columna} {$orden} LIMIT {$limite}";
        return self::consultarSQL($query);
    }

    public static function whereArray($array = []) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ";

        foreach ($array as $key => $value) {
            $value = self::$db->escape_string($value);
            $query .= "{$key} = '{$value}'";

            if ($key !== array_key_last($array)) {
                $query .= " AND ";
            }
        }

        return self::consultarSQL($query);
    }

    // ===============================
    // TOTALES
    // ===============================
    public static function total($columna = '', $valor = '') {
        $query = "SELECT COUNT(*) FROM " . static::$tabla;

        if ($columna) {
            $valor = self::$db->escape_string($valor);
            $query .= " WHERE {$columna} = '{$valor}'";
        }

        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();
        return array_shift($total);
    }

    public static function totalArray($array = []) {
        $query = "SELECT COUNT(*) FROM " . static::$tabla . " WHERE ";

        foreach ($array as $key => $value) {
            $value = self::$db->escape_string($value);
            $query .= "{$key} = '{$value}'";

            if ($key !== array_key_last($array)) {
                $query .= " AND ";
            }
        }

        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();
        return array_shift($total);
    }

    // ===============================
    // CREATE / UPDATE / DELETE
    // ===============================
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
        $query .= " WHERE id = {$id} LIMIT 1";

        return self::$db->query($query);
    }

    public function eliminar() {
        $id = self::$db->escape_string($this->id);
        $query = "DELETE FROM " . static::$tabla . " WHERE id = {$id} LIMIT 1";
        return self::$db->query($query);
    }
}
