<?php
if (isset($_REQUEST['task']) && is_numeric($_REQUEST['task']))
    if (file_exists("Oppgave" . $_REQUEST['task'] . ".php")) {
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

<div id="main2">
    <p>
        Hello lucky (or unlucky?) person who has been chosen to exmine my solution :D <br>
        <br>
        Here are a few things to get you started:
    </p>
    <ul>
        <li>First off I made a navigation menu at the top, and it will follow you.</li>
        <li>Secondly, I oriented the tasks as best as I could and hope you wont have to struggle too much navigating</li>
        <li>Thirdly I have not secured this too much against SQL injection, just Js-editing</li>
        <li>Fourth, check the serverVar.php inside "resources/scripts", that holds global variables for the DB</li>
        <li>Fifth, i designed all my pages to work best on standard resolution (1080p) on Google-chrome</li>
        <li>I'm afraid I have NOT been consistent with the use of language, and for that I'm truly sorry.</li>
        <li>Please enjoy this as much as I did creating it. Although, I probably made it a mess for you <br><br>:/</li>
    </ul>

</div>

</BODY>
</HTML>