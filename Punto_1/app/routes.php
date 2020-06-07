 <?php

    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');

    $router->get('turnos', 'TurnosController@index');
    $router->get('turnos/create', 'TurnosController@create');
    $router->get('turnos/ficha', 'TurnosController@ficha');
    $router->post('turnos/save', 'TurnosController@save');

    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');
