<?php

return [
    // MainController
    '' => [
        'method' => 'GET',
        'controller' => 'main',
        'action' => 'index',
    ],
    'main/index/{page:\d+}' => [
        'method' => 'GET',
        'controller' => 'main',
        'action' => 'index',
    ],

    // AdminController
    'admin' => [
        'method' => 'GET',
        'controller' => 'admin',
        'action' => 'index',
    ],

    'admin/login' => [
        'method' => 'POST',
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'method' => 'GET',
        'controller' => 'admin',
        'action' => 'logout',
    ],

    'admin/banners' => [
        'method' => 'GET',
        'controller' => 'banners',
        'action' => 'index',
    ],
    'admin/banners/add' => [
        'method' => 'GET',
        'controller' => 'banners',
        'action' => 'add',
    ],
    'admin/banners/create' => [
        'method' => 'POST',
        'controller' => 'banners',
        'action' => 'create',
    ],
    'admin/banners/edit/{id:\d+}' => [
        'method' => 'GET',
        'controller' => 'banners',
        'action' => 'edit',
    ],
    'admin/banners/update/{id:\d+}' => [
        'method' => 'POST',
        'controller' => 'banners',
        'action' => 'update',
    ],
    'admin/banners/delete' => [
        'method' => 'POST',
        'controller' => 'banners',
        'action' => 'delete',
    ],
    'admin/banners/{id:\d+}' => [
        'method' => 'DELETE',
        'controller' => 'banners',
        'action' => 'delete',
    ],

    'admin/banners/down/{id:\d+}' => [
        'method' => 'GET',
        'controller' => 'banners',
        'action' => 'positionDown',
    ],

    'admin/banners/up/{id:\d+}' => [
        'method' => 'GET',
        'controller' => 'banners',
        'action' => 'positionUp',
    ]

];