<?php
if ( $session_role == 'admin' )
	$header = 'header_admin';
else if ( $session_role == 'user' )
	$header = 'header_user';
else
	$header = 'header';

require('views/'.$header.'.phtml');
<<<<<<< HEAD
// require('views/header.phtml');
// require('views/header_user.phtml');
// require('views/header_admin.phtml');
=======
>>>>>>> 43d475aaf8de48a8b4ecf35f3cbfa335fdc32991
?>