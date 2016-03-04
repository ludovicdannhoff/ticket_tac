<?php
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_GET);
// var_dump($_POST);
// exit;

// SESSION
session_start();
/* ##PASCAL ~> Pour afficher la liste des fichiers contenant un commentaire, entrez la ligne de commande suivante dans votre terminal : grep -R "##PASCAL" | awk -F ":" '{print $1}' | uniq */
/* ##PASCAL ~> Dans vos phtml vous n'avez pas oublié de htmlentities, mais je vous donne une ligne de commande utile : grep "\\$" views/* | grep -v htmlentities | grep "\\$" */

/* ##PASCAL ~> Dans l'idéal les informations de connexion à la db se trouvent dans un fichier dédié, genre config.php qui est ensuite require */
// DATABASE
//$domaine = 'localhost';
// $domaine = '192.168.1.31';
// $domaine = 'mysql51-71.pro';
// $db = @mysqli_connect("192.168.1.17", "3wa", "troiswa", "ticket_tac");
$db = @mysqli_connect("localhost", "root", "troiswa", "ticket_tac");
// $db = @mysqli_connect("localhost", "root", "", "ticket_tac");
if (!$db)
	// var_dump($db);
	// exit;
	require('apps/offline.php');

// SECURISATION DE LA VARIABLE PAGE -> $page
$page = "home";
$access_page = ['home'];
$access_page_log = ['account', 'admin', 'edit_user', 'home_login' ];

if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access_page))
	{
		$page = $_GET['page'];
	} elseif (isset($_SESSION['id'])) {
		if (in_array($_GET['page'], $access_page_log))
		{
			$page = $_GET['page'];
		}
	}
	else
	{
		 ##PASCAL ~> Au lieu de mettre l'index.php dans vos redirections vous pouvez mettre votre page par défaut, c'est plus propre : home 
		header('Location: home');
		exit;
	}
}

/* ##PASCAL ~> La variable action doit être vérifié directement dans le fichier de traitement qui va bien, pas dans l'index */
// SECURISATION DE LA VARIABLE ACTION -> $action

// $access_action = ['edit_secure', 'edit_user', 'login', 'logout', 'register', 'create_ticket','change_state'];



// SECURISATION DES FICHIERS DE TRAITEMENTS
// $traitements_page = [
// 	'account'=>'user',
// 	'list_user'=>'user',
// ];
$traitements_action = [
	'login'=>'user',
	'logout'=>'user',
	'register'=>'user',
	'edit_secure'=>'user',
	'edit_user'=>'user',
	'change_state'=>'ticket',
	'create_ticket'=>'ticket',
	'admin'=>'admin'
];

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if (isset($traitements_action[$action])) {
		$value = $traitements_action[$action];
		require('apps/traitement_'.$value.'.php');
	} else {
		header('Location: home');
		exit;
	}

}


// SKEL
require('apps/skel.php');
/* ##PASCAL ~> Dafuk ? Pourquoi require le traitement au dessus et le refaire ici ? APRES le skel ? aucun intéret, a virer ASAP */

// require('apps/traitement_ticket.php');
?>