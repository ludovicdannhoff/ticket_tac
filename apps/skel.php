<?php

// var_dump('coucou');

if ( !empty($_SESSION) )
{
    $session_id = $_SESSION['id'];
    
    if ( $_SESSION['role'] == 'admin')
        $session_role = 'admin';
    else
        $session_role = 'user';
// var_dump($session_role);
}
else{
    $session_id = null;
    $session_role = null;
// var_dump($session_role);
}

// var_dump($_SESSION);

require('views/skel.phtml');
?>