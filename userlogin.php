<?php include ("header.php") ?>
<?php require_once('contactDAO.php');

    require_once('WebsiteUser.php');
    session_start();
    if(isset($_SESSION['websiteUser'])){
        if($_SESSION['websiteUser']->isAuthenticated()){
            session_write_close();
            header('Location:mailing_list.php');
        }
    }
    $missingFields = false;
    if(isset($_POST['submit'])){
        if(isset($_POST['username']) && isset($_POST['password'])){
            if($_POST['username'] == "" || $_POST['password'] == ""){
                $missingFields = true;
            } else {
                //All fields set, fields have a value
                $websiteUser = new WebsiteUser();
                if(!$websiteUser->hasDbError()){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $websiteUser->authenticate($username, $password);
                    if($websiteUser->isAuthenticated()){
                        $_SESSION['websiteUser'] = $websiteUser;
						$_SESSION['adminID'] = $websiteUser->getAdminID();
						$_SESSION['lastLogin'] = $websiteUser->getLastlogin();
                        header('Location:mailing_list.php');
                    }
                }
            }
        }
    }

    if ($missingFields){
    echo 'Please enter your username and password';
    }

    if (isset($websiteUser)){
        if(!$websiteUser->isAuthenticated()){
        echo 'Login failed.';
        }
    }
?>

<form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Login"></td>
                <td></td>
            </tr>
        </table>
    
</form>

<?php include ("footer.php")?>