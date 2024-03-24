<?php

namespace App\Controllers;

use App\Models\Newsletter;
use App\Models\User;

class Api extends BaseController
{
  public function subscribe()
  {
    $post = json_decode(file_get_contents("php://input"), true);

    if (!isset ($post["email"])) {
      return $this->response->setStatusCode(400)->setJSON([
        "success" => false,
        "error" => lang("Footer.newsletter_required"),
      ]);
    }
    $email = filter_var($post["email"], FILTER_VALIDATE_EMAIL);
    if (!$email) {
      return $this->response->setStatusCode(400)->setJSON([
        "success" => false,
        "error" => lang("Footer.newsletter_invalid"),
      ]);
    }

    $model = model(Newsletter::class);

    if ($model->exist($email)) {
      return $this->response->setStatusCode(400)->setJSON([
        "success" => false,
        "error" => lang("Footer.newsletter_exist"),
      ]);
    }

    $register = $model->register($email);

    if (!$register) {
      return $this->response->setStatusCode(500)->setJSON([
        "success" => false,
        "error" => lang("Footer.newsletter_error"),
      ]);
    }

    return $this->response->setStatusCode(200)->setJSON([
      "success" => true,
      "message" => lang("Footer.newsletter_success"),
    ]);
  }

  public function updateProfile()
  {
    if ($_POST["user"] !== $_SESSION["user"]["user_id"]) {
      return $this->response->redirect(base_url() . $_POST["lang"] . "/app/auth");
    }
    $userModel = model(User::class);


    if (isset ($_POST["Profile_name"])) {
      $userModel->update($_POST["user"], ["name" => htmlentities($_POST["Profile_name"])]);
    } elseif (isset ($_POST["Profile_email"])) {
      $userModel->update($_POST["user"], ["email" => htmlentities($_POST["Profile_email"])]);
    } elseif (isset ($_POST["Profile_phone"])) {
      $userModel->update($_POST["user"], ["phone" => htmlentities($_POST["Profile_phone"])]);
    }

    $_SESSION["user"] = $userModel->find($_POST["user"]);

    return $this->response->redirect($_POST["url"]);
  }

  public function updateImage()
  {
    // make sure user, land and url POST data are set
    if (!isset ($_POST["lang"]))
      return $this->response->redirect(base_url());
    if (!isset ($_POST["user"]) || !isset ($_POST["url"]))
      return $this->response->redirect(base_url() . $_POST["lang"] . "/app/profile");
    if ($_POST["user"] !== $_SESSION["user"]["user_id"])
      return $this->response->redirect(base_url() . $_POST["lang"] . "/app/auth");
    if (!isset ($_FILES["profile-pic"]))
      return $this->response->redirect($_POST["url"] . "?error=profile-pic");

    $allowed = ["image/png", "image/jpeg", "image/jpg", "image/gif", "image/webp"];

    if (!in_array($_FILES["profile-pic"]["type"], $allowed))
      return $this->response->redirect($_POST["url"] . "?error=profile-pic");

    $extension = pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION);

    $newName = $_POST["user"] . "." . $extension;

    if (move_uploaded_file($_FILES["profile-pic"]["tmp_name"], "../public/image/user/temp/" . $newName)) {
      $source = "../public/image/user/temp/" . $newName;
      $quality = 100;

      $userModel = model(User::class);
      $username = $userModel->find($_POST["user"])["username"];
      if (!isset ($username)) {
        unlink($source);
        return $this->response->redirect($_POST["url"] . "?error=profile-pic");
      }
      $destination = "../public/image/user/upload/" . $username . ".webp";
      $info = getimagesize($source);
      $alpha = false;

      if ($info["mime"] === "image/jpeg" || $info["mime"] === "image/jpg") {
        $image = imagecreatefromjpeg($source);
      } elseif ($info["mime"] === "image/png") {
        $image = imagecreatefrompng($source);
      } elseif ($info["mime"] === "image/webp") {
        $image = imagecreatefromwebp($source);
      }

      imagewebp($image, $destination, $quality);
      unlink($source);

      return $this->response->redirect($_POST["url"] . "?success=true");

    } else {
      return $this->response->redirect($_POST["url"] . "?error=profile-pic");
    }
  }
}
