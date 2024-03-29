<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\PostEvent;
use App\Models\User;

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

  public function getLastPosts(int $count, int $offset): array
  {
    return $this->orderBy("date", "DESC")->join("user", "user.user_id = post.userId")->findAll($count, $offset);
  }

  public function createPost(array $data): bool
  {
    // if $data["file] is a string,
    $files = $data["file"];
    unset($data["file"]);
    $points = 30;

    $rowId = $this->insert($data, true);
    if ($data["event"] !== null) {
      $postEvent = model(PostEvent::class);
      $postEvent->create($rowId, $data["event"]);
      $points = 50;
    }

    if (is_string($files)) {
      $files = str_replace("data:image/png;base64,", "", $files);
      $files = str_replace(" ", "+", $files);
      $files = base64_decode($files);

      $newName = $data["userId"] . "_" . $rowId . ".png";

      if (file_put_contents("../public/image/upload/" . $newName, $files)) {
        $d = $this->where("post_id", $rowId)
          ->set(["image" => $newName])
          ->update();
        if (!$d) {
          $this->delete($rowId);
          return false;
        } else {
          $userModel = model(User::class);
          $userModel->addPoints($data["userId"], $points);
          return true;
        }
      } else {
        $this->delete($rowId);
        return false;
      }
    } else {
      $newName = $data["userId"] . "_" . $rowId . "." . pathinfo($files["name"], PATHINFO_EXTENSION);

      if (move_uploaded_file($files["tmp_name"], "../public/image/upload/" . $newName)) {
        $d = $this->where("post_id", $rowId)
          ->set(["image" => $newName])
          ->update();
        if (!$d) {
          $this->delete($rowId);
          return false;
        } else {
          $userModel = model(User::class);
          $userModel->addPoints($data["userId"], $points);
          return true;
        }
      } else {
        $this->delete($rowId);
        return false;
      }
    }
  }

  public function deletePost(int $id, int $userId): bool
  {
    $post = $this->find($id);
    if ($post["userId"] != $userId) {
      return false;
    } else {
      $postEvent = model(PostEvent::class);
      $postEvent->deleteFromPost($id);

      $image = $post["image"];
      if ($image !== "null") {
        unlink("../public/image/upload/" . $image);
      }
      $this->delete($id);
      return true;
    }
  }
}
