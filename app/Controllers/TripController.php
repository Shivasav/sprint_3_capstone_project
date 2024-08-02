<?php

namespace App\Controllers;
use App\Models\TripModel;
use App\Models\EmailModel;
use App\Models\UserModel;

class TripController extends BaseController
{
    protected $tripModel;
    protected $EmailModel;
    protected $UserModel;

    public function __construct()
    {
        
        $this->tripModel = new TripModel(); // Load the model
        $this->EmailModel = new EmailModel(); // Load the model
        $this->UserModel = new UserModel();
    }
    
    public function index(): string
    {
        $data['title'] =  'Post a Trip';   
        return view('pages/post', $data);
        
    }

    public function save_trip()
    { 
         $type = sanitize($this->request->getPost('type'));

        $formData = [
            'type' => $type,
            'alfa_code' => ($type == 1) ? generateDriverRand(10) : generateCustomerRand(10),
            'departure' => sanitize($this->request->getPost('departure')),
            'drop_location' => sanitize($this->request->getPost('drop')),
            'date' => sanitize($this->request->getPost('date')),
            'time' => sanitize($this->request->getPost('time')),
            'gender' => sanitize($this->request->getPost('gender')),
            'available_seats' => sanitize($this->request->getPost('availableSeats')),
            'fare' => sanitize($this->request->getPost('fare')),
            'note' => sanitize($this->request->getPost('desc'))
        ];

        $user_data = [
            'type' => $type,
            'name' => sanitize($this->request->getPost('name')),
            'email' => sanitize($this->request->getPost('email')),
            'phone' => sanitize($this->request->getPost('mobile'))
        ];

        $addressData = [
            'departure_city' => sanitize($this->request->getPost('departure_c')),
            'departure_postal' => sanitize($this->request->getPost('departure_p')),
            'departure_province' => sanitize($this->request->getPost('departure_pv')),
            'dropping_city' => sanitize($this->request->getPost('drop_c')),
            'dropping_postal' => sanitize($this->request->getPost('drop_p')),
            'dropping_province' => sanitize($this->request->getPost('drop_pv')),
            'distance' => sanitize($this->request->getPost('distance')),
            'estimate_time' => sanitize($this->request->getPost('eta'))
        ];

        $recent_id = $this->tripModel->insertFormData($formData, $addressData, $user_data);

        if ($recent_id) {   
             $trip_data = $this->tripModel->get_driver_trips_id($recent_id);
             $user_data = $this->UserModel->get_userdata_via_id($trip_data[0]['uid']);
             
             if($user_data[0]['email_verify'] == 0){
                $mail_result =  $this->EmailModel->sendEmailverification($user_data[0]['email'], $trip_data[0]['alfa_code'], $user_data[0]['type'], $recent_id);

                if ($mail_result) {
                    $response = ['success' => true, 'message' => 'An exclusive Activation code has been dispatched to your registered email address. 
                    Please be sure to check your spam or junk folders if you do not find it in your inbox.', 'redirect'=> base_url('/activate')];
                }else{
                    $response = ['success' => false, 'message' => 'Unable to send verification code, try again later!', 'redirect'=> base_url('/')];
                }
             } else {
                 $response = ['success' => true, 'message' => 'Your trip successfully posted.', 'redirect'=> base_url('/find')];
             }
          
        }else{
            $response = ['success' => false, 'message' => 'Failed to insert data.'];
        }

        return $this->response->setJSON($response);
    }


}
