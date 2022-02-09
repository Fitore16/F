<?php
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
	if(!isset($_SESSION['username'])){
		$ref="login.php";
	}else{
		$ref="account.php";
	}
?>
	  <div id="menubar">
        <ul id="menu">
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="selected"' ?>><a href="index.php">Home</a></li>
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'healthy.php') echo 'class="selected"' ?>><a href="healthy.php">Healthy</a></li>
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'recipes.php') echo 'class="selected"' ?>><a href="recipes.php">My Recipes</a></li>
		  <li <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="selected"' ?>><a href="about.php">About</a></li>
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="selected"' ?>><a href="contact.php">Contact</a></li>
		  <li <?php if (basename($_SERVER['PHP_SELF']) == 'account.php' || basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'register.php') echo 'class="selected"' ?>><a href="<?php echo $ref;?>">Account</a></li>
		</ul>
      </div>