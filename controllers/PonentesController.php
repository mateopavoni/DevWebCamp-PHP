<?php

namespace Controllers;

use MVC\Router;

class PonentesController {
    public static function index(Router $router) {
        $router->render('admin/Ponentes/index', [
            'titulo' => "Ponentes / Conferencistas"
        ]);
    }

    public static function crear(Router $router) {


        $alertas = [];
        $router->render('admin/Ponentes/crear', [
            'titulo' => "Registrar Ponente / Conferencista",
            'alertas' => $alertas
        ]);
    }

}