<?php
include("../database/db.php");
$courses = array("149", "159", "240");
$courseCounter = [
    "149" => 0,
    "159" => 0,
    "240" => 0,
];
$coursePercent = [
    "149" => 0,
    "159" => 0,
    "240" => 0,
];

// Course calculation
$dataCourses = get_courses();
$totalCourses = 0;

if ($dataCourses->num_rows > 0) {
    // output data of each row
    while ($row = $dataCourses->fetch_assoc()) {
        $code = $row["code"];
        if (in_array($code, $courses)) {
            $courseCounter[$code]++;
            $totalCourses++;
        }
        //  echo "Code: " . $row["code"]. "<br>";
    }
} else {
    echo "0 results";
}

// Get percentages for pie chart
foreach ($coursePercent as $key => $value) {
    $coursePercent[$key] = ($courseCounter[$key] / $totalCourses) * 100;
}

$dataPointsCourses = array(
    array("label" => "CS 149", "y" => $coursePercent["149"]),
    array("label" => "CS 159", "y" => $coursePercent["159"]),
    array("label" => "CS 240", "y" => $coursePercent["240"])
);

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Class Share of TA Hour Survey Responses"
                },
                subtitles: [{
                    text: "November 2019"
                }],
                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPointsCourses,  JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 200px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>