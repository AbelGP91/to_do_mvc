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
	'/' => 'index#menu',
	'/options' => 'menu#options',

	// create
	'/crearTasca' => 'menu#crearTasca',
	'/addTasca' => 'menu#addTasca',

	// read
	'/llistarTasques' => 'menu#llistarTasques',
	'/veureTasca' => 'menu#veureTasca',

	// update 
	'/modifiedTasca'  => 'menu#modifiedTasca',
	'/modificarOpcions'  => 'menu#modificarOpcions',
	'/actualitzarTasca'  => 'menu#actualitzarTasca',

	// delete
	'/deleteTasca'  => 'menu#deleteTasca',
	
);
