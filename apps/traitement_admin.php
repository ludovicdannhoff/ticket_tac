<?php
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'activer_user')
	{
		if (isset($_POST['isActive']))
		{
			$activer = intval($_POST['isActive']);
			$id_user = intval($_POST['userid']);
			$query = "UPDATE users SET isActive_user=".$activer." WHERE id_user='".$id_user."'";
			$result = mysqli_query($db, $query);
			if ($result === false)
				$error = "Erreur interne au serveur";
			else
			{

				header('Location: admin');
				exit;
			}
		}
	}
}
?>