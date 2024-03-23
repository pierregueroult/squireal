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
      $update = $userModel->update($_POST["user"], ["name" => htmlentities($_POST["Profile_name"])]);
    } elseif (isset ($_POST["Profile_email"])) {
      $update = $userModel->update($_POST["user"], ["email" => htmlentities($_POST["Profile_email"])]);
    } elseif (isset ($_POST["Profile_phone"])) {
      $update = $userModel->update($_POST["user"], ["phone" => htmlentities($_POST["Profile_phone"])]);
    }

    $_SESSION["user"] = $userModel->find($_POST["user"]);

    return $this->response->redirect($_POST["url"]);
  }
}
