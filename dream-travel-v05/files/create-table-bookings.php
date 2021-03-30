<?php
	@ $db = new mysqli( "localhost", "root", "", "dream-travel-v05");
	
	//create a query
	$query = "CREATE TABLE Bookings
		(
			ID INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY (ID),
			bookingPrice INT(4),
			tripID INT(11)
		)";
	//send the query to the db and store the result
	$result = $db->query($query);	
?>