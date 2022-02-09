<?php
// Include db file
require_once "includes/db.php";
 
// Define variables and initialize with empty values
$fullName = $subject = $email = $message = "";
$inputErr = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if Full Name is empty
    if(empty(trim($_POST["fullName"]))){
        $inputErr = "Please enter your full name.";
    } else{
        $fullName = trim($_POST["fullName"]);
    }
	// Check if Full Name is empty
    if(empty(trim($_POST["subject"]))){
        $inputErr = "Please enter subject";
    } else{
        $subject = trim($_POST["subject"]);
    }
	// Check if Full Name is empty
    if(empty(trim($_POST["email"]))){
        $inputErr = "Please enter your email.";
    } else{
        $email = trim($_POST["email"]);
    }
	// Check if Full Name is empty
    if(empty(trim($_POST["message"]))){
        $inputErr = "Please enter your message.";
    } else{
        $message = trim($_POST["message"]);
    }

    
    // Validate credentials
    if(empty($inputErr)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO contact (fullName,subject,email,message) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss",$param_fullName, $param_subject, $param_email, $param_message);
            
            // Set parameters
            $param_fullName = $fullName;
			$param_subject = $subject;
			$param_email = $email;
			$param_message = $message;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
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
      <h1>Contact us</h1>
      <p>Fill the form below to send us a message!</p>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="yummyform">
   <br />
    <p style="color:#717177"><?php echo (!empty($inputErr)) ? $inputErr : ''; ?></p>
   <br />
            <div class="form-group">
                <label>Full Name <span>*</span></label>
                <input type="text" name="fullName" class="form-control" value="">
            </div>    
            <div class="form-group">
                <label>Subject <span>*</span></label>
                <input type="text" name="subject" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Email <span>*</span></label>
                <input type="email" name="email" class="form-control" value="">
            </div>
			<label>Message <span>*</span></label>
			<textarea rows="4" cols="50" name="message"></textarea>
			
			<div style="display:flex; flex-direction: row;">
            <input type='submit' class="clickable" value='Submit'>
			<input type='reset' class="clickable" value='Reset'>
			</div>
        </form>
      <p>&nbsp;</p>
      <p>Adresa : Ferizaj<br>
        Email : yummybite02e@gmail.com<br>Numri kontaktues : currently not available </p>

</div>
    </div>
    <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani&nbsp; | YummyBite 2021  <p><a href="www.facebook.com">CEO</a></p></div>
  </div>
  </div>
</body>
</html>
