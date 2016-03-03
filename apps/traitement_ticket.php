<?php
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	// Récupération de l'action Create Ticket
	if ($action == 'create_ticket')
	{
		if(isset($_POST['titreTicket'],$_POST['contentTicket'],$_POST['prioriteTicket'],$_POST['etatTicket'],$_POST['deadlineTicket']))
		{
			$titre = $_POST['titreTicket'];
			$content = $_POST['contentTicket'];
			$priorite = $_POST['prioriteTicket'];
			$etat = $_POST['etatTicket'];
			$pj = $_POST['pjTicket'];
			$deadline = $_POST['deadlineTicket'];
			// Securisation des variables
			$titre = mysqli_real_escape_string($db, $titre);		
			$content = mysqli_real_escape_string($db, $content);		
			$priorite = mysqli_real_escape_string($db, $priorite);		
			$etat = mysqli_real_escape_string($db, $etat);		
			$pj = mysqli_real_escape_string($db, $pj);
			// Insertion des différentes valeurs dans la table tickets
			$query = "INSERT INTO tickets (titre_tickets, content_tickets, id_priorite, pj_tickets, id_etat_tickets, deadline_tickets) VALUES('".$titre."', '".$content."', '".$priorite."', '".$pj."', '".$etat."', '".$deadline."')";
			$res = mysqli_query($db, $query);
				if ($res === false)
				{
					$error = "Erreur interne au serveur";
				}
				else
				{
					header('Location: home');
					exit;
				}
		}
	}
}
	if (isset($_POST['action']))
	{
		$action = $_POST['action'];
		if ($action == 'change_state')
		{
			if(isset($_POST['id']))
			{
				$id = $_POST['id'];
				/* ##PASCAL ~> Si c'est un id, pas besoin de mysqli_real_escape_string, vous pouvez utiliser intval plutôt (plus rapide) */
				$idVerif = mysqli_real_escape_string($db, $id);
				$query = "SELECT id_etat_tickets FROM tickets WHERE id_tickets ='".$idVerif."'";
				$res = mysqli_query($db, $query);
				if ($res === false)
				{
					$error = "Erreur";
				}
				else
				{
					$etatTicket = mysqli_fetch_assoc($res);
					/* ##PASCAL ~> Vérifiez que $etatTicket existe ! */
					$etatTicketVerif = $etatTicket['id_etat_tickets'];
					if ($etatTicketVerif >= 0 && $etatTicketVerif < 3)
					{
						$etatTicketVerif++;
						$query = "UPDATE tickets SET id_etat_tickets = '".$etatTicketVerif."' WHERE id_tickets = '".$idVerif."'";
						$res = mysqli_query($db, $query);
						if ($res === false)
						{
							$error = "Erreur";
						}
						else
						{
							header('Location: home');
							exit;
						}
					}
				}
			}
		}
	}
?>