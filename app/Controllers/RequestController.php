<?php

namespace App\Controllers;
//use App\Models\DetailModel;

class RequestController extends BaseController
{
    public function __construct()
    {
        //$this->DetailModel = new DetailModel(); // Load the model
       
    }

    public function index()
    {
      
       $data['title'] =  'Request';
      // $data['details'] = $this->DetailModel->getTripWithAddressMapping($id);
       return view('pages/request', $data);
    }



}
