<?php

namespace App\Models;
use CodeIgniter\Model;

class SearchModel extends Model
{
    protected $table = 'driver_trips';

    public function checkCodeExists($code)
    {
        $query = $this->db->table($this->table)
                ->where('alfa_code', $code)
                ->get();
            // Check if the query returned any rows
            if ($query->getNumRows() > 0) {
                // Data was found, you can retrieve and return it
                $resultArray = $query->getResult(); // Get the results as an array of objects
                $result = $resultArray[0]; // Access the first object in the array
                return $result;
            } 
    }

   

}

?>