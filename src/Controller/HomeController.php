<?php

namespace BelajarTest\Controller;

use Interop\Container\ContainerInterface;

class HomeController
{
    private $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function index($request, $response, $args)
    {
        $body = $response->getBody();
        $body->write($this->ci->get('view')->render('home'));
    }
}
