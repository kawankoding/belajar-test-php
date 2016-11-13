<?php

namespace BelajarTest\Admin\Controller;

use Interop\Container\ContainerInterface;

class DashboardController
{
    private $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function index($request, $response, $args)
    {
        $body = $response->getBody();
        $body->write($this->ci->get('view')->render('admin/dashboard'));
    }
}
