
let inputs = document.querySelectorAll('#input');

for (let i = 0; i < inputs.length; i++) {


    inputs[i].onclick = function () {
        for (let j = 0; j < inputs.length; j++) {
            inputs[j].style.border = '';
        }
        this.style.border = '2px solid blue';
    };


}
