<?php include 'header.php';?>
<?php require_once('contactDAO.php'); 
require_once('WebsiteUser.php');
session_start();
if(!isset($_SESSION['websiteUser'])){
 	header('Location:userlogin.php');
}

echo 'Session AdminID = ' . $_SESSION['adminID'] . '<br>';
echo 'Last Login Date = ' . $_SESSION['lastLogin'] . '<br>';
echo 'Session ID = ' . session_id(). '<br>';

	
$contactDAO = new contactDAO();	
$contacts = $contactDAO->getContacts();
if($contacts){

	echo '<table border=\'1\' style="width: 100%">';
	echo '<tr><th>Customer</th><th>Phone</th><th>Email</th><th>Referrer</th></tr>';
	foreach($contacts as $contact){
		echo '<tr>';
		echo '<td style="width: 15%">' . $contact->getCustomerName() . '</td>';
		echo '<td style="width: 15%">' . $contact->getPhoneNumber() . '</td>';
		echo '<td style="width: 55%">' . $contact->getEmailAddress() . '</td>';
		echo '<td style="width: 15%">' . $contact->getReferral() . '</td>';
		echo '</tr>';
    }
		echo '</table>';	
	} 
?>

<form name="logout" id="logout" method="post" action="userlogout.php"; onclick="return confirm('Are you sure that you want to logout?')">
     <input type='submit' name='btnLogout' id='btnLogout' value='Log out'>
</form>

<?php include ("footer.php")?>
