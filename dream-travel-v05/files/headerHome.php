<?php
print("<table border='0' style='width:100%'>
		<tr>
			<td style='width:50%' align='left'>
				<p>
				<a href='http://127.0.0.1:8080/dream-travel-v05/'>
					<h1>DreamTravel<h1>
				</a>
				</p>
			</td>
			<td style='width:50%' align='right'>
				<p>");
			if (!isset($_SESSION['user_id']) ) {
				print("<a href='http://127.0.0.1:8080/dream-travel-v05/files/login.php'>
									<h3>SIGN IN
								</a>
								|
								<a href='http://127.0.0.1:8080/dream-travel-v05/files/create-user.php'>
									SIGN UP<h3>
								</a>");
			}
				

print("				</p>
			</td>
		</tr>
	</table>");
?>	