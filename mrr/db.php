<?php

function dbconnection(){
	
		$servername = "localhost";
		$username = "root";
		$password = "s@group9";
        $db = "ost";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password,$db);

		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 
		return $conn;
}

		?>