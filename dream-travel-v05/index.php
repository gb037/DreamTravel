<?php

include('files/config.php');
?>

<?php 

	function displayGrid($db) {
	    // create a query
        $query = "SELECT * FROM Trips 
			WHERE placesLeft > 0 && departingDate >= CURRENT_DATE() GROUP BY(title) ORDER BY tripID DESC";
        
		$result = $db->prepare($query);
		$result->execute(array($query));
		
		print("<table border='0' style='width:100%'>");
		
		// add the rows to the table
		//two more fetches within the while loop, that would get the second and third cell.
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {

			//add a row
		print ("
											<tr style='height:200px'>
												<td>
													<table style='width:100%'>
														<tr>
															<td>");	
															
															if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("<img src='files/$row[thumbnail].jpg' alt='$row[title]' style='width:100%'>
																</a>
															</td>
														</tr>
													</table>
													<table style='width:100%'>
														<tr>
															<td valign='top' style='width:20px;'>");
															if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("<p>£$row[price]</p></a></td>
															<td style='width:180px;'>
																<p>");
															if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("$row[title]
																	</a>
																	<br>
																	<tags class='uppercase'>$row[terrain], $row[distance]KM, $row[ascent]M, $row[noOfDays] DAYS</tags>
																</p>
																
															</td>
														</tr>
													</table>
												</td>
												<td style='width:10px;'>
												</td>
												<td>
													<table style='width:100%'>
														<tr>
															<td>"); 
															
															

															//if there's more content, load it
																if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
																	print ("");
																	

																		if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("<img src='files/$row[thumbnail].jpg' alt='$row[title]' style='width:100%'>
																</a>
															</td>
														</tr>
													</table>
													<table style='width:100%'>
														<tr>
															<td valign='top' style='width:20px;'>");
															if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("<p>£$row[price]</p></a></td>
															<td style='width:180px;'>
																<p>");
															if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("$row[title]
																	</a>
																	<br>
																	<tags class='uppercase'>$row[terrain], $row[distance]KM, $row[ascent]M, $row[noOfDays] DAYS</tags>
																</p>
																	
																	
																	
																	
																	");
																}
															print("</td>
														</tr>
													</table>
												</td>
												<td style='width:10px;'>
												</td>
												<td>
													<table style='width:100%'>
														<tr>
															<td>"); 
															//if there's more content, load it
																if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
																	print ("");
																	

																		if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("<img src='files/$row[thumbnail].jpg' alt='$row[title]' style='width:100%'>
																</a>
															</td>
														</tr>
													</table>
													<table style='width:100%'>
														<tr>
															<td valign='top' style='width:20px;'>");
															if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("<p>£$row[price]</p></a></td>
															<td style='width:180px;'>
																<p>");
															if (isset($_SESSION['user_id']) ) {
																print("<a href='files/trips.php?title=$row[title]'>");
															}
															else {
																print("<a href='files/login.php'>");														
															}
															print("$row[title]
																	</a>
																	<br>
																	<tags class='uppercase'>$row[terrain], $row[distance]KM, $row[ascent]M, $row[noOfDays] DAYS</tags>
																</p>
																	");
																}
															print("</td>
														</tr>
													</table>
												</td>
											</tr>
					");	
		}
		
		//close table
		print ("</table>");
		
	}


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head><meta charset="utf-8">
		<title>DreamTravel</title>
		<style type="text/css">
		table.home-table 
			{ 
				background: url("files/vista.jpg") no-repeat; 
			} 
		
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
			margin-top: 0em;
			margin-bottom: 0em;
			margin-left: 0;
			margin-right: 0;
		}

		tags 
		{ 
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; 
			font-size: 10px; 
			font-style: normal; 
			font-variant: normal; 
			font-weight: 400; 
			line-height: 20px; 
			display: block;
			margin-top: 0em;
			margin-bottom: 0em;
			margin-left: 0;
			margin-right: 0;
		} 		
		
		.uppercase {
			text-transform: uppercase;
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
		
		</style> 
   </head>
   <body>
          <div id="page-container">
   <div id="content-wrap">
<!-- Header - Multipurpose - Home and Payment Pages -->
	<?php
		include('files/headerHome.php');
	?>
	
<!-- Home Page Unique Header (will only appear on Home Page)-->
	<table border="0" style="width:100%" class="home-table">

		<tr style="height:350px">
			<td>

				<table border="0" style="width:100%">
					<tr style="height:15px;">
					</tr>
					<tr>
						<td align="center" ><header1>SWAP RUSH HOUR FOR ADRENALINE RUSH</header1></td>
					</tr>
				</table>
							<!--
				<table border="0"style="width:100%">
					<tr>
						<td style="width:20%"></td>
						<td align="center" style="width:30%"><input type="text" style="width:99%" placeholder="All active adventures"></td>
						<td align="center" style="width:30%;"><input type="text" style="width:99%;" placeholder="Anywhere..."></td>
						<td align="left" style="width:5%;"><button type="button" onclick="alert('Coming Soon')">Search</button></td>
						<td style="width:15%"></td>
					</tr>
				</table>
				<table border="0"style="width:100%">
					<tr style="height:100px;">
						<td style="width:20%"></td>
						<td style="width:10%"></td>
						<td style="width:10%"></td>
						<td style="width:10%; text-align:center">
							<br><br>
							<a href="/dream-travel-v03/sea.htm">
								<img src="/dream-travel-v03/images/icon-rowboat.png" alt="Sea" style="width:100%">
								<br><p>Sea</p>
							</a>
						</td>
						<td style="width:10%; text-align:center">
							<br><br>
							<a href="/dream-travel-v03/mountains.htm">
								<img src="/dream-travel-v03/images/icon-mountaineering.png" alt="Mountain" style="width:100%">
								<p>Mountains</p>
							</a>
						</td>
						<td style="width:10%"></td>
						<td style="width:10%"></td>
						<td style="width:20%"></td>
					</tr>
					<tr style="height:15px;">
					</tr>
				</table>
			-->
			</td>
		</tr>			
	</table>			
<!-- Home Page Body-->

	<table border='0' style='width:100%'>
		<tr>
			<td align='center' style='width:20px;'></td>
			<td align='center' >
				<table border='0'style='width:100%'>
					<tr style='height:50px;'>
						<td style='text-align:center'><h3><font size='+1'>LATEST EXPERIENCES</font></h3></td>
					</tr>
				</table>
				<table border='0' style='width:100%'>
					<?php displayGrid($db); ?>
				</table>
			</td>
			<td align='center' style='width:20px;'></td>
		</tr>
	</table>
<br><br><br><br>
		</div>		
<!-- Multipurpose footer (will appear across several pages)	-->
	<?php
	include('files/footerHome.php');
	?>
	
	<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '85d51488-95e8-4ee2-8e8c-fbdb21201440', f: true }); done = true; } }; })();</script>
   </div>
   </body>
</html>