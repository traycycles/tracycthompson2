<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 7/26/2018
 * Time: 7:25 PM
 */

use App\Controllers\BlogController;

$app->get('/', function ($request, $response) {
    echo 'home';
});

$app->group('/blog', function(){
    $this->get('', BlogController::class . ':index');
    $this->get('/{id}', BlogController::class . ':show')->setName('blog.show');
});