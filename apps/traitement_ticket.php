<?php

	if(isset($_POST['titreTicket'],$_POST['contentTicket'],$_POST['prioriteTicket']))
	{
		$titre = $_POST['titreTicket'];
		$content = $_POST['contentTicket'];
		$priorite = $_POST['prioriteTicket'];
		$etat = $_POST['etatTicket'];
		$pj = $_POST['pjTicket'];
		$deadline = $_POST['deadlineTicket'];
		$titre = mysqli_real_escape_string($db, $titre);		
		$content = mysqli_real_escape_string($db, $content);		
		$priorite = mysqli_real_escape_string($db, $priorite);		
		$etat = mysqli_real_escape_string($db, $etat);		
		$pj = mysqli_real_escape_string($db, $pj);
		$query = "INSERT INTO tickets (titre_tickets, content_tickets, id_priorite, pj_tickets, id_etat_tickets, deadline_tickets) VALUES('".$titre."', '".$content."', '".$priorite."', '".$pj."', '".$etat."', '".$deadline."')";
		$res = mysqli_query($db, $query);
			if ($res === false)
			{
				$error = "Erreur interne au serveur";
			}
			else
			{
				exit;
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
							header('Location: index.php');
							exit;
						}
					}
				}
			}
		}
	}
?>