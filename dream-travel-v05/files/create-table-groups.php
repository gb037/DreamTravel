<?php
	@ $db = new mysqli( "localhost", "root", "", "dream-travel-v05");
	
	//create a query
	$query = "CREATE TABLE Groups
		(
			ID INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY (ID),
			name varchar(30)
		)";
	//send the query to the db and store the result
	$result = $db->query($query);	
?>