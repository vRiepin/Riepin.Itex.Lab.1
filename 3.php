<!DOCTYPE HTML>
<html>
<head>
    <title>Document</title>
</head>
<body>
<?php
include "db.php";
$chief = $_REQUEST['chiefValue'];
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.worker  
    join $db.department on $db.worker.FID_DEPARTMENT = $db.department.ID_DEPARTMENT 
    WHERE $db.department.chief = :chief");
$sqlSelect->execute(array('chief' => $chief));
$result = 0;
echo "<p>Workers of chief: $chief</p>";
echo "<ol>";
while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
    echo "<li> Name of worker: $cell[2], id_worker: $cell[0]</li>";
    $result++;
}
echo "</ol>";
echo "Value of workers of this chief is: $result";
?>
</body>
<html>