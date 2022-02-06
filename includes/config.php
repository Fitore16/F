<?php

		$servername = "localhost";
		$username = "undefinedxik";
		$password = "N25oo4205e457DE8";
		$dbname = "undefinedxik";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
?>