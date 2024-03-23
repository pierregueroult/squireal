<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
  protected $table = "user";
  protected $primaryKey = "user_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["username", "email", "name", "password", "phone", "points"];

  public function create($username, $email, $name, $password, $phone)
  {
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

  public function get($username)
  {
    return $this->where("username", $username)->first();
  }

  public function login($email, $password)
  {
    $user = $this->where("email", $email)->first();

    if ($user) {
      if (password_verify($password, $user["password"])) {
        unset($user["password"]);
        return $user;
      }
    }

    return false;
  }

  public function getFromId(int $id)
  {
    return $this->where("user_id", $id)->first();
  }

  public function addPoints(int $id, int $points)
  {
    $user = $this->getFromId($id);

    if ($user) {
      $user["points"] += $points;
      return $this->update($id, ["points" => $user["points"]]);
    }

    return false;
  }
}