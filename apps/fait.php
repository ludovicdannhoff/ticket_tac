<?php
$query = "SELECT * FROM tickets where id_etat_tickets = '4'";// On déclare une variable qui contiendra notre requête SQL
$result = mysqli_query($db, $query);// On exécute notre requête SQL
$number = 1;
while ($tickets = mysqli_fetch_assoc($result))// On récupère les résultats de notre requête un par un
{
	$id = $tickets['id_tickets'];
	$date = $tickets['date_creation_tickets'];
	$title = $tickets['titre_tickets'];
	$content = $tickets['content_tickets'];
	$deadline = $tickets['deadline_tickets'];
	/* ##PASCAL ~> Vous avez la variable $ticket(s) servez-vous en ! */
	$number++;
	require('views/ticket.phtml');
}
?>