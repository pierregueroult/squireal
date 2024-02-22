<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends BaseController
{
  public function auth(): string
  {
    $data = [
      "title" => "Auth",
    ];

    return view("templates/start", $data) .
      view("pages/auth", $data) .
      view("templates/end", $data);
  }

  public function login(): string
  {
    $data = [
      "title" => "Login",
    ];

    return view("templates/start", $data) .
      view("pages/login", $data) .
      view("templates/end", $data);
  }

  public function register(): string
  {
    $data = [
      "title" => "Register",
    ];

    return view("templates/start", $data) .
      view("pages/register", $data) .
      view("templates/end", $data);
  }

  public function forgot(): string
  {
    $data = [
      "title" => "Forgot",
    ];

    return view("templates/start", $data) . view("templates/end", $data);
  }

  public function create() {
    // get the post data from the form 
    $post = $this->request->getPost();
    $required = ["username", "email", "completename", "password", "phone"];

    foreach ($required as $field) {
      if (!isset($post[$field])) {
        return redirect()->to(base_url() . "/en/app/auth/register" . "?error=" . urlencode("field_" . $field . "_required"));
      }
    }

    $username = filter_var($post["username"], FILTER_SANITIZE_STRING);
    $email = filter_var($post["email"], FILTER_VALIDATE_EMAIL);
    $name = filter_var($post["completename"], FILTER_SANITIZE_STRING);
    $password = filter_var($post["password"], FILTER_SANITIZE_STRING);
    $phone = filter_var($post["phone"], FILTER_SANITIZE_STRING);

    if (!preg_match("/^[a-z0-9]+$/", $username)) {
      return redirect()->to(base_url() . "/en/app/auth/register" . "?error=" . urlencode("username_invalid"));
    }

    if (!$email) {
      return redirect()->to(base_url() . "/en/app/auth/register" . "?error=" . urlencode("email_invalid"));
    }

    if (!preg_match("/^[a-zA-Z]+ [a-zA-Z]+$/", $name)) {
      return redirect()->to(base_url() . "/en/app/auth/register" . "?error=" . urlencode("name_invalid"));
    }

    if (strlen($password) < 8) {
      return redirect()->to(base_url() . "/en/app/auth/register" . "?error=" . urlencode("password_invalid"));
    }

    if (!preg_match("/^[0-9]+$/", $phone)) {
      return redirect()->to(base_url() . "/en/app/auth/register" . "?error=" . urlencode("phone_invalid"));
    }

    $model = model(User::class);

    $exists = $model->get($username);

    if ($exists) {
      return redirect()->to(base_url() . "/en/app/auth/register" . "?error=" . urlencode("username_exists") . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&completename=" . urlencode($name) . "&phone=" . urlencode($phone) . "&password=" . urlencode($password));
    }

    $model->create($username, $email, $name, $password, $phone);

    return redirect()->to(base_url() . "/en/app/auth/login" . "?success=" . urlencode("account_created"));

  }
}
