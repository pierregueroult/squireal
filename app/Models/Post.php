<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
  protected $table = "post";
  protected $primaryKey = "post_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["image", "description", "userId", "date"];

  public function getFromUser(int $userId) : array
  {
    return $this->where("userId", $userId)->findAll();
  }

  public function getLatest(string $count) : array
  {
    return $this->orderBy("date", "DESC")->findAll($count);
  }
}
