<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index(): string
  {
    // $locale = $this->request->getLocale();
    $data = [
      "title" => "Home",
    ];
    return view("templates/start", $data) . view("components/website/header", $data) . view("pages/home.php") . view("components/website/footer") . view("templates/end");
  }
}
