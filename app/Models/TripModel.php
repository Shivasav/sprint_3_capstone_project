<?php

namespace App\Models;
use CodeIgniter\Model;

class TripModel extends Model
{
    protected $table = 'driver_trips';
   // protected $allowedFields = ['departure', 'drop_location', 'date', 'time', 'gender','available_seats', 'fare', 'name', 'email', 'mobile','note'];
  
   //Strong data inside 2 tables at once
    public function insertFormData($formData, $addressData, $user_data)
    {
        $session = \Config\Services::session(); // Load the session
        $session->start();
        $session->set('active', 1);
        // Check if the email already exists in the 'users' table
        $existingUser = $this->db->table('user_data')->where('email', $user_data['email'])->get();
        $resultArray = $existingUser->getResult();

        if ($resultArray) {
            // The email already exists, so retrieve the user ID
            $insertId = $resultArray[0]->uid; // Assuming 'uid' is the primary key column

            $formData['uid'] = $insertId; 
            $result = $this->db->table($this->table)->insert($formData);
            $driver_trips_id = $this->db->insertID(); 
            $addressData['driver_trips_id'] = $driver_trips_id;
            $this->db->table('address_maping')->insert($addressData); 

            return $driver_trips_id;
        } else {
            // The email doesn't exist, so insert a new user
            $user_data_response = $this->db->table('user_data')->insert($user_data);  
            $insertId = $this->db->insertID(); //getting recent insert id

            if($insertId) {

                $formData['uid'] = $insertId; 
                $result = $this->db->table($this->table)->insert($formData);
                $driver_trips_id = $this->db->insertID(); 
                $addressData['driver_trips_id'] = $driver_trips_id;
                $this->db->table('address_maping')->insert($addressData);  
                
                return $driver_trips_id;
        
            }


        }

     
        return false;
    }

    //Joining both table by id and get all results 
    public function get_result_dt_am($perPage = 8, $page = 1, $pick = '', $drop = '', $date = '', $time = '')
    {
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');

       
        if(!empty($time))
        {
             // Decode the time parameter (replace '%20' with a space)
            $time = urldecode($time);

            // Convert the time to the database format
            $timeDatabaseFormat = date('H:i:s', strtotime($time));
        }
       
        
        $query = $this->db->table('driver_trips AS dt')
        ->select('dt.id, dt.type, dt.departure, dt.drop_location, dt.date, dt.time, dt.gender, dt.available_seats, dt.fare, dt.note, 
                    am.departure_city, am.departure_postal, am.departure_province, am.dropping_city, am.dropping_postal, am.dropping_province, am.distance,
                    am.estimate_time, ud.email_verify')
        ->join('address_maping AS am', 'dt.id = am.driver_trips_id', 'left')
        ->join('user_data AS ud', 'dt.uid = ud.uid', 'left'); // Add the join with user_data table
     

        // Add a WHERE clause to filter results based on pick and drop if they are not empty
        if (!empty($pick)) {
            $query->like('am.departure_city', $pick);
        }

        if (!empty($drop)) {
            $query->like('am.dropping_city', $drop);
        }

        // Conditionally add date and time to the query if they are specified
        if (!empty($date)) {
            $query->where('dt.date >=', $date);
        }

        if (!empty($timeDatabaseFormat)) {
            $query->where('dt.time >=', $timeDatabaseFormat);
        }

         // Add a condition to filter rows where email_verify is equal to 1
        $query->where('ud.email_verify', 1);

        // Add an ORDER BY clause to sort by date and time in ascending order
        $query->orderBy('dt.date', 'ASC')->orderBy('dt.time', 'ASC');

        // Default filter for current and future records
        $query->where("(dt.date >= '{$currentDate}' OR (dt.date = '{$currentDate}' AND dt.time >= '{$currentTime}'))");


    
        $totalRows = $query->countAllResults(false);
        $totalPages = ceil($totalRows / $perPage);
    
        $offset = ($page - 1) * $perPage;
        $query = $query->get($perPage, $offset);
    
        $result = $query->getResult();
    
        return [
            'result' => $result,
            'totalRows' => $totalRows,
            'totalPages' => $totalPages
        ];
    }
    //get data from address_mapping by driver_trip_id
    public function get_map_by_did($id)
    {
       
        $data = $this->db->table('address_maping')->find($id);

        if ($data) {
            // Data found, use $data as needed
            print_r($data);
        } else {
            echo 'Data not found.';
        }
    }

 public function get_driver_trips_id($id)
 {
    $query = $this->db->table($this->table);
    $query->where('id', $id); // Assuming 'id' is the primary key column name

    $result = $query->get()->getResultArray(); // Use get() to execute the query and get the row

    if ($result) {
        return $result;
    } else {
        return false;
    }
 }

 public function get_driver_trips_alfacode($code)
 {
    if(isValidDRCUCode($code)){
        $query = $this->db->table($this->table);
        $result_data = $query->getWhere(['alfa_code' => $code])->getRow(); 
        if($result_data) {
            $data = ['email_verify' => 1]; // Define the column and its new value
            $result = $this->db->table('user_data')->where('uid', $result_data->uid)->update($data);
            if($result) {
                return true;
            }
         
        }
    }
   return false;
 }




}

?>