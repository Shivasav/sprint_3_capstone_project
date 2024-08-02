<?php

namespace App\Controllers;
//use App\Models\DetailModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        //$this->DetailModel = new DetailModel(); // Load the model
       
    }

    // public function index()
    // {
      
    //   $data['title'] =  'Login';
    //   // $data['details'] = $this->DetailModel->getTripWithAddressMapping($id);
    //   return view('pages/login', $data);
    // }

    public function index()
    {
        helper('google_auth');
        $client = getGoogleClient();

         if ($this->request->getPost('code')) {
            return $this->handleGoogleCallback($client);
        }  
        // If no code, show the login page with Google sign-in button
        return view('pages/login', ['googleAuthUrl' => getAuthUrl($client), 'title' => 'Login']);
    }

    public function googleLogin()
    {
        helper('google_auth');
        $client = getGoogleClient();
        $authUrl = getAuthUrl($client);
        return redirect()->to($authUrl);
    }

    private function handleGoogleCallback($client)
    {
        try {
            $userInfo = getGoogleUserInfo($client, $this->request->getPost('code'));

            // Here you would typically:
            // 1. Check if the user exists in your database
            // 2. If not, create a new user
            // 3. Log the user in

            // For this example, we'll just show the user info
            return view('auth/google_success', ['userInfo' => $userInfo]);
        } catch (\Exception $e) {
            return redirect()->to('/signup')->with('error', 'Google authentication failed: ' . $e->getMessage());
        }
    }

}
