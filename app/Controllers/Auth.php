<?php

namespace App\Controllers;

class Auth extends BaseController
{

    public function auth(): string
    {
        $data = [
            "title" => "Auth",
        ];

        return view("templates/start", $data)
            . view("pages/auth", $data)
            . view("templates/end", $data);
    }

    public function login(): string
    {
        $data = [
            "title" => "Login",
        ];

        return view("templates/start", $data) 
        . view("pages/login", $data)
        . view("templates/end", $data);
    }

    public function register(): string
    {
        $data = [
            "title" => "Register",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }

    public function forgot(): string
    {
        $data = [
            "title" => "Forgot",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }
}