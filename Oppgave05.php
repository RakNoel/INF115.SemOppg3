<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 11.55
 */ ?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 5</Title>
    <link rel="stylesheet" href="resources/css/default.css">
    <link rel="stylesheet" href="resources/css/menu.css">
    <link rel="stylesheet" href="resources/css/table.css">
</HEAD>

<BODY>

<?php
include 'menu.php';
?>

<div id="main2">

    <h1>Oppgave 5:</h1>
    <?php
    include 'resources/scripts/serverVar.php';

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    ?>

    <div class="datagrid" style="width: 100%">
        <table>
            <thead>
            <th>Title:</th>
            </thead>

            <tbody>

            <?php
            //This is hopefully self explanatory.
            $serverQuery = 'SELECT DISTINCT `title` FROM `titles`;';

            $quarryRes = $conn->query($serverQuery);

            //Print all results into a table
            if ($quarryRes->num_rows > 0) {
                foreach ($quarryRes as $i => $row) {
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    echo "<td>" . $row["title"] . "</td>";

                    echo "</tr>";
                }
            } else {
                $conn->close();
                die("No responce");
            }


            $conn->close();
            ?>

            </tbody>
        </table>
    </div>
</div>

</BODY>
</HTML>
