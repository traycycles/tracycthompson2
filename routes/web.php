<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 7/26/2018
 * Time: 7:25 PM
 */

use App\Controllers\BlogController;
use App\Controllers\HomeController;


//$app->get('/', function ($request, $response) {

  //    return $this->view->render($response, 'home.twig');

    //echo '<pre>';
    //print_r($this->view);
    //echo '</pre>';
//})->setName('home');

$app->get('/',HomeController::class . ':index' );

//TODO
$app->group('/blog', function(){
    $this->get('', BlogController::class . ':index');
    $this->get('/{id}', BlogController::class . ':show');
});

$app->group('/contact', function(){
    $this->get('', BlogController::class . ':index');
    $this->post('', BlogController::class . ':send');
//$app->get('/contact', function ($request, $response) {
//    return $this->view->render($response, 'contact.twig');
});
