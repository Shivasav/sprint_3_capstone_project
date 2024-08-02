<?php

namespace App\Controllers;
use App\Models\DetailModel;
use App\Models\UserModel;

class DetailController extends BaseController
{
    public function __construct()
    {
        $this->DetailModel = new DetailModel(); // Load the model
        $this->UserModel = new UserModel();
    }

    public function index($id="")
    {

       if(empty($id)) {
        return redirect()->to(base_url());
       } 
    
       if(sanitize($id)) {
            $data['title'] =  'Detail';
            $data['details'] = $this->DetailModel->getTripWithAddressMapping($id);
            $data['contact'] = $this->UserModel->get_userdata_via_id($data['details']->uid);
            return view('pages/detail', $data);
       }
      
    }



}