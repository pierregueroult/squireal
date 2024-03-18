<?php

namespace App\Models;

use CodeIgniter\Model;

class Event extends Model
{
  protected $table = "event";
  protected $primaryKey = "event_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["name", "description", "date", "latitude", "longitude", "color", "owner_id"];

  public function create($name, $description, $date, $latitude, $longitude, $color, $owner_id)
  {
    $data = [
      "name" => $name,
      "description" => $description,
      "date" => $date,
      "latitude" => $latitude,
      "longitude" => $longitude,
      "color" => $color,
      "owner_id" => $owner_id,
    ];

    return $this->insert($data, false);
  }

  public function get($id)
  {
    return $this->where("event_id", $id)->first();
  }

  public function getFromOwner($owner_id)
  {
    return $this->where("owner_id", $owner_id)->findAll();
  }

  public function getAll()
  {
    return $this->findAll();
  }
}