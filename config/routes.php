<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
	'/test' => 'test#index',
	'/' => 'index#index',
	'/login' =>'index#login',
	'/menu' => 'index#menu',
	'/options' => 'menu#options',
	'/crearTasca' => 'menu#crearTasca',
	'/llistarTasques' => 'menu#llistarTasques',
	'/addData' => 'menu#addData',
	
);

/* 

test#index

controllers/testController.php
indexAction()

controllers/indexController.php
indexAction()

controllers/indexController.php
loginAction()

*/


