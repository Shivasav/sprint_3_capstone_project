<?php

namespace App\Models;
use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table = 'driver_trips';

  
    public function getTripWithAddressMapping($id)
    {
        return $this->db->table('driver_trips AS dt')
        ->select('dt.*, am.*') // Select all columns from both tables
        ->join('address_maping AS am', 'dt.id = am.driver_trips_id', 'left')
        ->where('dt.id', $id)
        ->get()
        ->getRow();
    }

    function generateGoogleMapsLink($address1, $address2) {
        $encodedAddress1 = urlencode($address1);
        $encodedAddress2 = urlencode($address2);
    
        $googleMapsLink = "https://www.google.com/maps/dir/{$encodedAddress1}/{$encodedAddress2}/";
    
        return $googleMapsLink;
    }

}

?>