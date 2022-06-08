<!DOCTYPE HTML>
<html>
<head>
    <title>Document</title>
</head>
<body>
<?php
include "db.php";
$project = $_REQUEST['allTimeProject'];
$sqlSelect = $dbh->prepare(
    "SELECT ROUND(($db.work.time_end - $db.work.time_start)/10000,2) AS time, $db.projects.name, $db.worker.ID_WORKER, $db.worker.name
    FROM $db.work inner join $db.projects on $db.work.FID_PROJECTS = $db.projects.ID_projects 
    join $db.worker on $db.work.FID_WORKER = $db.worker.ID_WORKER 
    where $db.projects.name = :project;");
$sqlSelect->execute(array('project' => $project));
echo "<p>Workers in project with their spent time</p>";
echo "<ol>";
$resultTime = 0;
while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
    echo "<li>Time: $cell[0], project: $cell[1], id_worker: $cell[2], name of worker: $cell[3]</li>";
    $resultTime +=$cell[0];
}
echo "</ol>";
echo "Sum of spent time: $resultTime";
?>
</body>
<html>
