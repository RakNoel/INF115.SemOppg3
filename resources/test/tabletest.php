<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 30.04.2017
 * Time: 17.23
 */
?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Table test</Title>
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/default.css">
</HEAD>

<BODY>
    <div class="header">
        TableTest;
    </div>
    <div id="main">
        <div class="datagrid">
            <TABLE>
                <thead>
                <th>Test 1</th>
                <th>Test 2</th>
                </thead>

                <tbody>
                <?php thisfunction(); ?>
                </tbody>
            </TABLE>
        </div>
    </div>
</BODY>
</HTML>

<?php

function thisfunction()
{
    for ($x = 0, $y = 1; $x <= 10; $x++, $y *= 2) {
        if ($x % 2 == 0) {
            echo "<tr>";
        }else{
            echo "<tr class='alt'>";
        }
        echo " <td>$x</td> ". "<td>$y</td>" . "</tr>";
    }
}

?>