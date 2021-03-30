<?php

include('config.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head><meta charset="utf-8">
		<title>Customer area
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
	<h1>Customer area</h1>
			<p><a href="upcomingBookings.php">Upcoming bookings</a></p>
			<p><a href="pastBookings.php">Past bookings</a></p>
			<p><a href="savedTrips.php">Saved trips</a></p>
			<p><a href="updateCustomer.php">Update customer details</a></p>
			<br><br>			
</div>
<!-- Multipurpose footer (will appear across several pages)	-->
	<?php
		include('footer.php');
	?>
   <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '85d51488-95e8-4ee2-8e8c-fbdb21201440', f: true }); done = true; } }; })();</script>
	</div>
	</body>
</html>