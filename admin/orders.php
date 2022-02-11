<?php
include 'auth.php';
include '../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>UndefinedXik</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
		<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<style>
		.coverart {
		  border-radius: 5px;
		  background-color: #2c3e50;
		  color:white;
		  padding: 20px;
		  margin-bottom:20px;
		}
		</style>
		<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
		</script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">undefinedxik</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="orders.php">Orders</a></li>
                    </ul>
                </div>
            </div>
        </nav>




        <!-- Portfolio Section-->
        <section class="page-section portfolio " id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
				<br />
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Admin</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
<div class="container">
 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <td>Full Name</td>
                <td>Address</td>
                <td>City</td>
                <td>State/Provice</td>
                <td>Zip Code</td>
                <td>Country</td>
				<td>Phone Number</td>
				<td>Date</td>
            </tr>
        </thead>
        <tbody>
							<?php
						$sql = "SELECT * FROM orders ORDER BY date DESC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						  // output data of each row
						  while($row = $result->fetch_assoc()) {
							  
							  $timeStamp = $row['date'];
							  $timeStamp = date( "F j, Y, g:i a", strtotime($timeStamp));


					?>
            <tr>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['city'];?></td>
                <td><?php echo $row['spr'];?></td>
                <td><?php echo $row['zpcode'];?></td>
                <td><?php echo $row['country'];?></td>
				<td><?php echo $row['number'];?></td>
				<td><?php echo $timeStamp;?></td>
            </tr>
						  <?php }
						}else{
						echo 'no orders yet';}
						?>
        </tbody>
        <tfoot>
            <tr>
                <td>Full Name</td>
                <td>Address</td>
                <td>City</td>
                <td>State/Provice</td>
                <td>Zip Code</td>
                <td>Country</td>
				<td>Phone Number</td>
				<td>Date</td>
            </tr>
        </tfoot>
    </table>
</div>




            </div>
        </section>




        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
