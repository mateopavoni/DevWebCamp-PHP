<?php

namespace Controllers;

use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

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

            $imagen_png = null;
            $imagen_webp = null;

            if(!empty($_FILES['imagen']['tmp_name'])) {

                $carpetaImagenes = '../public/img/speakers';
                if(!is_dir($carpetaImagenes)) {
                    mkdir($carpetaImagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])
                    ->fit(800,800)
                    ->encode('png', 80);

                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])
                    ->fit(800,800)
                    ->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }

            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if(empty($alertas)) {

                if($imagen_png && $imagen_webp) {
                    $imagen_png->save($carpetaImagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpetaImagenes . '/' . $nombre_imagen . '.webp');
                }

                $resultado = $ponente->guardar();

                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/Ponentes/crear', [
            'titulo' => 'Registrar Ponente / Conferencista',
            'alertas' => $alertas,
            'ponente' => $ponente
        ]);
    }


}