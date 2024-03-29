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
$routes->get("{locale}/app", "App::index");
$routes->get("{locale}/app/feed", "App::feed");
$routes->get("{locale}/app/map", "App::map");
$routes->get("{locale}/app/camera", "App::camera");
$routes->get("{locale}/app/chat", "App::chat");
$routes->get("{locale}/app/chat/(:num)", "App::discussion/$1");
$routes->get("{locale}/app/profile", "App::profile");

// Routes for the auth
$routes->get("{locale}/app/auth", "Auth::auth");
$routes->get("{locale}/app/auth/login", "Auth::login");
$routes->get("{locale}/app/auth/register", "Auth::register");
$routes->get("{locale}/app/auth/forgot", "Auth::forgot");
$routes->get("{locale}/app/auth/logout", "Auth::logout");

// Routes for the api
$routes->post("/api/subscribe", "Api::subscribe");
$routes->post("/api/auth/register", "Auth::create");
$routes->post("/api/auth/login", "Auth::connect");
$routes->post("/api/post/create", "Post::form");
$routes->post("/api/event/create", "Event::form");
$routes->post("/api/profile/update", "Api::updateProfile");
$routes->post("/api/profile/image", "Api::updateImage");
$routes->get("/api/event/chat/get/(:num)", "Api::getChat/$1");
$routes->post("/api/event/chat/post/(:num)", "Api::postChat/$1");

// Routes for the post creation
$routes->match(["get", "post"], "{locale}/app/post/create", "Post::create");
$routes->get("api/post/all", "Post::getLastPostsAsHtml");
$routes->get("api/post/delete/(:num)", "Post::delete/$1");

// Routes for the event creation
$routes->get("{locale}/app/event/create", "Event::create");
$routes->get("{locale}/app/event/join/(:num)", "Event::join/$1");
$routes->get("api/event/all", "Event::getAll");

$routes->set404Override(
  function () {
    return view("pages/404");
  }
);
