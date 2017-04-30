/**
 * Created by oskar on 30.04.2017.
 */

function checkCredentials() {
    var age, name, year;

    age = document.getElementById("age");
    name = document.getElementById("name");
    year = document.getElementById("year");

    var errorColor = "#ff6f6e";
    var okColor = "#FFF";

    var retVal = true;

    if (age.value === '') {
        age.style.backgroundColor = errorColor;
        retVal = false;
    } else {
        age.style.backgroundColor = okColor;
    }

    if (name.value === '') {
        name.style.backgroundColor = errorColor;
        retVal = false;
    } else {
        name.style.backgroundColor = okColor;
    }

    if (year.value === '') {
        year.style.backgroundColor = errorColor;
        retVal = false;
    } else {
        year.style.backgroundColor = okColor;
    }

    var d = new Date();
    var thisYear = d.getFullYear();

    //document.getElementById("prim").innerHTML = thisYear;

    var diff = thisYear - year.value;
    var diff2 = thisYear - year.value - 1;

    if (diff == age.value || diff2 == (age.value)) {
        age.style.backgroundColor = okColor;
        year.style.backgroundColor = okColor;
    } else {
        year.style.backgroundColor = errorColor;
        age.style.backgroundColor = errorColor;
        retVal = false;
    }

    return retVal;
}

function clearThisDoc() {
    var age, name, year;
    var okColor = "#FFF";

    age = document.getElementById("age");
    name = document.getElementById("name");
    year = document.getElementById("year");

    age.value = "";
    name.value = "";
    year.value = "";

    year.style.backgroundColor = okColor;
    name.style.backgroundColor = okColor;
    age.style.backgroundColor = okColor;
}
