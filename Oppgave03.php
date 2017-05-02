<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 09.01
 */ ?>

<!DOCTYPE>
<HTML xmlns="http://www.w3.org/1999/html">
<HEAD>
    <Title>Oppgave 3</Title>
    <link rel="stylesheet" href="resources/css/default.css">
    <link rel="stylesheet" href="resources/css/menu.css">
    <link rel="stylesheet" href="resources/css/table.css">
</HEAD>

<BODY>

<?php
include 'menu.php';
?>

<div id="main2">
    <h1>Oppgave 3:</h1>
    <p>
        Please select language:
    </p>
    <form method="get" class="datagrid" action="Oppgave02.php" onsubmit="return radioCheck()" style="width: 100%;">
        <table>
            <tbody>
            <tr>
                <td><input type="radio" name="lang" id="no" checked="checked" align="center" style="margin: 10px;"
                           value="no"></td>
                <td><label for="no">Norwegian</label></td>
            </tr>
            <tr class="alt">
                <td><input type="radio" name="lang" id="en" align="center" style="margin: 10px;" value="en"></td>
                <td><label for="en">English</label></td>
            </tr>
            <tr>
                <td><input type="radio" name="lang" id="de" align="center" style="margin: 10px;" value="de"></td>
                <td><label for="de">German</label></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" style="width: 100%" name="sub"></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

</BODY>
</HTML>
