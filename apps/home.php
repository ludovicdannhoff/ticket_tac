<?php 
<<<<<<< HEAD
// var_dump($_SESSION);
=======

>>>>>>> 43d475aaf8de48a8b4ecf35f3cbfa335fdc32991
if ( $session_role == 'admin' )
	$home = 'home';
else if ( $session_role == 'user' )
	$home = 'home';
else
	$home = 'home_login';

<<<<<<< HEAD
// require('views/home.phtml');
// require('views/home_login.phtml');
require('views/'.$home.'.phtml');
?>
=======
require('views/home.phtml');
require('views/home_login.phtml');
?>
>>>>>>> 43d475aaf8de48a8b4ecf35f3cbfa335fdc32991
