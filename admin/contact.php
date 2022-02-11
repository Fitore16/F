<?php
include 'auth.php';
include("../includes/db.php");
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>YummyBite-Admin</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="/style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php"><span class="logo_colour"><font color="#000000">Yummy</font>Bite</span></a></h1>
          <h2>Dashboard</h2>
        </div>
      </div>
	<?php
	include 'nav.php';
	?>

    </div>
    <div id="site_content">
        <div id="content">
        <div class="main_content">
          <!-- fullName	subject	email	message	created_at -->
          <table>
            <tr>
              <th>Name</th>
              <th>Subject</th>
              <th>Email</th>
              <th>Message</th>
              <th>Time</th>
            </tr>
            <?php
                $sql = "SELECT * FROM contact ORDER BY created_at DESC";
                $result = $link->query($sql);
            
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['fullName'];?></td>
              <td><?php echo $row['subject'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['message'];?></td>
              <td><?php echo $row['created_at'];?></td>
            </tr>
            <?php
                  }
                }else{
                  echo '<p>No results</p>';
                }
            ?>
          </table>
          </div>
        </div>
    </div>
   
   <div id="footer"> Krijuar nga :&nbsp; Albesa Halili & Fitore Ramadani &nbsp;<p><a href="www.facebook.com">CEO</a></p></div>
  </div>
</body>
</html>
