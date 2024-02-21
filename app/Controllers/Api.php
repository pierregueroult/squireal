<?php

namespace App\Controllers;

class Api extends BaseController
{
    public function subscribe()
    {
        // php://input 
        $post = json_decode(file_get_contents('php://input'), true);

        if (!isset($post['email'])) {
            return $this->response->setStatusCode(400)->setJSON([
                "success" => false,
                "error" => lang('Footer.newsletter_required')
            ]);
        }
        $email = filter_var($post['email'], FILTER_VALIDATE_EMAIL);
        if (!$email) {
            return $this->response->setStatusCode(400)->setJSON([
                "success" => false,
                "error" => lang('Footer.newsletter_invalid')
            ]);
        }
        // TODO: Save the email to the database
        return $this->response->setStatusCode(200)->setJSON([
            "success" => true,
            "message" => lang('Footer.newsletter_success')
        ]);
    }
}