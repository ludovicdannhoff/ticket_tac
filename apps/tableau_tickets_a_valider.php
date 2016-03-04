

 <?php 


$query = "SELECT * FROM tickets WHERE id_etat_tickets = 1";

$res = @mysqli_query($db, $query);

                                          
while ($ticket = mysqli_fetch_assoc($res)){

require ('views/tableau_tickets_a_valider.phtml');
}





?>