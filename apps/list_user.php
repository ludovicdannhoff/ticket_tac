<?php
$query = "SELECT * FROM users";
$res = mysqli_query($db, $query);

while ($users = mysqli_fetch_assoc($res))
{
	$buttonvalue = "0";
	$buttontext = "Desactiver";
	if ($users['isActive_user'] == 0)
	{
		$buttonvalue = "1";
		$buttontext = "Activer";
	}
	require('views/list_user.phtml');
	
}
?>