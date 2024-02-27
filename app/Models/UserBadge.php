<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBadge extends Model
{
  protected $table = "userbadge";
  protected $primaryKey = "userBadge_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["userId", "badgeId"];

  public function getBadges($userId)
  {
    return $this->where("userId", $userId)->findAll();
  }
}
