<?php
    $host = "localhost"; //or localhost for some reason localhost didn't work for me?!
    $database = "ta_scheduler";
    $user = "ta_scheduler_app";
    $password = "$3kuDoG";
    $port = "3306";  //this should probably be 3306 (mysql default) for most of you

    $connection = new mysqli($host, $user, $password, $database, $port);
    if ($connection->connect_errno) {
			echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
    }
		
		feedback();
		person();
		shift();
		shift_request();
		
    function feedback () {
        global $connection;
        date_default_timezone_set('America/New_York');
        $today = date(DATE_RSS);
        $query = "select * from feedback";
        if ($connection->connect_errno) {
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }
        if ($results = $connection->query($query)) {
            printf("Select returned %d rows.\n", $results->num_rows);
            while($result = $results->fetch_assoc()) {
                printf("
									<ul id='%s'>
										<li class='code'><b>Code:</b> %s</li>
										<li class='text'><b>Text:</b> %s</li>
										<li class='professor'><b>Professor:</b> %s</li>
										<li class='time'><b>Date/Time:</b> %s</li>
									</ul>",
									$result["id"], $result["code"], $result["text"], $result["professor"], $result["datetime"]);
            }
            /* free result set */
            $results->close();
        }
		}

		function person () {
        global $connection;
        date_default_timezone_set('America/New_York');
        $today = date(DATE_RSS);
        $query = "select * from person";
        if ($connection->connect_errno) {
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }
        if ($results = $connection->query($query)) {
            printf("Select returned %d rows.\n", $results->num_rows);
            while($result = $results->fetch_assoc()) {
                printf("
									<ul id='%s'>
										<li class='name'><b>Name:</b> %s</li>
										<li class='email'><b>Email:</b> %s</li>
										<li class='password'><b>Password:</b> %s</li>
										<li class='role'><b>Role:</b> %s</li>
									</ul>",
									$result["id"], $result["name"], $result["email"], $result["password"], $result["role"]);
            }
            /* free result set */
            $results->close();
        }
		}

		function shift () {
        global $connection;
        date_default_timezone_set('America/New_York');
        $today = date(DATE_RSS);
        $query = "select * from shift";
        if ($connection->connect_errno) {
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }
        if ($results = $connection->query($query)) {
            printf("Select returned %d rows.\n", $results->num_rows);
            while($result = $results->fetch_assoc()) {
                printf("
									<ul id='%s'>
										<li class='owner'><b>Owner:</b> %s</li>
										<li class='shift_start'><b>Start:</b> %s</li>
										<li class='shift_end'><b>End:</b> %s</li>
									</ul>",
									$result["id"], $result["owner"], $result["shift_start"], $result["shift_end"]);
            }
            /* free result set */
            $results->close();
        }
		}

		function shift_request () {
        global $connection;
        date_default_timezone_set('America/New_York');
        $today = date(DATE_RSS);
        $query = "select * from shift_request";
        if ($connection->connect_errno) {
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }
        if ($results = $connection->query($query)) {
            printf("Select returned %d rows.\n", $results->num_rows);
            while($result = $results->fetch_assoc()) {
                printf("
									<ul id='%s'>
										<li class='dropper'><b>Dropper:</b> %s</li>
										<li class='picker'><b>Picker:</b> %s</li>
										<li class='datetime'><b>Date/Time:</b> %s</li>
										<li class='comments'><b>Comments:</b> %s</li>
									</ul>",
									$result["id"], $result["dropper"], $result["picker"], $result["datetime"], $result["comments"]);
            }
            /* free result set */
            $results->close();
        }
		}
?>