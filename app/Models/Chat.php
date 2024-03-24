<?php

namespace App\Models;

use CodeIgniter\Model;

class Chat extends Model
{
  protected $table = "chat";
  protected $primaryKey = "chat_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["message", "date", "userId", "eventId"];

  public function getAllMessagesFromEvent($eventId)
  {
    return $this->where("eventId", $eventId)->join("user", "user.user_id = chat.userId")->join("event", "event.event_id = chat.eventId")->findAll();
  }
}