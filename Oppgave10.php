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
?>

<div id="main2">

    <?php
    include 'resources/scripts/serverVar.php';

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    ?>

    <h1>Oppgave 10:</h1>
    <?php

    if (isset($_GET["year"]) && isset($_GET["type"]))                     //Check if set
        if ($_GET["year"] > 1980 && $_GET["year"] < date("Y")) {    //Correct date format
            if ($_GET["type"] == "AVG" || $_GET["type"] == "SUM") {       //CHeck for existing types

                $yearReq = $_GET["year"];
                $calcType = $_GET["type"];

                /*
                 * My absolute beast of a SQL quarry EVER, but im proud i made it^^
                 * I am unsure how to handle the arrays with to_date = 9999.01.01.
                 * but the task did not specify enough so i have overlooked them.
                 *
                 * Also this said nothing about vacationmoney and so on...
                 *
                 * overlooking all that
                 *
                 * This first selects all the rows that has days inside in this year.
                 * it then calculates how many of those days are in THIS particular year
                 *
                 * then finds the days with this salary, then multiplies
                 * the daily salary with the amount of days within this period.
                 *
                 * Then in the end it just takes the SUM or AVG
                 * */
                $sumQuerry = '
                    SELECT
                    ' . $calcType . '((ABS(DATEDIFF(from_date,\'' . $yearReq . '-01-01\')) 
                    * 
                    (salary / (ABS(DATEDIFF(from_date,to_date)))))) AS Result
                    FROM `salaries` 
                    WHERE year(from_date) >= (' . ($yearReq - 1) . ') AND year(to_date) <= (' . ($yearReq + 1) . ')
                ';

                //Run quarry
                $quarryRes = $conn->query($sumQuerry);

                //If responce > 0 print result
                if ($quarryRes->num_rows > 0) {
                    foreach ($quarryRes as $i => $row) {
                        echo "<p style='color: #4542af;'>";
                        if ($_GET["type"] == "SUM") {
                            echo "The total salary in ";
                        } else {
                            echo "The average salary in ";
                        }
                        echo $_GET["year"] . " was: " . round($row["Result"], 3) . "</p>";
                    }
                } else {
                    $conn->close();
                    die("Querry empty");
                }

                $conn->close();
            } else {
                echo "<p style='color:red'> Did not specify SUM or AVG! </p>";
            }
        } else {
            echo "<p style='color:red'> Wrong year-format! </p>";
        }
    ?>

    <!-- The form that sends the GET to this site -->
    <form action="Oppgave10.php" method="get" style="width: 100%">
        <input type="number" placeholder="Choose year" name="year" id="year"
               value="<?php if (isset($_GET["year"])) {
                   echo $_GET["year"]; //This is so the year wont dissapear on reload
               } ?>">
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

