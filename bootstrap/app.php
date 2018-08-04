<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 7/26/2018
 * Time: 7:05 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
//Temp...to show errors: override in Container class
    'settings' =>[
        'displayErrorDetails' => true,
    ]
]);

//binding it all to the container.
$container = $app->getContainer();

//db for blogs, eventually comments?? see above
$container['db'] = function(){
    return new PDO('mysql:dbname=tracycthompson;host=localhost', 'root', 'root');
};

//for rendering views.
//cache is false. Again, simple site.
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        //no cache... kiss, debug... Temp.
        'cache' => false, 'debug'=>true
    ]);
    $view->addExtension(new Twig_Extension_Debug());

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    //trying to add this so it can be used in every route...
    $view['baseUrl'] = $container['request']->getUri()->getBaseUrl();

    return $view;

};

//all routes located here.
require __DIR__ . '/../routes/web.php';
