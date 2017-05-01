/**
 * Created by oskar on 30.04.2017.
 */

function checkCredentials() {

    var age = document.getElementById("age");
    var name = document.getElementById("name");
    var year = document.getElementById("year");

    var res = document.getElementById("response");
    res.style.color = "red";

    var errorColor = "#ff6f6e";
    var okColor = "#FFF";

    var retVal = true;

    if (age.value === '') {
        age.style.backgroundColor = errorColor;
        res.innerHTML = "Age cannot be empty";
        retVal = false;
    } else {
        age.style.backgroundColor = okColor;
    }

    if (name.value === '') {
        name.style.backgroundColor = errorColor;
        res.innerHTML = "Name can not be empty";
        retVal = false;
    } else {
        name.style.backgroundColor = okColor;
    }

    if (year.value === '') {
        year.style.backgroundColor = errorColor;
        res.innerHTML = "Year can not be empty";
        retVal = false;
    } else {
        year.style.backgroundColor = okColor;
    }

    var d = new Date();
    var thisYear = d.getFullYear();

    var diff = thisYear - year.value;
    var diff2 = thisYear - year.value - 1;

    if ((diff == age.value || diff2 == (age.value)) &&
        (age.value >= 0 && age.value <= 100) &&
        (year.value >= 1800 && year.value <= thisYear)
    ) {
        age.style.backgroundColor = okColor;
        year.style.backgroundColor = okColor;
    } else {
        year.style.backgroundColor = errorColor;
        age.style.backgroundColor = errorColor;
        res.innerHTML = "Age and year does not match, is out of bounds, or is empty";
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
