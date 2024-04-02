<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cadastro', 'Home::telacadastro');
$routes->post('/dadosinseridos', 'Home::recebercadastro');
$routes->post('/logged', 'Home::validarlogin');

























$routes->get('/formulario', 'Form::index');
$routes->post('/form',  'Form::receiveData');

$routes->get('/pokeform', 'pokecontroler::index');
$routes->post('/pokeresult', 'pokecontroler::pokereceive');
$routes->get('/pokeshow', 'pokecontroler::pokeshow');
$routes->post('/delete','pokecontroler::pokedelete');