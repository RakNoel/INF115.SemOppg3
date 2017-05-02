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
echo "<div id='primary_nav_wrap'>";
echo "<ul><li><a href='index.php'><span>Home</span></a></li>";
echo "<li><a><span>Tasks</span></a>";
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