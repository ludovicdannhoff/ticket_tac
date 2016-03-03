<?php
 // DEBUG
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_POST);
// var_dump($_GET);
// exit;
// Etape 1
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'login')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['password']))
		{
			// Etape 2
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			// Etape 3
			if (empty($login))
				$error = "Login vide";
			else if (empty($password))
				$error = "Password vide";
			else
			{
				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$query = "SELECT * FROM users WHERE login_user='".$login."'";
				$res = mysqli_query($db, $query);
				if ($res)
				{
					$user = mysqli_fetch_assoc($res);
					if ($user)
					{
						if (password_verify($password, $user['password_user']))
						{
							// Etape 5
							$_SESSION['id'] = $user['id_user'];
							$_SESSION['login'] = $user['login_user'];
							$_SESSION['role'] = $user['role_user'];
							$valid = "Vous êtes connecté !!!";
							// header('Location: home');
							// exit;
						}
						else
							$error = "Mot de passe incorrect";

					}
					else
						$error = "Login incorrect";
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
	}
	else if ($action == 'register')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['password1'], $_POST['password2'], $_POST['email'], $_POST['phone'], $_POST['employment'], $_POST['first_name'], $_POST['last_name']))
		{
// var_dump($_POST);
			// Etape 2
			$login = $_POST['login'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$employment = $_POST['employment'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			// Etape 3
			if (strlen($login) < 3)
				$error = "Login trop court (< 3)";
			else if (strlen($login) > 31)
				$error = "Login trop long (> 31)";
			else if (strlen($password1) < 6)
				$error = "Password trop court (< 6)";
			else if ($password1 !== $password2)
				$error = "Les mots de passe ne correspondent pas";
			else
			{
				$password = $password1;
				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
				$password = mysqli_real_escape_string($db, $password);

				$query = "INSERT INTO users (login_user, password_user, email_user, phone_user, first_name_user, last_name_user, employment_user) VALUES('".$login."', '".$password."', '".$email."', '".$phone."', '".$first_name."', '".$last_name."', '".$employment."')";
				$res = mysqli_query($db, $query);
				var_dump(mysqli_error($db));
				if ($res)

				{
					// Etape 5
					$_SESSION['id'] = mysqli_insert_id($db);
					$_SESSION['login'] = $login;
					$_SESSION['role'] = 'user';
					$valid = "Votre compte est crée !!!";
					// header('Location: home');
					// exit;
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
	}

	else if ($action == 'edit_user')
	{
		// Etape 1
		if (isset($_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['last_name'], $_POST['employment']))
		{
			// Etape 2
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$employment = $_POST['employment'];

			// Etape 3
			// if (strlen($login) < 3)
			// 	$error = "Login trop court (< 3)";
			// else if (strlen($login) > 31)
			// 	$error = "Login trop long (> 31)";
			// else
			{
				// Etape 4

				$query = "UPDATE users SET email_user='".$email."', phone_user='".$phone."', first_name_user='".$first_name."', last_name_user='".$last_name."', employment_user='".$employment."' WHERE id_user='".$_SESSION['id']."'";

				$res = mysqli_query($db, $query);
				if ($res)
				{
					// Etape 5
					$valid = "Profil modifié !!!";
					// header('Location: account');
					// exit;
				}
				else
					$error = "Erreur interne au serveur";
			}
		}
	}

	else if ($action == 'edit_secure')
	{
		// Etape 1
		if (isset($_POST['login'], $_POST['old_password'], $_POST['new_password'], $_POST['new_password_repeat']))
		{
			// var_dump($_POST);

			// Etape 2
			$login = $_POST['login'];
			$old_password = $_POST['old_password'];
			$new_password = $_POST['new_password'];
			$new_password_repeat = $_POST['new_password_repeat'];

			
			if ($new_password !== $new_password_repeat)
			{
				$error = "Les mots de passe ne correspondent pas";
			}			

			// Etape 3
			// else if (strlen($login) < 3)
			// 	$error = "Login trop court (< 3)";
			// else (strlen($login) > 31)
			// 	$error = "Login trop long (> 31)";

			$query = "SELECT * FROM users WHERE id_user='".$_SESSION['id']."'";
			$res = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($res);


			if (password_verify($old_password, $user['password_user']))
			{

				// Etape 4
				$login = mysqli_real_escape_string($db, $login);
				$password = password_hash($new_password, PASSWORD_BCRYPT, ['cost'=>12]);
				$password = mysqli_real_escape_string($db, $password);

				$query = "UPDATE users SET login_user='".$login."', password_user='".$password."' WHERE id_user='".$_SESSION['id']."'";
				// var_dump($query);die;
				$res = mysqli_query($db, $query);
				if ($res)
				{
					// Etape 5
					$valid = "Paramètres de sécurité modifiés !!!";
					// header('Location: account');
					// exit;
				}
				else
					$error = "Erreur interne au serveur";

			}
			else
				$error = "Les mots de passe ne correspondent pas";
			
		}
	}

	else if ($action == 'logout'){
		session_destroy();
		$_SESSION = array();
		header('Location: home');
		exit;
	}
	else
		$error = "Erreur interne (filou détecté !!!)";
}

?>
