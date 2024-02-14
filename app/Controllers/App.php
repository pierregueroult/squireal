<?php 

namespace App\Controllers;

class App extends BaseController 
{
    public function feed(): string 
    {
        $data = [
            "title" => "Feed",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }


    public function map(): string 
    {
        $data = [
            "title" => "Map",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }

    public function camera(): string 
    {
        $data = [
            "title" => "Camera",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }

    public function chat(): string 
    {
        $data = [
            "title" => "Chat",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }

    public function profile(): string 
    {
        $data = [
            "title" => "Profile",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }
}