<?php 

namespace Model;

class Hora extends ActiveRecord {
    // Nombre de la tabla
    protected static $tabla = 'horas';
    // Columnas de la base de datos
    protected static $columnasDB = ['id', 'hora'];

    public $id;
    public $hora;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
    }
}
