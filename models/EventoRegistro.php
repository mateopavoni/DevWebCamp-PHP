<?php

namespace Model;

class EventoRegistro extends ActiveRecord {

    protected static $tabla = 'eventos_registros';

    protected static $columnasDB = [
        'id',
        'evento_id',
        'registro_id'
    ];

    public ?int $id = null;
    public ?int $evento_id = null;
    public ?int $registro_id = null;

    public function __construct($args = [])
    {
        $this->id = isset($args['id']) ? (int)$args['id'] : null;
        $this->evento_id = isset($args['evento_id']) ? (int)$args['evento_id'] : null;
        $this->registro_id = isset($args['registro_id']) ? (int)$args['registro_id'] : null;
    }
}
