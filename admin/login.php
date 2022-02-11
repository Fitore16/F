<?php
require '../includes/db.php';

if (isset($_POST['submit'])) {
	// Could not get the data that should have been sent.


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM admin WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		
		header('Location: index.php');
		
	} else {
		// Incorrect password
		echo 'Incorrect username and/or password!';
	}
	} else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
}

	$stmt->close();
}

	
}


?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <body class="bg">
        <div class="container-fluid vh-100 " style="margin-top:300px">
            <div class="" style="margin-top:200px">
                <div class="rounded d-flex justify-content-center  ">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-primary">
                        <div class="text-center">
                            <h3 class="text-dark">Sign In</h3>
                        </div>
                        <form action="login.php" method="post">
                            <div class="p-4">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text bg-dark"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-dark"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                
                                <input class="btn btn-dark text-center mt-2 " name="submit" type="submit" value="Login">
                            
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>