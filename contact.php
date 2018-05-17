<?php include 'header.php'; ?>
<?php require_once('contactDAO.php'); 
require_once('WebsiteUser.php');
session_start();

$contactDAO = new contactDAO();
$hasError = false;    
$nameErr = $phoneErr = $emailErr = $referral = "";
$customerName = $phoneNumber = $emailAddress = $referrerErr = "";

if(isset($_POST['customerName'])||isset($_POST['phoneNumber'])||isset($_POST['emailAddress'])||isset($_POST['referrer'])){
    if(!isset($_SESSION['websiteUser'])){
					header('Location:userlogin.php');
    }

    if (empty($_POST["customerName"])){
    $hasError = true;
    $nameErr = 'Please enter a customer name.';
    }
    if (empty($_POST["phoneNumber"])){
    $hasError = true;
    $phoneErr = "Please enter a phone number.";
    }   
    if (empty($_POST["emailAddress"])){
    $hasError = true;
    $emailErr = "Please enter a email address.";
    }  
    if (empty($_POST["referral"])){
    $hasError = true;
    $referrerErr = "Please select an option.";
    } 
            
    if(!$hasError){					
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"files/" . basename($_FILES["fileToUpload"]["name"]) );
    $contact = new ContactInfo($_POST['customerName'], $_POST['phoneNumber'], password_hash($_POST['emailAddress'], PASSWORD_DEFAULT), $_POST['referral']);
    $addSuccess = $contactDAO->addContact($contact);	
	echo "<script> alert('". $addSuccess ."'); location.href='mailing_list.php'; </script>";   
	}
}
?>

<div id="content" class="clearfix">
        <aside>
            <h2>Mailing Address</h2>
            <h3>1385 Woodroffe Ave<br>
                Ottawa, ON K4C1A4</h3>
            <h2>Phone Number</h2>
            <h3>(613)727-4723</h3>
            <h2>Fax Number</h2>
            <h3>(613)555-1212</h3>
            <h2>Email Address</h2>
            <h3>info@wpeatery.com</h3>
        </aside>
    
    <div class="main">
            <h1>Sign up for our newsletter</h1>
            <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
            <form name="frmNewsletter" id="frmNewsletter" method="post" action="contact.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="customerName" id="customerName" size='40'></td>
                    <td><span class = "err" style= "color: #FF0000"><?php echo $nameErr;?></span></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phoneNumber" id="phoneNumber" size='40' placeholder="613-727-4723"></td>
                    <td><span class = "err" style= "color: #FF0000"><?php echo $phoneErr;?></span></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="text" name="emailAddress" id="emailAddress" size='40' placeholder="info@wpeatery.com"></td>
                    <td><span class = "err" style= "color: #FF0000"><?php echo $emailErr;?></span>
                </tr>
                <tr>
                    <td>How did you hear<br> about us?</td>
                    <td>Newspaper<input type="radio" name="referrer" id="referralNewspaper" value="newspaper">
                        Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                        TV<input type='radio' name='referral' id='referralTV' value='TV'>
                        Other<input type='radio' name='referral' id='referralOther' value='other'></td>
                    <td><span class = "err" style= "color: #FF0000"><?php echo $referrerErr;?></span>
                </tr>
                <tr>
                    <td>Choose a file to upload:<br> <input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>
                <tr>
                    <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                </tr>
            </table>
            </form>
    </div><!-- End Main -->
</div><!-- End Content -->

<?php include ("footer.php")?>