<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user_data';

    public function get_userdata_via_id($id)
    {
       $query = $this->db->table($this->table);
       $query->where('uid', $id); // Assuming 'id' is the primary key column name
   
       $result = $query->get()->getResultArray(); // Use get() to execute the query and get the row
   
       if ($result) {
           return $result;
       } else {
           return false;
       }
    }

}

?>