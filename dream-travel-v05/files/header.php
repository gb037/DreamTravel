<?php

include('config.php');
?>
<?php
	print("<table border='0' style='width:100%'>
		<tr>
			<td style='width:20%' align='left'><h1><a href=\"../\">DreamTravel</a></h1></td>
			<td align='center' style='width:30%'>
				<!--
				<input type='text' style='width:95%' placeholder='All experiences'>
				-->
			</td>
			<td align='center' style='width:30%'>
				<!--
				<input type='text' style='width:95%' placeholder='Anywhere...'>
				-->
			</td>
			<td align='left' style='width:5%;'>
				<!--
				<button type='button' onclick='alert('Coming Soon')'>Search</button>
				-->
			</td>
			<td style='width:15%' align='right'>
				<p>");
			
		authorise_user(array('Customers')); 
		
		print("</p>
			</td>
		</tr>
	</table>");
?>