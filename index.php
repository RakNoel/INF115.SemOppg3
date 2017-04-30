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
    if (isset($_REQUEST['task']) && is_numeric($_REQUEST['task']))
        if (file_exists("Oppgave" . $_REQUEST['task'] . ".php")){
            http_redirect("Oppgave" . $_REQUEST['task'] . ".php");
        } else {
            echo "404 page not font :(";
        }
    else{
        echo "Velkommen til OLE006 sitt løsningsforslag av den obligatoriske oppgave nr 3";
    }
    ?>

</div>

</BODY>
</HTML>