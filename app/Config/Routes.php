<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->useSupportedLocalesOnly(true);

$routes->get("{locale}/", "Website::index");
$routes->get("{locale}/mission", "Website::mission");
$routes->get("{locale}/topusers", "Website::topusers");
$routes->get("{locale}/download", "Website::download");

// Default route without locale (en)
$routes->get("/", "Website::no_locale");
