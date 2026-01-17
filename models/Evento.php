<?php

namespace Model;

class Evento extends ActiveRecord {
    protected static $tabla = 'eventos';
    protected static $columnasDB = [
        'id',
        'nombre',
        'descripcion',
        'disponibles',
        'categoria_id',
        'dia_id',
        'hora_id',
        'ponente_id'
    ];

    public $id;
    public $nombre;
    public $descripcion;
    public $disponibles;
    public $categoria_id;
    public $dia_id;
    public $hora_id;
    public $ponente_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponibles = $args['disponibles'] ?? 0;
        $this->categoria_id = $args['categoria_id'] ?? null;
        $this->dia_id = $args['dia_id'] ?? null;
        $this->hora_id = $args['hora_id'] ?? null;
        $this->ponente_id = $args['ponente_id'] ?? null;
    }

    // Mensajes de validación para la creación o edición de un evento
    public function validar() {
        // Inicializar alertas
        self::$alertas = ['error' => []];

        // Validar nombre
        if (!$this->nombre || trim($this->nombre) === '') {
            self::$alertas['error'][] = 'El nombre del evento es obligatorio';
        }

        // Validar descripción
        if (!$this->descripcion || trim($this->descripcion) === '') {
            self::$alertas['error'][] = 'La descripción del evento es obligatoria';
        }

        // Validar categoría
        if (!$this->categoria_id || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Selecciona una categoría válida';
        }

        // Validar día
        if (!$this->dia_id || !filter_var($this->dia_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Selecciona un día válido para el evento';
        }

        // Validar hora
        if (!$this->hora_id || !filter_var($this->hora_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Selecciona una hora válida para el evento';
        }

        // Validar disponibilidad de lugares
        if (!$this->disponibles || !filter_var($this->disponibles, FILTER_VALIDATE_INT) || $this->disponibles < 1) {
            self::$alertas['error'][] = 'Añade una cantidad válida de lugares disponibles';
        }

        // Validar ponente
        if (!$this->ponente_id || !filter_var($this->ponente_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Selecciona un ponente válido para el evento';
        }

        return self::$alertas;
    }

}
