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

        $db = $this->ci->get('db');
        $statement = $db->query('SELECT id, name, price FROM products', \PDO::FETCH_ASSOC);

        $products = [];
        foreach ($statement as $row) {
            $products[] = $row;
        }

        $body->write($this->ci->get('view')->render('admin/product/index', ['products' => $products]));
    }

    public function add($request, $response, $args)
    {
        $body = $response->getBody();
        $body->write($this->ci->get('view')->render('admin/product/add'));
    }

    public function save($request, $response, $args)
    {
        $data = $request->getParsedBody();

        $db = $this->ci->get('db');
        $statement = $db->prepare('INSERT INTO products(name, price) VALUES(:name, :price)');
        $statement->bindValue('name', $data['name']);
        $statement->bindValue('price', $data['price']);
        $statement->execute();

        return $response->withRedirect('/admin/products');
    }
}
