<?php

return array(
    'product/([0-9]+)' => 'product/view/$1',
    'catalog/' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    'profile' => 'profile/index',
    'login' => 'user/login',
    'register' => 'user/register',
    '^$' => 'main/index',
);