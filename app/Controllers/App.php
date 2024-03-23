<?php

namespace App\Controllers;

use App\Models\UserBadge;
use App\Models\Post;
use App\Models\Event;

class App extends BaseController
{
  public function feed(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth");
    }

    $data = [
      "title" => "Feed",
    ];

    return view("templates/start", $data) .
      view("components/app/header", $data) .
      view("pages/feed", $data) .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }

  public function map(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth?fallback=/$locale/app/map");
    }
    $data = [
      "title" => "Map",
    ];

    return view("templates/start", $data) .
      view("components/app/header", $data) .
      view("pages/map.php") .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }

  public function camera(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth?fallback=/$locale/app/camera");
    }
    $data = [
      "title" => "Camera",
    ];

    return view("templates/start", $data) .
      view("components/app/header", $data) .
      view("pages/camera", $data) .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }

  public function chat(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth?fallback=/$locale/app/chat");
    }
    $data = [
      "title" => "Chat",
    ];

    return view("templates/start", $data) .
      view("components/app/header", $data) .
      view("pages/chat", $data) .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }

  public function profile(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth?fallback=/$locale/app/profile");
    }

    $user = $this->session->get("user");

    $userBadge = model(UserBadge::class);
    $badges = $userBadge->getBadges($user["user_id"]);

    $post = model(Post::class);
    $posts = $post->getFromUser($user["user_id"]);

    $event = model(Event::class);
    $events = $event->getFromOwner($user["user_id"]);


    $data = [
      "title" => "Profile",
      "user" => $user,
      "badges" => $badges,
      "posts" => $posts,
      "events" => $events,
      "locale" => $this->request->getLocale(),
    ];

    return view("templates/start", $data) .
      view("pages/profile", $data) .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }
}
