<<<<<<< HEAD
<?php 
$login = mysqli_real_escape_string($db, $_SESSION['login']);
$query = "SELECT * FROM `users` WHERE login_user = '".$login."' LIMIT 0, 30 ";
$res = mysqli_query($db, $query);
	if ($res)
	{
		$user = mysqli_fetch_assoc($res);
	}
$email = $user['email_user'];
$phone = $user['phone_user'];
$employment = $user['employment_user'];
$first_name = $user['first_name_user'];
$last_name = $user['last_name_user'];
$role = $user['role_user'];



require('views/account.phtml'); ?>
=======
<?php require('views/account.phtml'); ?>
>>>>>>> 43d475aaf8de48a8b4ecf35f3cbfa335fdc32991
