<?php

include('config.php');
?>
<?php
	
	function displaySavedTrips($db)
	{
			// Shows all bookings by the current user (Useful for MyBookings)
	// >NEXT> change to show only the most recent. Add bookingDate field to Bookings 
	//and add condition to show the most recent
	$userID = $_SESSION['user_id'];
	
	$query= "SELECT trips.price, trips.tripID, trips.title, trips.startLocation, trips.finishLocation,
	trips.country, trips.departingDate, trips.finishingDate, trips.noOfDays, savedtrips.userID, savedtrips.ID, savedtrips.title
			FROM trips 
			INNER JOIN savedtrips ON trips.tripID=savedtrips.tripID
			WHERE savedtrips.userID= :userID";
	
	$params = array(
					'userID' => $userID
					);
	
	$result = $db->prepare($query);
	$result->execute($params);
	
	
		// create the table
		print("<h1>Saved trips</h1>
		<table border='3'>
		<tr>
			<td><p><b>Trip Price</p></td>
			<td><p><b>Trip Title</p></td>
			<td><p><b>Start location</p></td>
			<td><p><b>Finish location</p></td>
			<td><p><b>Country</p></td>		
			<td><p><b>Days</p></td>
			<td><p><b>User ID</p></td>
			<td><p><b>Unsave</p></td>
		</tr>");
		
		// add the rows to the table
		while($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			
			//add a row
			print ("<tr>");
			
			//print a cell
			print ("<td><p> £$row[price] </p></td>");
			print ("<td> <p><a href='trips.php?title=$row[title]'>$row[title]</a> </p></td>");	
			print ("<td> <p>$row[startLocation] </p></td>");
			print ("<td><p>$row[finishLocation]</p></td> ");
			print ("<td> <p>$row[country] </p></td>");
			print ("<td> <p>$row[noOfDays] </p></td>");
			print ("<td> <p>$row[userID] </p></td>");
			print ("<td>
				
						<form action=\"deleteSavedTripFromDB.php\" method=\"post\">
						<input type=\"hidden\" name=\"userID\" value=\"$row[userID]\" />
						<input type=\"hidden\" name=\"title\" value=\"$row[title]\" />
						<input type=\"submit\" name=\"Submit\" value = \"Unsave\" />
						</form>
			
					</td>");
			
			//close row
			print ("</tr>");       
		}  

		// close the table
		print("</table><br><br>");
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head><meta charset="utf-8">
		<title>Saved trips
		</title>
		<style type="text/css">
		
		header1 
			{
				font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; 
				text-shadow: 2px 2px #000000;
				color: white;
				display: block; 
				font-size: 2.5em; 
				margin-top: 0.67em; 
				margin-bottom: 0.67em; 
				margin-left: 0; 
				margin-right: 0; 
				font-weight: bold;
			}
		
		header2
			{
				font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; 
				text-shadow: 2px 2px #000000;
				color: white;
				display: block;
				margin-top: 1em;
				margin-bottom: 1em;
				margin-left: 0;
				margin-right: 0;
				font-size: 1em; 
			}		

		h1 { font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px; } 
		
		h2 { font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 19px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 20.9px; } 
		
		h3 { font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; } 
		
		p 
		{ 
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; 
			font-size: 14px; 
			font-style: normal; 
			font-variant: normal; 
			font-weight: 400; 
			line-height: 20px; 
			display: block;
			margin-top: 0.5em;
			margin-bottom: 0.5em;
			margin-left: 0;
			margin-right: 0;
		} 
		
		ul 
		{
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; 
			font-size: 14px; 
			font-style: normal; 
			font-variant: normal; 
			font-weight: 400; 
			line-height: 20px; 
			display: block;
			margin-top: 0.5em;
			margin-bottom: 0.5em;
			margin-left: 0;
			margin-right: 0;
		}

		
		blockquote { font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 21px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 30px; } 
		
		pre { font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px; }
		
		a:link 
		{
			color: #007FFF;
			text-decoration: none;
		}

		a:visited {
			color: #007FFF;
			text-decoration: none;
		}

		a:hover {
			color: #007FFF;
			text-decoration: none;
		}

		a:active {
			color: #007FFF;
			text-decoration: none;
		}
		
		#page-container {
		  position: relative;
		  min-height: 100vh;
		}
		#content-wrap {
		  padding-bottom: 2.5rem;    /* Footer height */
		}
		#footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  height: 6rem;            /* Footer height */
		}
		
				.dropbtn {
		  background-color: white;
		  color: #007FFF;
		  padding: 16px;
		  font-size: 16px;
		  border: none;
		  cursor: pointer;
		}

		.dropdown {
		  position: relative;
		  display: inline-block;
		}

		.dropdown-content {
		  display: none;
		  position: absolute;
		  right: 0;
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1;}
		.dropdown:hover .dropdown-content {display: block;}
		.dropdown:hover .dropbtn {background-color: white;}
		
		</style> 
   </head>
   <body>
	<div id="page-container">
   <div id="content-wrap">
<!-- Header - Multipurpose -->
	<?php
		include('header.php');
	?>
	
<!-- ‘Body’ section	-->
	<?php displaySavedTrips($db); ?>			
      </div>
<!-- Multipurpose footer (will appear across several pages)	-->
	<?php
		include('footer.php');
	?>
   <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '85d51488-95e8-4ee2-8e8c-fbdb21201440', f: true }); done = true; } }; })();</script>
	 </div>
	 </body>
</html>