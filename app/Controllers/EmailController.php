<?php

namespace App\Controllers;
//use App\Models\HomeModel;

class EmailController extends BaseController
{
 
    // public function sendEmail()
    // {
    //     // Load the Email Library
    //     $email = \Config\Services::email(); 

    //     // Set email parameters
    //     $email->setTo('ns949405@gmail.com');
    //     $email->setFrom('noreply@pointrover.com', 'Pointrover.com');
    //     $email->setSubject('Email Verification');

    //     // Generate the random code 
    //     $randomCode = generateCustomerRand(); 
    //     // Load the HTML email template
    //     $emailTemplate = view('email_template/send_verification_code', ['randomCode' => $randomCode]);

    //     // Set the email message with the HTML template
    //     $email->setMessage($emailTemplate);

    //     // Attempt to send the email
    //     if ($email->send()) {
    //         echo 'Email sent successfully';
    //     } else {
    //         echo 'Email not sent';
    //         echo $email->printDebugger(['headers']);
    //     }
    // }

}
