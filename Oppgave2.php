<!DOCTYPE>
<HTML>
<HEAD>
    <Title>Oppgave 2</Title>
    <link rel="stylesheet" href="resources/css/default.css">
    <link rel="stylesheet" href="resources/css/menu.css">
    <script src="resources/scripts/oppg2.js"></script>
</HEAD>

<BODY>

<?php
include 'menu.php';
printMenu();
?>

<div id="main2">

    <p id="prim">
        <?Php
        if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["year"])) {
            if (date("Y") - $_POST["year"] == $_POST["age"] || date("Y") - $_POST["year"] == $_POST["age"] + 1
                && $_POST["year"] < date("Y") && $_POST["year"] > 1800
                && $_POST["age"] >= 0 && $_POST["age"] <= 100
            ) {
                echo "Hello " . $_POST["name"];
                die();
            } else {
                echo "Date incorrect";
            }
        } else {
            echo "Please fill inn form:";
        }
        ?>
    </p>

    <p id="response"></p>

    <form action="/Oppgave2.php" method="post" onsubmit="return checkCredentials()">
        <input type="text" placeholder="Name.." id="name" name="name">
        <input type="number" placeholder="Birth-year.." id="year" name="year">
        <input type="number" placeholder="Age.." id="age" name="age">
        <input type="submit" value="Submit" style="width: 100%;" id="sub" onsubmit="checkCredentials()">
        <input type="button" value="Clear" style="width: 100%;" id="res" onclick="clearThisDoc()">
    </form>


</div>

</BODY>
</HTML>