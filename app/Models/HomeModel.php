<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'address_maping';

    public function searchDrivers($departureCity,$droppingCity,$date, $time)
    {
            // Perform the search query
            return   $results = $this->where('departure_city', $departureCity)
                    ->where('dropping_city', $droppingCity)
                    ->findAll();
    }

}

?>