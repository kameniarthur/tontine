<?php

use Framework\Router;

Router::get('/', 'HomeController@index');
Router::get('/users', 'UserController@index');
Router::post('/users', 'UserController@store');
