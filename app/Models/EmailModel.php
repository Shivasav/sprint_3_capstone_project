<?php

namespace App\Models;
use CodeIgniter\Model;

class EmailModel extends Model
{
 
    public function sendEmailverification($fromemail, $randomCode, $type, $trip_id)
    {
        // Load the Email Library
        $email = \Config\Services::email(); 
       
        // Set email parameters
        $email->setTo($fromemail);
        $email->setFrom('noreply@pointrover.com', 'Pointrover.com');
        $email->setSubject('Activate Your Posted Trip');

        // Load the HTML email template
        $emailTemplate = view('email_template/send_verification_code', ['randomCode' => $randomCode, 'type' => $type, 'trip_id'=>$trip_id]);

        // Set the email message with the HTML template
        $email->setMessage($emailTemplate);

        // Attempt to send the email
        if ($email->send()) {
           return true;
        } else {
           // echo 'Email not sent';
            echo $email->printDebugger(['headers']);
           //return false;
        }
    }

   

}

?>