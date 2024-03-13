<?php

namespace App\Controllers;

class Post extends BaseController
{
  public function create()
  {

    $data = [
      "title" => "Créer un post",
    ];

    return view("templates/start", $data) .
      view("components/app/header", $data) .
      view("pages/createPost", $data) .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }
}