<?php
	@ $db = new mysqli( "localhost", "root", "", "dream-travel-v05");
	
	//create a query
	$query = "CREATE TABLE bookings_users
		(
			ID INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY (ID),
			booking_id INT(11),
			user_id INT(11)
		)";
	//send the query to the db and store the result
	$result = $db->query($query);	
?>