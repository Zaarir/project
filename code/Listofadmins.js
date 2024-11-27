

let inputs = document.querySelectorAll('#input');

for (let i = 0; i < inputs.length; i++) {


    inputs[i].onclick = function () {
        for (let j = 0; j < inputs.length; j++) {
            inputs[j].style.border = '';
        }
        this.style.border = '2px solid rgba(40, 146, 222, 255)';
    };
}


let bars = document.querySelector("#bars");
let ul = document.querySelector("ul");
let cancel = document.querySelector("#cancel")
let nav = document.querySelector("nav");


bars.onclick = function () {
    bars.style.left = "-100%";
    ul.style.left = "0%"
    cancel.style.left = "65%"
    nav.style.backgroundColor = "#0f1016"


}
cancel.onclick = function () {
    ul.style.left = "-100%"
    cancel.style.left = "-100%";
    nav.style.backgroundColor = "#edf4fa"
    bars.style.left = "20%";
}