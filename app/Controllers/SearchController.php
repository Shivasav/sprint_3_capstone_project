<?php

namespace App\Controllers;
use App\Models\SearchModel;

class SearchController extends BaseController
{
    public function __construct()
    {
        $this->SearchModel = new SearchModel(); // Load the model
       
    }

    public function validatethecode()
    {
         // Get the posted code from the form
        $code = sanitize($this->request->getPost('code'));

        // Assuming you have a method in your model to check if the code exists
        $response = $this->SearchModel->checkCodeExists($code);

        if ($response) {
            $res_back = [
                    "msg" => "Code successfully validated!",
                    "status" => true, // or "error" or any other status value
                    "redirect" => base_url('/detail/'.$response->id)
                ];

                return $jsonResponse = json_encode($res_back);
          
        } else {
            // Code is valid
            $res_back = [
                "msg" => "Invalid code or code not exist!",
                "status" => false, // or "error" or any other status value'
            ];
            return $jsonResponse = json_encode($res_back);
        }
    }



}
