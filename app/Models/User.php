<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model {
  protected $table = "user";
  protected $primaryKey = "user_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["username", "email", "name", "password", "phone", "points"];

  public function create($username, $email, $name, $password, $phone) {
    $data = [
      "username" => $username,
      "email" => $email,
      "name" => $name,
      "password" => password_hash($password, PASSWORD_DEFAULT),
      "phone" => $phone,
      "points" => 0,
    ];

    return $this->insert($data, false);
  }

  public function get($username) {
    return $this->where("username", $username)->first();
  }
}