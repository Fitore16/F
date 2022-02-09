<?php
include("includes/db.php");


if(isset($_POST['addRecipe'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $err = "";
  $success = "";

  $recipeName = $_POST['recipeName'];
  $readyIn = $_POST['readyIn'];
  $ingredients = $_POST['ingredients'];
  $notes = $_POST['notes'];
  $isHealthy = $_POST['isHealthy'];
  $addedBy = $_SESSION['username'];

  if(empty($recipeName) || empty($readyIn) || empty($ingredients) || empty($notes)){
    $err = "Information missing";
  }

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) && empty($err)){
     // Upload file
     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
      $insert = "INSERT into recipe(name,ingredients,directions,readyIn,addedBy,image,isHealthy) 
      values('$recipeName','$ingredients','$notes','$readyIn','$addedBy','$name','$isHealthy')";
      if(mysqli_query($link, $insert)){
        $success = "Recipe added";
      }
      else{
        echo 'Error: '.mysqli_error($link);
      }
     }

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
    <?php if(!empty($_SESSION['username'])){?>
<div class="main_content" style="display:flex; flex-direction: row;">
<div style="width:50%;">
<h4>My Recipes</h4><br />
<ul>
<?php
    $addedBy = $_SESSION['username'];
    $sql = "SELECT * FROM recipe where addedBy='".$addedBy."'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      
      ?>
      <li>
          <a class="read_more" href="recipe.php?id=<?php echo $row['id'];?>"><i class="fa fa-long-arrow-right"></i></a>
          <?php echo $row['name'];?>
      </li>
      <?php
      }
      } else {
      echo "0 results";
    }
    $link->close();
    ?>
    </ul>
</div>
	      <div class="sidebar" style="width:50%;">
        <h3>Add Recipe </h3>
        <form method="post" action="" enctype='multipart/form-data' id="smallform">
        <div class="form-group">
                <label>Recipe Name <span>*</span></label>
                <input type="text" name="recipeName" class="form-control" value="">
            </div>    
            <div class="form-group">
                <label>Ready In (minutes) <span>*</span></label>
                <input type="number" name="readyIn" class="form-control" value="">
            </div>

            <div class="form-group">
                <label>is healthy <span>*</span></label>
                <select name="isHealthy">
                  <option value="">--- Choose an option ---</option>
                  <option value="1">Yes</option>
                  <option value="">No</option>
                </select>
            </div>

            <label>ingredients (separated by a comma) <span>*</span></label>
            <textarea rows="4" cols="50" name="ingredients"></textarea>
            <label>Notes <span>*</span></label>
            <textarea rows="4" cols="50" name="notes"></textarea>
            
            <input type='file' name='file' />
          <div style="display:flex; flex-direction: row;">
            <input type='submit' class="clickable" value='Add Recipe' name='addRecipe'>
            <input type='reset' class="clickable" value='Reset'>
            </div>
        </form>
      </div>
  </div>
  <?php
  }else{
      echo '<br /><p>You need to log in to use this feature</p></br />';
  }
  ?>
        </div>
      </div>
   
   <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani &nbsp;<p><a href="www.facebook.com">CEO</a></p></div>
  </div>
</body>
</html>
