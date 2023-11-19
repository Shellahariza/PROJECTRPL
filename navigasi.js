document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var navigasiHTML = xhr.responseText;
            document.body.insertAdjacentHTML("afterbegin", navigasiHTML);
        }
    };
    xhr.open("GET", "navigasi.html", true);
    xhr.send();});