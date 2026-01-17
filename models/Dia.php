<?php 

namespace Model;

class Dia extends ActiveRecord {
    // Nombre de la tabla
    protected static $tabla = 'dias';
    // Columnas de la base de datos
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }
}
