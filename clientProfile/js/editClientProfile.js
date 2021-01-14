const form = document.querySelectorAll('form')[1];
const form_pass = document.querySelectorAll('form')[2];
const inputs = form.querySelectorAll('input');
const inputs_pass = form_pass.querySelectorAll('input');
console.log(inputs_pass);

async function getAll() {
    const response = await fetch('http://localhost//CarRentingWebSite/api/getprofileinfo.php');
    const json_data = await response.json();
    var data_array = [json_data['customer_ID'], json_data['full_name'], json_data['age'], json_data['email'], json_data['phone'], json_data['payment_method']]
    fillInfo(data_array);
    let status = json_data['status'];
    if (status == 0) {
        disableAll();
    }
}


getAll();

function fillInfo(data_array) {

    inputs.forEach((input, index) => {
        input.value = data_array[index];
    });
}

function disableAll() {
    let allButtons = document.querySelectorAll('button');
    allButtons.forEach((btn) => {

        btn.disabled = true;

    });
    allButtons[0].disabled = false;
    let allinputs = document.querySelectorAll('input');
    allinputs.forEach((input) => {

        input.disabled = true;
    });
}

function request() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let ex = this.response;
            if (ex === 'empty') {
                swal("sorry!", "you have to fill every field  !", "warning");

            } else if (ex === '1') {
                swal("Good job!", "profile updated!", "success");
            } else {
                swal("sorry!", "Something went wrong !", "warning");
                console.log(ex);
            }
        }
    };
    xhttp.open("POST", "../clientProfile/updateprofile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(serialize(form));
}
// Check if passwords mathecs ..
let pass = inputs_pass[0];
let con = inputs_pass[1];
let button = form_pass.querySelector('button');
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

function updatepassword() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let ex = this.response;
            console.log(ex);
            if (ex === 'empty') {
                swal("sorry!", "you have to fill every field  !", "warning");

            } else if (ex === '1') {
                swal("Good job!", "profile updated!", "success");
            } else {
                swal("sorry!", "Something went wrong !", "warning");
            }
        }
    };
    xhttp.open("POST", "../api/editPasswordProfile.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(serialize(form_pass));
}