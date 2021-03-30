    <?php                        // function to update booking with new bookingPrice and new noOfTravs, based on bookingID         function updateBookingInDB($db) {                        // get the data from the front end            $bookingPrice = $_POST['bookingPrice'];            $tripID = $_POST['tripID'];            $userID = $_POST['userID'];				$noOfTravs = $_POST['noOfTravs'];			$bookingID = $_POST['bookingID'];					$sqlQuery = "UPDATE Bookings 				SET bookingPrice = :bookingPrice, noOfTravs = :noOfTravs				WHERE ID = :bookingID";				$params = array(							':bookingID' => $bookingID,							':bookingPrice' => $bookingPrice,							':noOfTravs' => $noOfTravs							);							$result = $db->prepare($sqlQuery);				$result->execute($params);         }			        // function to insert Traveller data in the database         function insertTravellerInDB($db) {            			// get the data from the front end			$flname = $_POST['flname'];			// check the values			if( !$flname) {				echo 'One or more fields are empty.';				return;			}						// create a query			$sqlQuery = "INSERT INTO Users (name, email, username, encrypt_pass) VALUES (:name, :email, :username, :password)";						//prepare the query			$query = $db->prepare($sqlQuery);						//execute the query			$query->execute(array(								  ':name' => $flname,								  ':email' => NULL,									':username' => NULL,								  ':password' => NULL								  ));	        }                //function to associate user ID to groupID 3 = Travellers        function insertGroupUserInDB($db) {                        // get the data from the front end            $groupID = 3;						global $travUserID;						// Look up the most recent ID in users			$query2 = "SELECT MAX(ID) AS 'ID'			FROM users";						//send the query to the db			$result = $db->query($query2);			$found = true;			while ($row = $result->fetch(PDO::FETCH_ASSOC)) 			{             				  $found = false;				  //get the ID found in the database				  $travUserID = $row['ID'];				  $found = true;				  break;			}						//INSERT INTO `bookings_users` (`ID`, `booking_id`, `user_id`) VALUES (NULL, '6', '3');			$sqlQuery2 = "INSERT INTO `groups_users` 			(`ID`, `group_id`, `user_id`) 			VALUES 			(:id, :group_id, :travUserID)			";					//prepare the query			$query3 = $db->prepare($sqlQuery2);						//execute the query			$query3->execute(array(								':id' => NULL, 								':group_id' => $groupID, 								':travUserID' => $travUserID								));											return $travUserID;        }					//function to associate booking ID to Traveller user ID        function insertBookingTravellerInDB($db, $travUserID) {                        // get the data from the front end			$bookingID = $_POST['bookingID'];						//INSERT INTO `bookings_users` (`ID`, `booking_id`, `user_id`) VALUES (NULL, '6', '3');			$sqlQuery = "INSERT INTO `bookings_users` (`ID`, `booking_id`, `user_id`) VALUES (?, ?, ?)";					//prepare the query			$query2 = $db->prepare($sqlQuery);						//execute the query			$query2->execute(array(NULL, $bookingID, $travUserID));        }						// function to update trip in the database         function updateTripInDB($db) {                        // get the data from the front end;            $tripID = $_POST['tripID'];											$sqlQuery = "UPDATE Trips 						SET placesLeft = placesLeft - 1						WHERE tripID = :tripID";						$params = array(									':tripID' => $tripID									);											$result = $db->prepare($sqlQuery);						$result->execute($params);		 			//check if the booking was successfully inserted in the database            if ($result) {				//once the SQL write operation is complete, redirect to a receipt page                header("Location: upcomingBookings.php");				die();            }            else {                //redirect to an error page                header("Location: error.php");				die();            }        }				                /* Main body */        //connect to the DB        $dsn = 'mysql:host=127.0.0.1;dbname=dream-travel-v05';        $user = 'root';        $password = '';                try {            $db = new PDO($dsn, $user, $password);            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        } catch (PDOException $e) {            //           echo 'Connection failed: ' . $e->getMessage();            die('Sorry, database problem');        }        		// get the data from the front end			$flname = $_POST['flname'];		// check the values		if( !$flname) {			echo 'One or more fields are empty.';			return;		}			        updateBookingInDB($db);		insertTravellerInDB($db);		insertGroupUserInDB($db);		insertBookingTravellerInDB($db, $travUserID);		updateTripInDB($db);        ?>