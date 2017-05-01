<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 12.03
 */?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 6</Title>
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
            <th>Owner:</th>
            <th>Table:</th>
            </thead>

            <tbody>

            <?php
            //echo "Connected successfully";
            $serverQuery = 'SHOW TABLES IN ' . $dbName;

            $quarryRes = $conn->query($serverQuery);

            if ($quarryRes->num_rows > 0) {
                echo $quarryRes[0];

                /*foreach ($quarryRes as $i => $row) {
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    echo "<td>" . $row["Owner"] . "</td>";
                    echo "<td>" . $row["table_name"] . "</td>";

                    echo "</tr>";
                }*/
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

