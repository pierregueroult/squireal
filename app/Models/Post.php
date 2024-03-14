<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
  protected $table = "post";
  protected $primaryKey = "post_id";
  protected $useAutoIncrement = true;
  protected $allowedFields = ["image", "description", "userId", "date"];

  public function getFromUser(int $userId): array
  {
    return $this->where("userId", $userId)->findAll();
  }

  public function getLatest(string $count): array
  {
    return $this->orderBy("date", "DESC")->findAll($count);
  }

  public function createPost(array $data): bool
  {
    $files = $data["file"];
    unset($data["file"]);
    $rowId = $this->insert($data, true);

    $newName = $data["userId"] . "_" . $rowId . "." . pathinfo($files["name"], PATHINFO_EXTENSION);
    if (move_uploaded_file($files["tmp_name"], "../public/image/upload/" . $newName)) {
      $d = $this->where("post_id", $rowId)
        ->set(["image" => $newName])
        ->update();
      if (!$d) {
        $this->delete($rowId);
        return false;
      } else {
        return true;
      }
    } else {
      $this->delete($rowId);
      return false;
    }
  }
}
