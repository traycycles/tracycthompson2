<?php

/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 7/26/2018
 * Time: 7:14 PM
 */

namespace App\Controllers;

use Interop\Container\ContainerInterface;

//creating the abstract class because its only purpose is to be used by other controllers. It won't be instantiated on its own.
abstract class BaseController
{
    protected $c;

    public function __construct(ContainerInterface $c)
    {
        $this->c = $c;
    }

}