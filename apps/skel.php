<?php

// // var_dump('coucou');
/* ##PASCAL ~> Je déconseille de créer des variables pour ça, le mieux est de checker dans votre code a chaque $_SESSION directement */
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

// // var_dump($_SESSION);

require('views/skel.phtml');
?>