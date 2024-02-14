<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->useSupportedLocalesOnly(true);

// Default route without locale (en)
$routes->get("/", "Website::no_locale");

// Routes for the website
$routes->get("{locale}/", "Website::index");
$routes->get("{locale}/mission", "Website::mission");
$routes->get("{locale}/topusers", "Website::topusers");
$routes->get("{locale}/download", "Website::download");

// Routes for the app
$routes->get("{locale}/app", "App::feed");
$routes->get("{locale}/app/map", "App::map");
$routes->get("{locale}/app/camera", "App::camera");
$routes->get("{locale}/app/chat", "App::chat");
$routes->get("{locale}/app/profile", "App::profile");