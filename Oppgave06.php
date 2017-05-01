<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 12.03
 */ ?>

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

    <h1>Oppgave 6:</h1>

    <?php
    include 'resources/scripts/serverVar.php';

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    ?>

    <div class="datagrid" style="width: 100%">
        <table>
            <thead>
            <th>Table:</th>
            <th>Type:</th>
            </thead>

            <tbody>

            <?php
            //echo "Connected successfully";
            $serverQuery = 'SHOW FULL TABLES FROM ' . $dbName;

            $quarryRes = $conn->query($serverQuery);

            if ($quarryRes->num_rows > 0) {
                for ($i = 0; $i < $quarryRes->num_rows; $i++){
                        $row = $quarryRes->fetch_row();

                        if($i % 2 == 0)
                            echo "<tr>";
                        else
                            echo "<tr class='alt'>";

                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . $row[1] . "</td>";
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

