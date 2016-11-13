<?php

$app->get('/', '\BelajarTest\Controller\HomeController:index');
$app->get('/admin/', '\BelajarTest\Admin\Controller\DashboardController:index');
$app->get('/admin/products/', '\BelajarTest\Admin\Controller\ProductController:index');
$app->get('/admin/products/add', '\BelajarTest\Admin\Controller\ProductController:add');
$app->post('/admin/products/add', '\BelajarTest\Admin\Controller\ProductController:save');
