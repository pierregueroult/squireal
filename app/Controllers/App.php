<?php 

namespace App\Controllers;

class App extends BaseController 
{
    public function feed(): string | \CodeIgniter\HTTP\RedirectResponse
    {
        if(!$this->session->get("name")) {
            $locale = $this->request->getLocale();
            return redirect()->to(base_url() . $locale . "/app/auth");
        }

        $data = [
            "title" => "Feed",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }


    public function map(): string 
    {
        if(!$this->session->get("name")) {
            $locale = $this->request->getLocale();
            return redirect()->to(base_url() . $locale . "/app/auth");
        }
        $data = [
            "title" => "Map",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }

    public function camera(): string 
    {
        if(!$this->session->get("name")) {
            $locale = $this->request->getLocale();
            return redirect()->to(base_url() . $locale . "/app/auth");
        }
        $data = [
            "title" => "Camera",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }

    public function chat(): string 
    {
        if(!$this->session->get("name")) {
            $locale = $this->request->getLocale();
            return redirect()->to(base_url() . $locale . "/app/auth");
        }
        $data = [
            "title" => "Chat",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }

    public function profile(): string 
    {
        if(!$this->session->get("name")) {
            $locale = $this->request->getLocale();
            return redirect()->to(base_url() . $locale . "/app/auth");
        }
        $data = [
            "title" => "Profile",
        ];

        return view("templates/start", $data) . view("templates/end", $data);
    }
}