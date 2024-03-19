<?php

namespace App\Controllers;

use App\Models\Post as PostModel;
use App\Models\UserEvent;

class Post extends BaseController
{
  public function create()
  {
    $userEventModel = model(UserEvent::class);
    $userId = $_SESSION["user"]["user_id"];
    $events = $userEventModel->getEventsFromUser($userId);

    $data = [
      "title" => "Créer un post",
      "events" => $events,
      "locale" => $this->request->getLocale(),
      "image" => $_POST['photo'] ?? null,
    ];

    return view("templates/start", $data) .
      view("components/app/header", $data) .
      view("pages/createPost", $data) .
      view("components/app/navigation", $data) .
      view("templates/end", $data);
  }

  public function form()
  {
    if (!isset ($_POST["currentUrl"])) {
      return redirect()->to(base_url());
    }

    if (!isset ($_SESSION["user"])) {
      return redirect()->to($_POST["currentUrl"] . "?error=auth");
    }

    if (!isset ($_POST["description"])) {
      return redirect()->to($_POST["currentUrl"] . "?error=description");
    }

    if (!isset ($_FILES["picture"]) && !isset ($_POST["photo"])) {
      return redirect()->to($_POST["currentUrl"] . "?error=picture");
    }

    if (isset ($_FILES["picture"])) {
      $allowed = ["image/png", "image/jpeg", "image/jpg", "image/gif", "image/webp"];

      if (!in_array($_FILES["picture"]["type"], $allowed)) {
        return redirect()->to($_POST["currentUrl"] . "?error=notAllowed");
      }

      $data = [
        "image" => "null",
        "description" => htmlentities($_POST["description"]),
        "date" => date("Y-m-d H:i:s"),
        "userId" => $_SESSION["user"]["user_id"],
        "file" => $_FILES["picture"],
        "event" => $_POST["event"] === "none" ? null : $_POST["event"],
      ];
    } else if (isset ($_POST["photo"])) {
      $data = [
        "image" => $_POST["photo"],
        "description" => htmlentities($_POST["description"]),
        "date" => date("Y-m-d H:i:s"),
        "userId" => $_SESSION["user"]["user_id"],
        "file" => $_POST["photo"],
        "event" => $_POST["event"] === "none" ? null : $_POST["event"],
      ];
    }


    $model = model(PostModel::class);

    if ($model->createPost($data)) {
      return redirect()->to(base_url());
    } else {
      return redirect()->to($_POST["currentUrl"] . "?error=unknown");
    }
  }
}
