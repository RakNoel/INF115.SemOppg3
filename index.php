<?php
if (isset($_REQUEST['task']) && is_numeric($_REQUEST['task']))
    if (file_exists("Oppgave" . $_REQUEST['task'] . ".php")){
        header("Location: Oppgave" . $_REQUEST['task'] . ".php");
        die();
    } else {
        echo "404 page not font :(";
    }
?>

<!DOCTYPE>
<HTML>
<HEAD>
    <Title>OLE006 - Løsning</Title>
    <link rel="stylesheet" href="resources/css/default.css">
    <link rel="stylesheet" href="resources/css/menu.css">
    <link rel="stylesheet" href="resources/css/table.css">
</HEAD>

<BODY>

<?php
include 'menu.php';
printMenu();
?>

<div id="main">

    <?php
        echo "Hello and welcome to OLE006s solution to the third and final compulsory task! :D</br>";
        echo "Please use the navigation-menu above to select the task</br>";
    ?>

</div>

</BODY>
</HTML>