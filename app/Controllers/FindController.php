<?php

namespace App\Controllers;
use App\Models\TripModel;

class FindController extends BaseController
{
    protected $tripModel;

    public function __construct()
    {
        $this->tripModel = new TripModel(); // Load the model
       
    }

    public function index(): string
    {
        
         // Get multiple GET parameters as an array
         $params = $this->request->getGet();
         $pick = isset($params['pick']) ? $params['pick'] : null;
         $drop = isset($params['drop']) ? $params['drop'] : null;
         $date = isset($params['date']) ? $params['date'] : null;
         $time = isset($params['time']) ? $params['time'] : null;
        
        $perPage = 8; // Number of items per page
        $page = $this->request->getVar('page') ?? 1; // Get the requested page number from the URL

        $data['title'] = 'Find a ride';
        $data['pagination'] = $this->tripModel->get_result_dt_am($perPage, $page, $pick, $drop, $date, $time);
        $data['page'] = $page; // Pass the $page variable to the view

        return view('pages/find', $data);
    }

}
