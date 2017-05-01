<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 14.05
 */ ?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 7</Title>
    <link rel="stylesheet" href="resources/css/default.css">
    <link rel="stylesheet" href="resources/css/menu.css">
    <link rel="stylesheet" href="resources/css/table.css">
</HEAD>

<BODY>

<?php
include 'menu.php';
printMenu();
?>

<div id="main1">

    <h1>Oppgave 7:</h1>

    <?php
    include 'resources/scripts/serverVar.php';

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    ?>

    <div class="datagrid" style="width: 100%">
        <table>
            <thead>
            <tr>
                <th>Name:</th>
                <th>Table / View:</th>
                <th>Columns:</th>
                <th>Attribs:</th>
            </tr>
            </thead>

            <tbody>

            <?php
            //echo "Connected successfully";
            $serverQuery = 'SHOW FULL TABLES FROM ' . $dbName;
            $tableList = $conn->query($serverQuery);

            if ($tableList->num_rows > 0) {
                for ($i = 0; $i < $tableList->num_rows; $i++) {
                    $table = $tableList->fetch_row();

                    $tableAttribSQL = 'SHOW FULL COLUMNS IN ' . $table[0] . ' IN ' . $dbName . ';';
                    $tableAttrib = $conn->query($tableAttribSQL);

                    $fieldholder = array();
                    for ($fields = 0; $fields < $tableAttrib->num_rows; $fields++) {
                        $fieldholder[$fields] = $tableAttrib->fetch_row();
                    }

                    if ($i % 2 == 0)
                        echo "<tr>";
                    else
                        echo "<tr class='alt'>";


                    echo "<td>" . $table[0] . "</td>";
                    echo "<td>" . $table[1] . "</td>";

                    echo "<td style='padding: 5px;'>";
                    foreach ($fieldholder as $column){
                        echo $column[0] . "<br>";
                    }
                    echo "</td>";

                    echo "<td style='padding: 5px;'>";
                    foreach ($fieldholder as $column){
                        echo $column[1] . "<br>";
                    }
                    echo "</td>";

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


