let eye = document.getElementById("eye");
let passfield = document.getElementById("pass");


passfield.addEventListener('input', function () {

    if (passfield.value == "") {
        eye.style.display = "none";
    }
    else {
        eye.style.display = "inline-block";
    }


}
)

eye.onclick = function () {

    if (passfield.type == "password") {
        passfield.type = "text";
    }

    else {
        passfield.type = "password";
    }
}