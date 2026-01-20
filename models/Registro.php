<?php

namespace Model;

use Model\Usuario;
use Model\Paquete;

class Registro extends ActiveRecord {

    protected static $tabla = 'registros';

    protected static $columnasDB = [
        'id',
        'paquete_id',
        'pago_id',
        'token',
        'usuario_id'
    ];

    // Columnas DB
    public ?int $id = null;
    public ?int $paquete_id = null;
    public ?string $pago_id = null;
    public ?string $token = null;
    public ?int $usuario_id = null;

    // Relaciones (NO DB)
    public ?Usuario $usuario = null;
    public ?Paquete $paquete = null;

    public function __construct($args = [])
    {
        $this->id = isset($args['id']) ? (int)$args['id'] : null;
        $this->paquete_id = isset($args['paquete_id']) ? (int)$args['paquete_id'] : null;
        $this->pago_id = $args['pago_id'] ?? null;
        $this->token = $args['token'] ?? null;
        $this->usuario_id = isset($args['usuario_id']) ? (int)$args['usuario_id'] : null;
    }
}
