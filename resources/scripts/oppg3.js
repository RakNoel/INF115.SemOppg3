/**
 * Created by oskar on 01.05.2017.
 */

/**
 * Function to check if any of the radio-buttons are
 * selected before submit.
 * @returns {boolean} depending on logical result
 */

function radioCheck(){
    var no = document.getElementsByName("no");
    var en = document.getElementsByName("en");
    var de = document.getElementsByName("de");

    return (no.checked || en.checked || de.checked);
}