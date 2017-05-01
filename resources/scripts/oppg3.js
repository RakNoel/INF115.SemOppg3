/**
 * Created by oskar on 01.05.2017.
 */
function radioCheck(){
    var no = document.getElementsByName("no");
    var en = document.getElementsByName("en");

    return (no.checked || en.checked);
}