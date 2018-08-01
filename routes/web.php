<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 7/26/2018
 * Time: 7:25 PM
 */

use App\Controllers\BlogController;

$app->get('/', function ($request, $response) {
    //echo 'home';
    return $this->view->render($response, 'home.twig');

    //echo '<pre>';
    //print_r($this->view);
    //echo '</pre>';
});

$app->group('/blog', function(){
    $this->get('', BlogController::class . ':index');
    $this->get('/{id}', BlogController::class . ':show')->setName('blog.show');
//$app->get('/blog', function ($request, $response) {
//    return $this->view->render($response, 'blog.twig')->setName('blog');
});

$app->group('/contact', function(){
    $this->get('', BlogController::class . ':index');
    $this->post('', BlogController::class . ':send');
//$app->get('/contact', function ($request, $response) {
//    return $this->view->render($response, 'contact.twig')->setName('contact');
});
