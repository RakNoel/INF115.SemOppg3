<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 16.10
 */ ?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 10</Title>
    <link rel="stylesheet" href="resources/css/default.css">
    <link rel="stylesheet" href="resources/css/menu.css">
    <link rel="stylesheet" href="resources/css/table.css">
</HEAD>

<BODY>

<?php
include 'menu.php';
printMenu();
?>

<div id="main2">

    <?php
    include 'resources/scripts/serverVar.php';

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    ?>

    <h1>Oppgave 10:</h1>
    <?php

    if (isset($_GET["year"]) && isset($_GET["type"]))
        if ($_GET["year"] > 1900 && $_GET["year"] < date("Y")) {
            if ($_GET["type"] == "AVG" || $_GET["type"] == "SUM") {

                $yearReq = $_GET["year"];

                $sumQuerry = '
                        SELECT
                        SUM((ABS(DATEDIFF(from_date,\'' . $yearReq . '-01-01\')) * (salary / (ABS(DATEDIFF(from_date,to_date)))))) 
                        AS Summert,
                        
                        AVG((ABS(DATEDIFF(from_date,\'' . $yearReq . '-01-01\')) * (salary / (ABS(DATEDIFF(from_date,to_date)))))) 
                        AS Snitt
                        
                        FROM `salaries` 
                        WHERE year(from_date) >= (' . ($yearReq - 1) . ') AND year(to_date) <= (' . ($yearReq + 1) . ')
                    ';


                $quarryRes = $conn->query($sumQuerry);

                if ($quarryRes->num_rows > 0) {
                    foreach ($quarryRes as $i => $row) {
                        echo "<p style='color: #4542af;'>";
                        if($_GET["type"] == "SUM"){
                            echo "The total salary in " . $_GET["year"] . " was: " . round($row["Summert"], 3);
                        }else{
                            echo "The average salary in " . $_GET["year"] . " was: " . round($row["Snitt"], 3);
                        }
                        echo "</p>";
                    }
                } else {
                    $conn->close();
                    die("Querry empty");
                }

                $conn->close();
            } else {
                echo "<p style='color:red'> Wrong type! </p>";
            }
        } else {
            echo "<p style='color:red'> Wrong year-format! </p>";
        }
    ?>

    <form action="Oppgave10.php" method="get" style="width: 100%">
        <input type="number" placeholder="Choose year" name="year" id="year"
               value="<?php if(isset($_GET["year"])) { echo $_GET["year"]; } ?>">
        <table>
            <tbody>
            <tr>
                <td><input type="radio" name="type" value="SUM" id="SUM" checked="checked"></td>
                <td><label for="SUM">Sum</label></td>
            </tr>

            <tr>
                <td><input type="radio" name="type" id="AVG" value="AVG"></td>
                <td><label for="AVG">Average</label></td>
            </tr>
            </tbody>
        </table>
        <input type="submit" style="width: 100%;">
    </form>
</div>

</BODY>
</HTML>

