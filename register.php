<?php
require_once "includes/db.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$inputErr = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $inputErr = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $inputErr = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $inputErr = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $inputErr = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $inputErr = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $inputErr = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($inputErr) && ($password != $confirm_password)){
            $inputErr = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($inputErr)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'user')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: account.php");
            } else{
                $inputErr = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
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
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="yummyform">
   <br />
    <p style="color:#717177"><?php echo (!empty($inputErr)) ? $inputErr : ''; ?></p>
   <br />
            <div class="form-group">
                <label>Username <span>*</span></label>
                <input type="text" name="username" class="form-control" value="">
            </div>    
            <div class="form-group">
                <label>Password <span>*</span></label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Confirm Password <span>*</span></label>
                <input type="password" name="confirm_password" class="form-control" value="">
            </div>
			
			<div style="display:flex; flex-direction: row;">
            <input type='submit' class="clickable" value='Submit'>
			<input type='reset' class="clickable" value='Reset'>
			</div>
			<br /><br />
            <p style="color:#6f6f77">Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
      <p>&nbsp;</p>
		</div>
    </div>
    <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani&nbsp; | YummyBite 2021  <p><a href="www.facebook.com">CEO</a></p></div>
  </div>
  </div>
</body>
</html>