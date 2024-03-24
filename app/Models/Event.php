<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\User;

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

    $userModel = model(User::class);
    $userModel->addPoints($owner_id, 100);

    return $this->insert($data, false);
  }

  public function get($event_id)
  {
    return $this->find($event_id);
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