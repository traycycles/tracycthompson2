<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 8/3/2018
 * Time: 4:35 PM
 */

namespace App\Controllers;


//use Psr\Http\Message\ServerRequestInterface;
//use Psr\Http\Message\ResponseInterface;

class HomeController extends BaseController
{

    public function index($request, $response, $args)
    {         //return $this->container->view->render($response, 'home.twig');
                //or
        return $this->container->get('view')->render($response, 'home.twig');
    }


}