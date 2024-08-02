<?php

namespace App\Controllers;
//use App\Models\DetailModel;

class RegisterController extends BaseController
{
    public function __construct()
    {
        //$this->DetailModel = new DetailModel(); // Load the model
       
    }

    public function index()
    {
      
       $data['title'] =  'Register';
      // $data['details'] = $this->DetailModel->getTripWithAddressMapping($id);
       return view('pages/register', $data);
    }



}
