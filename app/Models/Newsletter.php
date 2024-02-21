<?php

namespace App\Models;

use CodeIgniter\Model;

class Newsletter extends Model
{
  protected $table = "newsletter";
  protected $primaryKey = "newsletter_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["email", "date", "verified"];

  public function register($email)
  {
    $data = [
      "email" => $email,
      "date" => date("Y-m-d H:i:s"),
      "verified" => 0,
    ];

    return $this->insert($data, false);
  }

  public function exist($email): bool
  {
    return $this->where("email", $email)->countAllResults() > 0;
  }
}
