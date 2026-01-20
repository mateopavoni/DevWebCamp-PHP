<?php

namespace Model;

class Regalo extends ActiveRecord {

    protected static $tabla = 'regalos';

    protected static $columnasDB = [
        'id',
        'nombre'
    ];

    public ?int $id = null;
    public ?string $nombre = null;
    public int $total = 0;

    public function __construct($args = [])
    {
        $this->id = isset($args['id']) ? (int)$args['id'] : null;
        $this->nombre = $args['nombre'] ?? null;
    }
}
