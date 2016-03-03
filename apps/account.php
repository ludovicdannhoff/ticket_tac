<?php 
/* ##PASCAL ~> Faites une recherche par $_SESSION['id'] plutot que par login, et ne mettez pas de limit, ou alors limit 0,1 ! */
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
/* ##PASCAL ~> Pas besoin de déclarer 6 variables ici, vous pouvez directement mettre <?=$user['email_user']?> dans le phtml, c'est plus propre ! */


require('views/account.phtml'); ?>
