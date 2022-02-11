<?php
include 'auth.php';
include("../includes/db.php");
$message = "";
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM recipe WHERE id='".$id."'";
  if(mysqli_query($link, $delete)){
    $message = "Deleted";
  }
}
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
            <p><?php if(!empty($message)){ echo $message; }?></p>
          <table>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Date added</th>
              <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM recipe ORDER BY created_at DESC";
                $result = $link->query($sql);
            
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['created_at'];?></td>
              <td><a class="button" href="?delete=<?php echo $row['id'];?>">Delete</a></td>
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
