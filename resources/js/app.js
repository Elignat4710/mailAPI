require("./bootstrap");

var today = new Date();

today =
    today.getFullYear() +
    "-" +
    String(today.getMonth() + 1).padStart(2, "0") +
    "-" +
    String(today.getDate()).padStart(2, "0") +
    "T" +
    today.getHours() +
    ":" +
    today.getMinutes();

document.getElementById("date").setAttribute("min", today);
 