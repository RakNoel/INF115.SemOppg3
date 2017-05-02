<?php

//Selects the language to use
if (isset($_GET["lang"])) {
    try {
        include 'resources/lang/' . $_GET["lang"] . '.php';
    }catch (Exception $e){
        include 'resources/lang/no.php';
    }
} else {
    include 'resources/lang/no.php';
}
?>

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
?>

<div id="main2">
    <h1>Oppgave 2:</h1>
    <p id="prim">

        <?Php

        /**
         * checks if all fields are filled and validates their values. This is due to th fact that the
         * javascript is client side and therefore not trusted.
         */
        if (isset($_GET["name"]) && isset($_GET["age"]) && isset($_GET["year"])) {
            if (date("Y") - $_GET["year"] == $_GET["age"] || date("Y") - $_GET["year"] == $_GET["age"] + 1
                && $_GET["year"] < date("Y") && $_GET["year"] > 1800
                && $_GET["age"] >= 0 && $_GET["age"] <= 100
            ) {
                echo $hello . " " . $_GET["name"];
                die();
            } else {
                echo $wrong_date;
            }
        } else {
            echo $fill_form;
        }

        ?>
    </p>

    <p id="response"></p>

    <form action="Oppgave02.php" method="get" onsubmit="return checkCredentials()">
        <!-- Hidden field that holds the language and posts further -->
        <input type="hidden" name="lang" value="<?php if (isset($_GET['lang'])) echo ($_GET['lang']); ?>">

        <!-- Textboxes -->
        <input type="text" placeholder="<?php echo $name ?>" id="name" name="name">
        <input type="number" placeholder="<?php echo $year ?>" id="year" name="year">
        <input type="number" placeholder="<?php echo $age ?>" id="age" name="age">

        <!-- Buttons -->
        <input type="submit" style="width: 100%;" id="sub">
        <input type="reset" style="width: 100%">
    </form>


</div>

</BODY>
</HTML>