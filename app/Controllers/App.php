<?php

namespace App\Controllers;

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
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }

  public function map(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth");
    }
    $data = [
      "title" => "Map",
    ];

    return view("templates/start", $data) . view("templates/end", $data);
  }

  public function camera(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth");
    }
    $data = [
      "title" => "Camera",
    ];

    return view("templates/start", $data) . view("templates/end", $data);
  }

  public function chat(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth");
    }
    $data = [
      "title" => "Chat",
    ];

    return view("templates/start", $data) . view("templates/end", $data);
  }

  public function profile(): string|\CodeIgniter\HTTP\RedirectResponse
  {
    if (!$this->session->get("user")) {
      $locale = $this->request->getLocale();
      return redirect()->to(base_url() . $locale . "/app/auth");
    }
    $data = [
      "title" => "Profile",
    ];

    return view("templates/start", $data) . view("templates/end", $data);
  }
}
