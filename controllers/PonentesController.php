<?php

namespace Controllers;

use Model\Ponente;
use MVC\Router;

class PonentesController {
    public static function index(Router $router) {
        $router->render('admin/Ponentes/index', [
            'titulo' => "Ponentes / Conferencistas"
        ]);
    }

    public static function crear(Router $router) {


        $alertas = [];
        $ponente = new Ponente;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ponente = new Ponente($_POST);
            // Validar
            $alertas = $ponente->validar();

            if(empty($alertas)) {
                // Guardar en la base de datos
                $resultado = $ponente->guardar();
                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        $router->render('admin/Ponentes/crear', [
            'titulo' => "Registrar Ponente / Conferencista",
            'alertas' => $alertas,
            "ponente" => $ponente
        ]);
    }

}