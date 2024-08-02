<?php

namespace App\Controllers;
use App\Models\HomeModel;

class HomeController extends BaseController
{
    private $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel(); // Instantiate your model and assign it to the property
          
    }

    public function index(): string
    {

        $data['tests'] = $this->homeModel->findAll();
        $data['title'] =  'Home';
        return view('pages/index',$data);
    }

    public function ajax_post() {
       
        $date = sanitize($this->request->getPost('date'));
        $time = sanitize($this->request->getPost('time'));

        $departureCity = sanitize($this->request->getPost('pickupCity'));
        $droppingCity = sanitize($this->request->getPost('dropCity'));

          // Perform the search using your criteria (customize as needed)
          $results = $this->homeModel->searchDrivers($departureCity, $droppingCity, $date, $time);

          // Return the results as JSON
          return $this->response->setJSON($results);
    }

}
