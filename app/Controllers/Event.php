<?php

namespace App\Controllers;

use App\Models\Event as EventModel;

class Event extends BaseController
{
  public function form()
  {
    $owner_id = session()->get("user")["user_id"];

    $eventModel = new \App\Models\Event();

    // needed post data to verify: name, description, date, latitude, longitude, pin

    $name = $this->request->getPost("title");
    $description = $this->request->getPost("description");
    $date = $this->request->getPost("date");
    $latitude = $this->request->getPost("latitude");
    $longitude = $this->request->getPost("longitude");
    $color = $this->request->getPost("pin");
    $locale = $this->request->getPost("locale");

    if ($locale != "en" && $locale != "fr") {
      $locale = "en";
    }

    if (!isset ($name, $description, $date, $latitude, $longitude, $color)) {
      var_dump($name, $description, $date, $latitude, $longitude, $color);
      // return redirect()->to(base_url() . "$locale/app/event/create");
      return;
    }

    $eventModel->create($name, $description, $date, $latitude, $longitude, $color, $owner_id);

    return redirect()->to(base_url() . "$locale/app/map");

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

  public function getAll()
  {
    $eventModel = model(EventModel::class);
    $events = $eventModel->getAll();
    return $this->response->setContentType('application/json')->setJSON($events);
  }
}