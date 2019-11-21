<?php
include("../database/db.php");
$professors = array("Bowers", "Sprague", "Weikle", "Bernstein");
$profCounter = [
    "Bowers" => 0,
    "Sprague" => 0,
    "Weikle" => 0,
    "Bernstein" => 0,
];
$profPercent = [
    "Bowers" => 0,
    "Sprague" => 0,
    "Weikle" => 0,
    "Bernstein" => 0,
];

// Prof calculation
$dataProfs = get_professors();
$totalProf = 0;

if ($dataProfs->num_rows > 0) {
    // output data of each row
    while ($row = $dataProfs->fetch_assoc()) {
        $prof = $row["professor"];
        if (in_array($prof, $professors)) {
            $profCounter[$prof]++;
            $totalProf++;
        }
        //  echo "Code: " . $row["code"]. "<br>";
    }
} else {
    echo "0 results";
}

// Get percentages for pie chart
foreach ($profPercent as $key => $value) {
    $profPercent[$key] = ($profCounter[$key] / $totalProf) * 100;
}

// Add other professors here
$dataPointsProfessors = array(
    array("label" => "Dr. Bowers", "y" => $profPercent["Bowers"]),
    array("label" => "Dr. Sprague", "y" => $profPercent["Sprague"]),
    array("label" => "Dr. Bernstein", "y" => $profPercent["Bernstein"]),
    array("label" => "Dr. Weikle", "y" => $profPercent["Weikle"])
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
                    text: "Professor Share of TA Hour Survey Responses"
                },
                subtitles: [{
                    text: "November 2019"
                }],
                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPointsProfessors,  JSON_NUMERIC_CHECK); ?>
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