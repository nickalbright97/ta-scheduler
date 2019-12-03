
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
    session_start();
    function insert_queue_data($ques) {
        global $connection;
        $queryStr = "UPDATE `queue` SET `queue` = ?";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("s", $ques);
        $stmt->execute();
    }
    function get_queue_data() {
        global $connection;
        $queryStr = "SELECT * FROM `queue`";
        $data = $connection->query($queryStr);
        return $data;
    }
    function insert_feedback($class, $prof, $date, $text) {
        global $connection;
        $queryStr = "INSERT INTO `feedback`(code, professor, text, datetime) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("ssss", $class, $prof, $text, $date);
        $stmt->execute();
        return $stmt->error;
    }
    function manager_prefs() {
        global $connection;
        $queryStr = "SELECT  `person`.name, sunday_start, sunday_end, monday_start, monday_end, tuesday_start, tuesday_end, wednesday_start, wednesday_start, wednesday_end, thursday_start, thursday_end, late_shifts FROM `preferences`
        JOIN `person` ON person_id = `person`.id";
        $data = $connection->query($queryStr);
        return $data;
    }
    function survey_resp_today() {
        global $connection;
        $queryStr = "SELECT code, professor, text FROM `feedback` WHERE datetime >= CURRENT_DATE() AND datetime <= CURRENT_DATE() + 1";
        $data = $connection->query($queryStr);
        return $data;
    }
    function survey_resp_date($date) {
        global $connection;
        //must change to do math
        $date2 = DateTime::createFromFormat('Y-m-d', $date);
        date_add($date2, date_interval_create_from_date_string('1 days'));
        //change back
        $date2 = $date2->format("Y-m-d");
        $queryStr = "SELECT code, professor, text FROM `feedback` WHERE datetime >= (?) AND datetime <= (?)";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("ss", $date, $date2);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    function get_courses() {
        global $connection;
        $queryStr = "SELECT code FROM `feedback`";
        $stmt = $connection->prepare($queryStr);
        $stmt->execute();
        return $stmt->get_result();
    }
        
    function get_professors() {
        global $connection;
        $queryStr = "SELECT professor FROM `feedback`";
        $stmt = $connection->prepare($queryStr);
        $stmt->execute();
        return $stmt->get_result();
    }

    function get_incoming_requests() {
        global $connection;
        $queryStr = "SELECT * FROM `shift_request` where approved = false  AND picker IS NULL";
        $stmt = $connection->prepare($queryStr);
        $stmt->execute();
        return $stmt->get_result();
    }

    function get_outgoing_requests($id) {
        global $connection;
        $queryStr = "SELECT * FROM `shift_request` where dropper = ? AND approved = false";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    function get_name($id) {
        global $connection;
        $queryStr = "SELECT name FROM `person` where id = ?";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    function get_role($id) {
        global $connection;
        $queryStr = "SELECT role FROM `person` where `username` = ?";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    function get_id($username) {
        global $connection;
        $queryStr = "SELECT id FROM `person` where `username` = ?";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result();
    }

    function claim_shift($shiftID) {
        global $connection;
        $id = $_SESSION['id'];
        $queryStr = "UPDATE shift_request SET `picker` = $id where id = ?";
        $stmt = $connection->prepare($queryStr);
        $stmt->bind_param("s", $shiftID);
        $stmt->execute();
        return $stmt->get_result();
    }
    

?>