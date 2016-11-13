<?php

namespace BelajarTest\Admin\Controller;

use Interop\Container\ContainerInterface;

class ProductController
{
    private $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function index($request, $response, $args)
    {
        $body = $response->getBody();
        $body->write($this->ci->get('view')->render('admin/product/index'));
    }

    public function add($request, $response, $args)
    {
        $body = $response->getBody();
        $body->write($this->ci->get('view')->render('admin/product/add'));
    }

    public function save($request, $response, $args)
    {
        return $response->withRedirect('/admin/products');
    }
}
