<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 11.21
 */ ?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 4</Title>
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
    <p>
        <?php
        include 'resources/scripts/serverVar.php';

        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        ?>

    <div class="datagrid" style="width: 100%">
        <table>
            <thead>
            <th>First name</th>
            <th>Last name</th>
            </thead>

            <tbody>

            <?php
            //echo "Connected successfully";
            $serverQuery = 'SELECT `first_name`, `last_name` FROM `employees` ORDER BY `last_name`;';

            $quarryRes = $conn->query($serverQuery);

            if ($quarryRes->num_rows > 0) {
                foreach ($quarryRes as $i => $row) {
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
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


    </p>
</div>

</BODY>
</HTML>
