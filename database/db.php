<?php
    $host = "127.0.0.1"; //or localhost for some reason localhost didn't work for me?!
    $database = "ta_manager";
    $user = "ta_manager_app";
    $password = "s3kuDoG";
    $port = "3306";  //this should probably be 3306 (mysql default) for most of you

    $connection = new mysqli($host, $user, $password, $database, $port);
    if ($connection->connect_errno) {
        echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
    }

    function questionsToday () {
        global $connection;
        date_default_timezone_set('America/New_York');
        $today = date(DATE_RSS);
        $questionsTodayQuery = "select * from questions where asked > curdate()";
        if ($connection->connect_errno) {
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }
        if ($result = $connection->query($questionsTodayQuery)) {
            // printf("Select returned %d rows.\n", $result->num_rows);
            while($question = $result->fetch_assoc()) {
                printf("<li data-answered=\"%s\"><span class=\"question_id\">%s</span><span class=\"author_id\"%s</span><span class=\"question_body\">%s</span></li>", $question["answered"], $question["id"], $question["author"], $question["content"]);
            }
            /* free result set */
            $result->close();
        }
    }

    function newQuestion ($question, $author) {
        global $connection;
        $newQuestionQuery = "insert into questions (content, author) values (?, ?)";
        // printf("%s %d", $question, $author);
        if ($connection->connect_errno) {
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }

        $stmt = $connection->prepare($newQuestionQuery);
        $stmt->bind_param("sd", $question, $author);
        $stmt->execute();

        $newId = $connection->insert_id;
        if (!is_null($newId)) {
            echo "New record created successfully. Last inserted ID is: " . $newId;
            // questionsToday();
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        } 
    }
?>