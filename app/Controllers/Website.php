<?php

namespace App\Controllers;

class Website extends BaseController
{
  public function index(): string
  {
    // $locale = $this->request->getLocale();
    $data = [
      "title" => "Home",
    ];
    return view("templates/start", $data) .
      view("components/website/header", $data) .
      view("pages/home.php") .
      view("components/website/footer") .
      view("templates/end");
  }

  public function mission(): string
  {
    $data = [
      "title" => "Mission",
    ];
    return view("templates/start", $data) .
      view("components/website/header", $data) .
      view("pages/mission.php") .
      view("components/website/footer") .
      view("templates/end");
  }

  public function topusers(): string
  {
    $data = [
      "title" => "Top Users",
    ];
    return view("templates/start", $data) .
      view("components/website/header", $data) .
      view("pages/topusers.php") .
      view("components/website/footer") .
      view("templates/end");
  }

  public function download(): string
  {
    $data = [
      "title" => "Download",
    ];
    return view("templates/start", $data) .
      view("components/website/header", $data) .
      view("pages/download.php") .
      view("components/website/footer") .
      view("templates/end");
  }

  public function no_locale(): \CodeIgniter\HTTP\RedirectResponse
  {
    return redirect()->to(base_url() . "en");
  }
}
