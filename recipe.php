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
<div class="main_content">
<?php 
if(isset($_GET['id'])){ ?>

<?php
    $id = (!empty($_GET['id'])) ? $_GET['id'] : "";
    include 'includes/db.php';
    $imageSource = "images/";
    $sql = "SELECT * FROM recipe Where id='".$id."'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $fullImageSource = $imageSource . $row['image'];
?>

    <div class="card">
      
      <h2><?php echo $row['name'];?></h2>
      <h5 style="margin:10px;"><?php echo $row['created_at'];?></h5>
      <img src="<?php echo $fullImageSource;?>">
      <div style="display:flex; flex-direction: row;">
      <div>
      <h5 style="margin:10px;">Ingredients:</h5>
      <ul style="margin:10px;">
      <?php 
        $ingredients = explode (",", $row['ingredients']); 
        foreach ($ingredients as $i) {
            echo '<li>';
            echo $i;
            echo '</li>';
        }
      ?>
      <ul>
    </div>
    <div>
    <h5 style="margin:10px;">Guide:</h5>
    <p><?php echo $row['directions'];?></p>
    </div>
    </div>
<?php
      }
    }
  }else{
      echo '<br /><p>Something went wrong!</p></br />';
  }
?>
  </div>
  </div>
</div>
   
   <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani &nbsp;<p><a href="www.facebook.com">CEO</a></p></div>
  </div>
</body>
</html>
