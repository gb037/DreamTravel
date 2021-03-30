<?php
    //start the session
    session_start();

    //check if the user is logged in
    //if the 'user_id' is not set in the session then it's the first time the user comes to this page
    if (!isset($_SESSION['user_id'])) 
	{
        // See if a login form was submitted with a username for login
        if (isset($_POST['username']) && isset($_POST['password'])) {
            // get the username
            $username = htmlentities(trim($_POST['username']));
            // get the password
            $password = htmlentities(trim($_POST['password']));
            
            echo $username . '   ' . $password;
            if(!$username || !$password) {
                header('HTTP/1.1 401 Unauthorized');
                header('WWW-Authenticate: Basic realm="ARU"');
                exit("You need to fill in both the username and password.");
                
            }
            
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
            
            
            // Look up the user-provided credentials
            $query = 'SELECT ID, username, encrypt_pass FROM users WHERE username = :username';
            $params = array(
                            'username' => $username
                            );
            
            $result = $db->prepare($query);
            $result->execute($params);

            echo 'You are ', $username, '   ' ;
            $found = true;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
			{             
                if( password_verify($password, $row['encrypt_pass']) ) 
				{
                  $found = false;
                  //get the ID and username found in the database
                  $current_ID = $row['ID'];
                  $current_username = $row['username'];
                  //set the session to store the ID and the username
                  $_SESSION['user_id'] = $current_ID;
                  $_SESSION['username'] = $current_username;
                  
                  // go to the next page; in this case readFromDB.php that displays a table
                                      print("read the DB");
                  header("Location:../index.php");
				  $found = true;
                  break;
				}
            }
            // if the $result contains 0 lines the username and password are not valid. Ask the user to re-enter them
            if(!$found) {
                header('HTTP/1.1 401 Unauthorized');
                header('WWW-Authenticate: Basic realm="ARU"');
                exit("You need a valid username and password.");
            }

        }

        //the cookie was previously set so, redirect to the next page
    } 
	else 
	{
        header("Location:../index.php");
    }
?>