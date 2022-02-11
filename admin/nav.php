<?php
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
?>
	  <div id="menubar">
        <ul id="menu">
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="selected"' ?>><a href="index.php">Home</a></li>
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'recipes.php') echo 'class="selected"' ?>><a href="recipes.php">Recipes</a></li>
          <li <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="selected"' ?>><a href="contact.php">Contact</a></li>
          <li><a href="../logout.php">Log Out</a></li>
		</ul>
      </div>