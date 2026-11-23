<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Contatos::index');
$routes->get('contatos', 'Contatos::index');
$routes->get('contatos/novo', 'Contatos::novo');
$routes->post('contatos/salvar', 'Contatos::salvar');
$routes->get('contatos/editar/(:num)', 'Contatos::editar/$1');
$routes->post('contatos/atualizar/(:num)', 'Contatos::atualizar/$1');
$routes->post('contatos/excluir/(:num)', 'Contatos::excluir/$1');
$routes->get('cep/(:segment)', 'Cep::buscar/$1');
