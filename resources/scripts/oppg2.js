/**
 * Created by oskar on 30.04.2017.
 */

/**
 * Function to check all the inputs before it is sent to server.
 * This is only to be user friendly and NOT to be trusted due to
 * the script being client side information.
 *
 * @returns {boolean} depending on whether the form should be
 * allowed to submit or not.
 */
function checkCredentials() {

    //Finds all elements
    var age = document.getElementById("age");
    var name = document.getElementById("name");
    var year = document.getElementById("year");
    var res = document.getElementById("response");
    res.style.color = "red";
    res.innerHTML = "";

    //Color to be used by script
    var errorColor = "#ff6f6e";
    var okColor = "#FFF";

    //The boolean we will return at the end of the script
    var retVal = true;

    //Check if age field is empty
    if (age.value === '') {
        age.style.backgroundColor = errorColor;
        res.innerHTML += "Age cannot be empty<br>";
        retVal = false;
    } else {
        age.style.backgroundColor = okColor;
    }

    //Check if name field is empty
    if (name.value === '') {
        name.style.backgroundColor = errorColor;
        res.innerHTML += "Name can not be empty<br>";
        retVal = false;
    } else {
        name.style.backgroundColor = okColor;
    }

    //Check if year field is empty
    if (year.value === '') {
        year.style.backgroundColor = errorColor;
        res.innerHTML += "Year can not be empty<br>";
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
        res.innerHTML += "Age and year does not match, is out of bounds, or is empty<br>";
        retVal = false;
    }

    return retVal;
}
