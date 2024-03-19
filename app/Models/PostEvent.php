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
}