<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 16.10
 */?>

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

    <div class="datagrid" style="width: 100%">
        <table>
            <thead>
            <th>The sum:</th>
            <th>The snitt:</th>
            </thead>

            <tbody>

            <?php

            $yearReq = 1988; //testing

            $sumQuerry = '
                SELECT
                SUM((ABS(DATEDIFF(from_date,\'' . $yearReq . '-01-01\')) * (salary / (ABS(DATEDIFF(from_date,to_date)))))) 
                AS Summert,
                
                AVG((ABS(DATEDIFF(from_date,\'' . $yearReq . '-01-01\')) * (salary / (ABS(DATEDIFF(from_date,to_date)))))) 
                AS Snitt
                
                FROM `salaries` 
                WHERE year(from_date) >= (' . ($yearReq-1) . ') AND year(to_date) <= (' . ($yearReq+1) . ')
            ';


            $quarryRes = $conn->query($sumQuerry);

            if ($quarryRes->num_rows > 0) {
                foreach ($quarryRes as $i => $row) {
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    echo "<td>" . $row["Summert"] . "</td>";
                    echo "<td>" . $row["Snitt"] . "</td>";

                    echo "</tr>";
                }
            } else {
                $conn->close();
                die();
            }


            $conn->close();
            ?>

            </tbody>
        </table>
    </div>
</div>

</BODY>
</HTML>

