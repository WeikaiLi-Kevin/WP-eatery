<?php
require_once('abstractDAO.php');
require_once('contactInfo.php');

class contactDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function addContact($contact){

        if(!$this->mysqli->connect_errno){
          $query = 'INSERT INTO mailinglist (customerName, phoneNumber, emailAddress, referrer) VALUES (?,?,?,?)';
            $stmt = $this->mysqli->prepare($query);
            
            $customerName = $contact->getCustomerName(); 
			$phoneNumber = $contact->getPhoneNumber();
            $emailAddress = $contact->getEmailAddress();	
            $referral = $contact->getReferral();			
            $stmt->bind_param('ssss',			        
         			$customerName, 
                    $phoneNumber, 
                    $emailAddress,
					$referral);

            $stmt->execute();

            if($stmt->error){
                return $stmt->error;
            } else {
                return $contact->getCustomerName() . ' added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }   

    public function getContacts(){

        $result = $this->mysqli->query('SELECT * FROM mailinglist');
        $contacts = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                $contact = new ContactInfo($row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer']);
                $contacts[] = $contact;
            }
            $result->free();
            return $contacts;
        }
        $result->free();
        return false;
    }	
  
}

?>
