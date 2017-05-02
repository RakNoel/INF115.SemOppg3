/**
 * Created by oskar on 01.05.2017.
 */
function radioCheck(){
    var no = document.getElementsByName("no");
    var en = document.getElementsByName("en");
    var de = document.getElementsByName("de");

    return (no.checked || en.checked || de.checked);
}