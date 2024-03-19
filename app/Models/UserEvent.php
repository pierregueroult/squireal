<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEvent extends Model
{
  protected $table = "userevent";
  protected $primaryKey = "userEvent_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["userEvent_id", "userId", "eventId"];

  public function create($user_id, $event_id)
  {
    $data = [
      "userId" => $user_id,
      "eventId" => $event_id,
    ];

    return $this->insert($data, false);
  }

  public function getFromUser($user_id)
  {
    return $this->where("user_id", $user_id)->findAll();
  }

  public function getFromEvent($event_id)
  {
    return $this->where("event_id", $event_id)->findAll();
  }

  public function getAll()
  {
    return $this->findAll();
  }

  public function getEventsFromUser($user_id)
  {
    return $this->where("userId", $user_id)->join("event", "event.event_id = userevent.eventId")->findAll();
  }
}