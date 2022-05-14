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
$routes->add('registrationcliente', 'Home::registrationcliente');
$routes->add('registrationproduto', 'Home::registrationproduto');
$routes->add('registrationcategory', 'Home::registrationcategory');
$routes->add('registrationgames', 'Home::registrationgames');

$routes->add('insertdata', 'Home::insertData'); //insert cliente
$routes->add('insertproduct', 'Home::insertProduct');
$routes->add('insertformorder','Home::insertOrder');
$routes->add('insertordertodb','Home::insertOrderToDB');
$routes->add('insertcategory','Home::insertcategory');
$routes->add('clientesview', 'Home::clientesView');
$routes->add('ordersview', 'Home::ordersView');
$routes->add('productsview', 'Home::productsView');
$routes->add('gamesview', 'Home::gamesView');
$routes->add('categoriesview', 'Home::categoriesView');


$routes->add('edit/(:num)','Home::editOrder/$1');
$routes->add('editorder/(:num)','Home::editOrderToDB/$1');
$routes->add('editc/(:any)','Home::editCliente/$1');
$routes->add('editcliente/(:any)','Home::editClienteToDB/$1');
$routes->add('editp/(:any)','Home::editProduto/$1');
$routes->add('editproduto/(:any)','Home::editProdutoToDB/$1');
$routes->add('editca/(:any)','Home::editCategoria/$1');
$routes->add('editcategoria/(:any)','Home::editCategoriaToDB/$1');

// $routes->add('deletep/(:num)','Home::removeProduct/$1');
$routes->add('searchp','Home::searchProduct/$1');
$routes->add('searchg','Home::searchGames/$1');

// $routes->add('ordersview/(:any)', 'Home::orderby/$1');

$routes->add('quantidade/(:any)','Home::quantidade/$1');
$routes->add('preco/(:any)','Home::preco/$1');

$routes->add('quantidadeg/(:any)','Home::quantidadeg/$1');
$routes->add('precog/(:any)','Home::precog/$1');




$routes->add('category/(:num)','Home::categorysearch/$1');
$routes->add('console/(:any)','Home::consolesearch/$1');

// $routes->add('productsview/(:any)', 'Home::searchProduct/$1');

$routes->add('error','Home::error');

$routes->add('deletep/(:num)','Home::removeProduct/$1');
$routes->add('deletec/(:any)','Home::removeCliente/$1');
$routes->add('deleteca/(:any)','Home::removeCategoria/$1');
$routes->add('delete/(:num)','Home::removeOrder/$1');
$routes->add('home', 'Admin::home');

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
