<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->add('registration', 'Home::registration');
$routes->add('menu', 'Home::menu');
$routes->add('login', 'Home::login');
$routes->add('signup', 'Home::signup');
$routes->add('loginuser','Home::loginUser');
$routes->add('logout','Home::logout');

$routes->add('extrato','Home::extrato');

$routes->add('pagamentos','Home::pagamentos');
$routes->add('pagboleto','Home::pagboleto');
$routes->add('pagdebito','Home::pagdebito');
$routes->add('pagpix','Home::pagpix');
$routes->add('insertpagamento','Home::insertpagamento');

$routes->add('poupanca','Home::poupanca');
$routes->add('aplicacao','Home::aplicacao');
$routes->add('resgate','Home::resgate');
$routes->add('insertresgate','Home::insertresgate');
$routes->add('insertaplicacao','Home::insertaplicacao');

$routes->add('transferencia','Home::transferencia');
$routes->add('inserttrans','Home::inserttrans');




/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
