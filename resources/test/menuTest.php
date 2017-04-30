<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 30.04.2017
 * Time: 19.04
 */
?>

<!DOCTYPE>
<HTML>
    <HEAD>
        <Title>Menu test</Title>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/table.css">
        <link rel="stylesheet" href="../css/default.css">
    </HEAD>

    <BODY>
        <div id="primary_nav_wrap">
            <ul>
                <li><a href="../../index.php"><span>Hjem</span></a></li>
                <li><a><span>Oppgaver</span></a>
                    <ul><?php listAllTasks(); ?></ul>
                </li>
            </ul>
        </div>

        <div id="main">
            <div class="datagrid">
            <TABLE>
                <thead>
                    <th>Test 1</th>
                    <th>Test 2</th>
                </thead>

                <tbody>
                    <tr><td>Yolo</td><td>Yolo</td></tr>
                    <tr class="alt"><td>Yolo</td><td>Yolo</td></tr>
                    <tr><td>Yolo</td><td>Yolo</td></tr>
                    <tr class="alt"><td>Yolo</td><td>Yolo</td></tr>
                    <tr><td>Yolo</td><td>Yolo</td></tr>
                </tbody>
            </TABLE>
        </div>
        </div>
    </BODY>
</HTML>

<?php
    function listAllTasks(){
        $oppgaveListe = scandir('tasks');

        if($oppgaveListe != false) {
            foreach ($oppgaveListe as $value) {
                if (strlen($value) > 2) {
                    echo "<li><a href='tasks/$value'><span>" . "$value" . "</span></a></li>";
                }
            }
        }
    }
?>