<?php
	@ $db = new mysqli( "localhost", "root", "", "dream-travel-v05");
	
	//create a query
	$query = "CREATE TABLE Users
		(
			ID INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY (ID),
			name varchar(30),
			email varchar(30),
			username varchar(15),
			encrypt_pass char(255)
		)";
	//send the query to the db and store the result
	$result = $db->query($query);	
?>