<?php
// Include db file
require_once "includes/db.php";
 
 if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: login.php");
    exit;
}

// Define variables and initialize with empty values
$password = $cpassword = "";
$inputErr = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $inputErr = "Please enter password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Check if confirmed password is empty
    if(empty(trim($_POST["cpassword"]))){
        $inputErr = "Please confirm your password.";
    } else{
        $cpassword = trim($_POST["cpassword"]);
    }
	if((trim($_POST["password"])) != (trim($_POST["cpassword"]))){
		$inputErr = "Passwords do not match";
	}
    
    // Validate credentials
    if(empty($inputErr)){
        
        // Prepare an insert statement
        $sql = "Update users set password = ? Where username = ?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$param_password, $param_username,);
            
            // Set parameters
            $param_username = $_SESSION['username'];
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location: account.php");
            } else{
                $inputErr = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    // Close connection
    mysqli_close($link);
}
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>YummyBite-Best Food Experience</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php"><span class="logo_colour"><font color="#000000">Yummy</font>Bite</span></a></h1>
          <h2>The foodie place</h2>
        </div>
      </div>
	<?php
	include 'nav.php';
	?>
    </div>
    <div id="site_content">
<div id="content">
<p>Welcome <u><i><?php echo $_SESSION['username'];?></u></i><span style="float:right;"><a href="logout.php">Logout</a></span></p>
    
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="yummyform">
   
   <h4>Change password</h4>
    <p style="color:#717177"><?php echo (!empty($message)) ? $message : ''; ?></p>
    <p style="color:#717177"><?php echo (!empty($inputErr)) ? $inputErr : ''; ?></p>
            <div class="form-group">
                <label>Password <span>*</span></label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Confirm Password <span>*</span></label>
                <input type="password" name="cpassword" class="form-control" value="">
            </div>
			
			<div style="display:flex; flex-direction: row;">
            <input type='submit' class="clickable" value='Submit'>
			<input type='reset' class="clickable" value='Reset'>
			</div>
			<br /><br />
        </form>
	  <p>&nbsp;</p>
</div>
    </div>
    <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani&nbsp; | YummyBite 2021  <p><a href="www.facebook.com">CEO</a></p></div>
  </div>
  </div>
</body>
</html>
