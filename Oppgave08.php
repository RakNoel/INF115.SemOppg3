<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 15.22
 */?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 8</Title>
    <link rel="stylesheet" href="resources/css/default.css">
    <link rel="stylesheet" href="resources/css/menu.css">
    <link rel="stylesheet" href="resources/css/table.css">
</HEAD>

<BODY>

<?php
include 'menu.php';
?>

<div id="main2">

    <h1>Oppgave 8:</h1>

    <?php
    include 'resources/scripts/serverVar.php';

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    ?>

    <div class="datagrid" style="width: 100%">
        <table>
            <thead>
            <th>Department:</th>
            <th>Manager:</th>
            <th>Num employees:</th>
            </thead>

            <tbody>

            <?php
            //A large SQL to select the requested information
            $serverQuery = '
                SELECT
                DEP.`dept_name` AS Department,
                EMP.`first_name` AS FirstName,
                EMP.`last_name` AS LastName,
                COUNT(DEPEMP.`emp_no`) AS Employees
            
                FROM `departments` AS DEP
            
                INNER JOIN `dept_manager` AS MANAGER
                ON MANAGER.`dept_no` = DEP.`dept_no`
            
                INNER JOIN `employees` AS EMP
                ON EMP.`emp_no` = MANAGER.`emp_no`
            
                INNER JOIN `dept_emp` AS DEPEMP
                ON DEPEMP.`dept_no` = DEP.`dept_no`
            
                WHERE MANAGER.`to_date` >= CURDATE()
            
                GROUP BY EMP.`emp_no`, DEP.`dept_no`;
            ';

            $quarryRes = $conn->query($serverQuery);

            //Print result
            if ($quarryRes->num_rows > 0) {
                foreach ($quarryRes as $i => $row) {
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    echo "<td>" . $row["Department"] . "</td>";
                    echo "<td>" . $row["FirstName"]. " " . $row["LastName"] . "</td>";
                    echo "<td>" . $row["Employees"] . "</td>";

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


