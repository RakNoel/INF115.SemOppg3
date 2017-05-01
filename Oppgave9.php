<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 15.29
 */?>
<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 9</Title>
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
            <th>Gender:</th>
            <th>Number of employees:</th>
            <th>Born in:</th>
            </thead>

            <tbody>

            <?php
            $serverQuery = '
                SELECT `gender`, COUNT(`emp_no`) AS Number,
                floor((YEAR(`birth_date`) / 10))*10 AS Decade
                FROM `employees`
                GROUP BY `gender`, Decade
                ORDER BY `gender`
            ';

            $quarryRes = $conn->query($serverQuery);

            if ($quarryRes->num_rows > 0) {
                foreach ($quarryRes as $i => $row) {
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["Number"]. "</td>";
                    echo "<td>" . $row["Decade"] . "</td>";

                    echo "</tr>";
                }
            } else {
                $conn->close();
                die("Empty table");
            }


            $conn->close();
            ?>

            </tbody>
        </table>
    </div>
</div>

</BODY>
</HTML>



