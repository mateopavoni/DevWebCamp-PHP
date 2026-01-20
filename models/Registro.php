<?php 

namespace Model;

class Registro extends ActiveRecord {

    protected static $tabla = 'registros';
    protected static $columnasDB = [
        'id', 'paquete_id', 'pago_id', 'token', 'usuario_id', 'regalo_id'
    ];

    public ?int $id = null;
    public int|string $paquete_id;
    public int|string $pago_id;
    public string $token;
    public int|string $usuario_id;
    public int $regalo_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->paquete_id = $args['paquete_id'] ?? '';
        $this->pago_id = $args['pago_id'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->regalo_id = $args['regalo_id'] ?? 1;
    }
}
