<?php

/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 30.04.2017
 * Time: 20.30
 */


/**
 * PrintMenu er en funksjon som printer ut all HTML
 * kode for å få printe ut menyen korrekt.
 */
function printMenu()
{
    echo "<div id='primary_nav_wrap'>";
    echo "<ul><li><a href='index.php'><span>Hjem</span></a></li>";
    echo "<li><a><span>Oppgaver</span></a>";
    echo "<ul>";

    $dir = '.';
    $oppgaveListe = scandir($dir);

    if ($oppgaveListe != false)
        foreach ($oppgaveListe as $value)
            if (substr($value, 0, 1) == "O")
                echo "<li><a href='index.php?task="
                    . (substr($value, 7, 2))
                    . "'><span>" . "$value" . "</span></a></li>";

    echo "</ul></li></ul></div>";
}