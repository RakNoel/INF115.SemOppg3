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
?>

<!-- Since this is such a large responce, i decided to expand the main div-->
<div id="main1">
    <h1>Oppgave 4:</h1>
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

            /**
             * This quarry WILL return EVERY SIGNLE employee in the DB.
             * This is A LOT and the webpage will be slow.
             *
             * Reading the TASK at hand is states:
             * "
             *     Write a PHP script to connect to the employee database
             *     and return a list of the employee's (first name and last name),
             *     sorted in alphabetical order by last name.
             * "
             * 01.05.2017 ~
             *
             * So that's what i did :/
             */
            $serverQuery = 'SELECT `first_name`, `last_name` FROM `employees` ORDER BY `last_name`;';

            $quarryRes = $conn->query($serverQuery);

            if ($quarryRes->num_rows > 0) {
                foreach ($quarryRes as $i => $row) {

                    /**
                     * This simple IF / ELSE is the magic
                     * that gives the table the beautiful
                     * looks with changing row colors
                     */
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
