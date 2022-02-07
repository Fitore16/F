<?php

 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include db file
require_once "includes/db.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$inputErr = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $inputErr = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $inputErr = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($inputErr)){
        // Prepare a select statement
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
							$_SESSION["role"] = $role;
							
							$destination = ($role === 'admin') ? 'admin/index.php' : 'index.php';
                            
                            // Redirect user to main page
                            header("location: $destination");
                        } else{
                            // Password is not valid, display a generic error message
                            $inputErr = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $inputErr = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
			<div style="display:flex; flex-direction: row;">
            <input type='submit' class="clickable" value='Submit'>
			<input type='reset' class="clickable" value='Reset'>
			</div>
			<br /><br />
            <p style="color:#6f6f77">Don't have an account? <a href="register.php">Register here</a>.</p>
        </form>
		</div>
			      <p>&nbsp;</p>
		        <p>&nbsp;</p>
		        <p>&nbsp;</p>
    </div>

    <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani&nbsp; | YummyBite 2021  <p><a href="www.facebook.com">CEO</a></p></div>
  </div>
  </div>
</body>
</html>