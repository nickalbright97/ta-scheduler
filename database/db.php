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
?>