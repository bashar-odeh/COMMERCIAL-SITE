const form = document.querySelector('form');
const button = document.querySelector('#ajax');
const inputs = document.querySelectorAll('input');


function sendFormData() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let ex = this.response;
            if (ex === 'empty') {
                swal({
                    title: "You have to fill all fields",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });
            } else if (ex === 'email') {

                swal({
                    title: "wrong E-mail",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });

            } else if (ex === 'exist') {
                swal({
                    title: "account alredy exists",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });

            } else if (ex === 'added') {
                swal("Well Done!", "You have been Registered!", "success");
                emptyAllFeilds();
            } else {}
        }
    };
    xhttp.open("POST", "sign.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(serialize(form));
}

button.addEventListener('click', (e) => {
    e.preventDefault();
    sendFormData();
});

function emptyAllFeilds() {
    let inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    })
}

let pass = inputs[6];
let con = inputs[7];
let equal = document.querySelector('#equal');
con.addEventListener('keyup', () => {
    if (pass.value === con.value) {
        button.disabled = false;
        equal.innerText = '';

    } else {
        button.disabled = true;
        equal.innerText = 'Passwords doesnt match';
    }
});
pass.addEventListener('keyup', () => {
    if (pass.value === con.value) {
        button.disabled = false;
        equal.innerText = '';

    } else {
        button.disabled = true;
        equal.innerText = 'Passwords doesnt match';
    }
})