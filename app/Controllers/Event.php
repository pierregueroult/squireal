<?php

namespace App\Controllers;

class Event extends BaseController
{
  public function form()
  {
    var_dump($_POST);
  }

  public function create()
  {
    $data = [
      "title" => "Créer un événement",
    ];

    return view("templates/start", $data) .
      view("components/app/header", $data) .
      view("pages/createEvent", $data) .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }
}