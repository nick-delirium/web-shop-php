<?php

/*
requested URI in browser => controllerName / actionName / more info
example/index/2 will be recognized as in ExampleController do actionIndex where 2 will be additional data
*/

return array(
    // administration tools
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delite/([0-9]+)' => 'adminCategory/delite/$1',
    'admin/category' => 'adminCategory/index',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delite/([0-9]+)' => 'adminOrder/delite/$1',
    'admin/orders' => 'adminOrder/index',
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delite/([0-9]+)' => 'adminProduct/delite/$1',
    'admin/product' => 'adminProduct/index',
    'admin/console' => 'admin/index',
    // Cart controller
    'checkout' => 'cart/checkout',
    'cart/delite/([0-9]+)' => 'cart/delite/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart' => 'cart/index',
    // products
    'product/([0-9]+)' => 'product/view/$1',
    // catalog controller
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    // user + profile controller
    'profile' => 'profile/index',
    'edit' => 'profile/edit',
    'history' => 'user/history',
    'login' => 'user/login',
    'register' => 'user/register',
    'exit' => 'user/exit',
    // main controllers
    'contacts' => 'main/contact',
    '^$' => 'main/index',
);