<?php

namespace App\Models;

use CodeIgniter\Model;

class PostEvent extends Model
{
  protected $table = "postevent";
  protected $primaryKey = "postEvent_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["postEvent_id", "postId", "eventId"];

  public function create($post_id, $event_id)
  {
    $data = [
      "postId" => $post_id,
      "eventId" => $event_id,
    ];

    return $this->insert($data, false);
  }

  public function getFromPost($post_id)
  {
    $events = $this->where("postId", $post_id)->join("event", "event.event_id = postevent.eventId")->find();
    return count($events) == 1 ? $events[0] : [];
  }
}