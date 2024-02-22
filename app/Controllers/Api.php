<?php

namespace App\Controllers;

use App\Models\Newsletter;

class Api extends BaseController
{
  public function subscribe()
  {
    $post = json_decode(file_get_contents("php://input"), true);

    if (!isset($post["email"])) {
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
}
