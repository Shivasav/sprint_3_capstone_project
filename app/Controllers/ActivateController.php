<?php

namespace App\Controllers;
use App\Models\TripModel;

class ActivateController extends BaseController
{
    protected $tripModel;
    public function __construct()
    {
        $this->tripModel = new TripModel(); 
    }


    public function index()
    {
        // Load the session
         $session = \Config\Services::session();
        if ($session->get('active')) {
            $data['title'] = 'Activation';
            return view('pages/activate', $data);
        } else {
            // Session variable not set, redirect to the homepage
            return redirect()->to(base_url()); // You can replace 'base_url()' with the actual URL of your homepage
        }
    
     
    }


    public function email_verifyer()
    {
        $session = \Config\Services::session();
        if ($this->request->getMethod() === 'post') {
            $activationCode = $this->request->getPost('activation_code');
            
            // Simulate a server response
            if ($this->tripModel->get_driver_trips_alfacode($activationCode)) {
                // Code verification is successful 
                $response = ['success' => true, 'message' => 'Your code has been verified successfully!'];
                $session->destroy();
            } else {
                // Code verification failed
                $response = ['success' => false, 'message' => 'Invalid activation code or not exist.'];
            }
    
            return $this->response->setJSON($response);
        }

    }



}
