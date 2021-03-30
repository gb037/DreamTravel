<?php
    //start the session
    session_start();
    
    // the function got one parameter that is a list of groups
    function authorise_user($groups=NULL) {

        if (!isset($_SESSION['user_id']) ) {
            header('Location:http://127.0.0.1:8080/dream-travel-v05/files/login.php');
            exit;
        }
        
        if( (is_null($groups)) || (empty($groups)) )
            return;

        // display a link to logout
        print("
		
		<div class='dropdown' style='float:right;'>
		  <button class='dropbtn'>Hi, " . $_SESSION['username'] . " ▼</button>
		  <div class='dropdown-content'>
			<p><a href='upcomingBookings.php'>Upcoming bookings</a>
			<a href='pastBookings.php'>Past bookings</a>
			<a href='savedTrips.php'>Saved trips</a>
			<a href='updateCustomer.php'>Update details</a>
			<a href='http://127.0.0.1:8080/dream-travel-v05/files/logout.php'>Log out</a></p>
		  </div>
		</div>");
		
        //connect to the database
        $dsn = 'mysql:host=127.0.0.1;dbname=dream-travel-v05';
        $user = 'root';
        $dbpassword = '';
        
        try {
            $db = new PDO($dsn, $user, $dbpassword);
        } catch (PDOException $e) {
            //        echo 'Connection failed: ' . $e->getMessage();
            die('Sorry, database problem');
        }
        
        // Set up the query string
        $sqlQuery = 'SELECT groups_users.user_id 
		FROM groups_users, groups 
		WHERE groups.name = :groupName
		AND groups.ID = groups_users.group_id 
		AND groups_users.user_id = :userID';
        
        $query = $db->prepare($sqlQuery);

        // Run through each group and check membership
        foreach ($groups as $group) 
		{
            $params = array(
                            'userID' => $_SESSION['user_id'],
                            'groupName' => $group
                            );
            $query->execute($params);
            if($object = $query->fetch(PDO::FETCH_ASSOC))
			{
				print("<br>");
				// If we got a result, the user should be allowed access
                //   Just return so the script will continue to run
                return;
            }
        }
        
        // No matches were found for any group so, the user isn't allowed access
        print("<br><br>You are not authorised to see this page.");
        exit;
		
    }
?>