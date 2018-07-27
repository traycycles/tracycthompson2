<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 7/26/2018
 * Time: 7:05 PM
 */
$app = new \Slim\App([
//to show errors: override in Container class
    'settings' =>[
        'displayErrorDetails' => true,
    ]
]);

//binding it all to the container.
//pretty simple site. Not necessary to separate and put in bootstrap folder... available if need be. But I ain't that complicated.
$container = $app->getContainer();

//db for blogs, eventually comments?? see above
$container['db'] = function(){
    return new PDO('mysql:dbname=tracycthompson;host=localhost', 'root', 'root');
};

//for rendering views.
//cache is false. Again, simple site.
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;

};

//all my routes located here.
require __DIR__ . '/../routes/web.php';
