<?php
	@ $db = new mysqli( "localhost", "root", "", "dream-travel-v05");
	
	//create a query
	$query = "CREATE TABLE Trips
		(
			tripID INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY (tripID),
			price INT(3),
			title varchar(30),
			startLocation varchar(15),
			finishLocation varchar(15),
			country varchar(15),
			departingDate varchar(15),
			finishingDate varchar(15),
			noOfDays INT(2),
			placesLeft INT(2)
		)";
	//send the query to the db and store the result
	$result = $db->query($query);	
?>