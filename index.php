<!DOCTYPE HTML>
<html>

<head>
    <title>Document</title>
</head>

<form method="get" action="1.php">
<p>Finished tasks: <select name="taskProject" id="taskProject">
        <?php
        include 'db.php';
        $sqlSelect = "SELECT DISTINCT $db.projects.name FROM $db.projects";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
    <select name="taskDate" id="taskDate">
        <?php
        include 'db.php';
        $sqlSelect = "SELECT DISTINCT $db.work.date FROM $db.work";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
    <button>Get</button></p>
</form>


<form method="get" action="2.php">
   <p>All time working for project: <select name="allTimeProject" id="allTimeProject">
        <?php
        include 'db.php';
        $sqlSelect = "SELECT DISTINCT $db.projects.name FROM $db.projects";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
    <button>Get</button></p>
</form>


<form method="get" action="3.php">
<p>Value of workers of  <select name="chiefValue" id="chiefValue">
        <?php
        include 'connection.php';
        $sqlSelect = "SELECT DISTINCT $db.department.chief FROM $db.department";
        foreach ($dbh->query($sqlSelect) as $cell) {
            echo "<option>";
            print "$cell[0]";
            echo "</option>";
        }
        ?>
    </select>
    <button>Get</button></p>
</form>

</body>

</html>