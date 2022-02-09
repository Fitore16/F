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
<div class="main_content" style="display:flex; flex-direction: row;">

    <div class="Grid">
<?php
    $imageSource = "images/";
    include 'includes/db.php';
    $sql = "SELECT * FROM recipe where isHealthy=1 ORDER BY created_at DESC";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $directions = strlen($row['directions']) > 30 ? substr($row['directions'],0,30)."..." : $row['directions'];
        $fullImageSource = $imageSource . $row['image'];
      
      ?>
      <div class="blog_post">
        <figure><img src="<?php echo $fullImageSource;?>"></figure>
        <aside><?php echo ($row['isHealthy'] == 1) ? '<small>Healthy</small>' : ''; ?>
          <h3><?php echo $row['name'];?></h3>
          <p><?php echo $directions;?></p><a class="read_more" href="recipe.php?id=<?php echo $row['id'];?>"><i class="fa fa-long-arrow-right"></i></a>
        </aside>
      </div>
      <?php
      }
      } else {
      echo "0 results";
    }
    $link->close();
    ?>
        </div>
        <div class="sidebar">
        <h3>Latest Recipes </h3>
        <?php
          include 'includes/db.php';
          $sql = "SELECT * FROM recipe ORDER BY created_at DESC LIMIT 3";
          $result = $link->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
      ?>
        <p style="text-align:left;"><a href="recipe.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a> - <?php 
          echo $time = date("H:i",strtotime($row['created_at']));
        
        ?></p>
    <?php
      }
      } else {
      echo "0 results";
    }
    ?>
        <h3>Follow us on :</h3>
        <ul>
          <li><a href="http://www.google.com">Google.com</a></li>
          <li><a href="http://www.youtube.com">Youtube.com</a></li>
          <li><a href="http://www.facebook.com">Facebook.com</a></li>
          <li>&nbsp;</li>
        </ul>
      </div>
  </div>
        </div>
      </div>
   
   <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani &nbsp;<p><a href="www.facebook.com">CEO</a></p></div>
  </div>
</body>
</html>
