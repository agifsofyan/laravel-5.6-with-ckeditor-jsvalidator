window.onscroll = changePos;

function changePos() {
    var header = document.getElementById("header");
    if (window.pageYOffset > 70) {
        header.style.position = "absolute";
        header.style.top = pageYOffset + "px";
    } else {
        header.style.position = "";
        header.style.top = "";
    }
//   var content = document.getElementById("content");
//     if (window.pageYOffset > 70) {
//         content.style.marginTop = "50px";
//     } else {
//         content.style.marginTop = "0";
//     }
}