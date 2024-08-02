<?php 


// Success Notificaation and redirect
function success($message = '', $redirectTo = '')
{
    $session = session();
    $session->setFlashdata('flash_message', $message);
    return redirect()->to($redirectTo);
}

function error($message = '', $redirectTo = '')
{
    $session = session();
    $session->setFlashdata('error_message', $message);
    return redirect()->to($redirectTo);
}