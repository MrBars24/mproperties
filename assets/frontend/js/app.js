$(document).foundation()

function get_segment(i) {
    var a = window.location.href.split("/");
    a.shift();
    a.shift();
    a.shift();
    return a[i - 1];
}