<?php
namespace Controllers;

use MVC\Router;
use Model\Speaker;
use Intervention\Image\ImageManagerStatic as Image;

class SpeakersController {
  public static function index(Router $router) {
    
    $router->render('admin/speakers/index', [
      'title' => 'Ponentes / Conferencistas'
    ]);
  }

  public static function create(Router $router) {
    $alerts = [];
    $speaker = new Speaker;
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Read image
      if(!empty($_FILES['image']['tmp_name'])) {
        $image_folder = '../public/img/speakers';
        // Create folder if it dosn't exist
        if(!is_dir($image_folder)) {
          mkdir($image_folder, 0755, true);
        }

        $png_image = Image::make($_FILES['image']['tmp_name']->fit(800,800)->encode('png', 80));
        $webp_image = Image::make($_FILES['image']['tmp_name']->fit(800,800)->encode('webp', 80));

        $name_image = md5(uniqid(rand(), true));

        $_POST['image'] = $name_image;
      } 

      $speaker->sync();

      // validate
      $alerts = $speaker->validate();
    }
    $router->render('admin/speakers/create', [
      'title' => 'Registrar Ponente',
      'alerts' => $alerts,
      'speaker' => $speaker
    ]);
  }
}