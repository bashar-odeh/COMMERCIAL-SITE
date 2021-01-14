const tabels = document.querySelectorAll('table');
const NodataDiv = document.querySelectorAll('.nodata');
const noDataCustomer = NodataDiv[0];
const noDataCars = NodataDiv[1];
const noDataDeals = NodataDiv[2];
let update_form_data = document.querySelectorAll('form')[1];
let update_form_password = document.querySelectorAll('form')[2];
let update_car_form_data = document.querySelectorAll('form')[3];
let inputs_pass = update_form_password.querySelectorAll("input");


const form = document.querySelectorAll('form')[0];
const forms = document.querySelectorAll('form');
const formPassword = document.querySelectorAll('form')[1];
const customers_table = tabels[0].children[1];

const cars_table = tabels[1].children[1];
const deals_table = tabels[2].children[1];
const customer_select = document.querySelector('#customer');

//events 

customer_select.addEventListener('change', (e) => {

    getAllCustomers(e.target.value);
})



// Check if passwords mathecs ..

let pass = inputs_pass[0];
let con = inputs_pass[1];
let button = update_form_password.querySelector('button');
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
});


async function isAdmin() {
    let response = await fetch('http://localhost//CarRentingWebSite/api/isadmin.php');
    let data = await response.json();
    try {
        if (data.data) {
            flag = true;
        } else {
            flag = false
        }
    } catch (err) {}
}
async function getAllCustomers(type) {
    let response = await fetch('http://localhost//CarRentingWebSite/api/admin/getAllcustomers.php?type=' + type);
    let customers = await response.json();
    fillCustomers(customers);
    //  console.log(customers);

}
getAllCustomers(2);

function fillCustomers(customers) {
    customers_table.innerHTML = '';

    let temp_html = customers_table.innerHTML;

    if (customers.data == 'No data') {
        noDataCustomer.innerHTML = `<span style ="font-size:1.5rem ; color:red;">No data</sapn>`

    } else {

        for (customer of customers) {

            temp_html = customers_table.innerHTML;
            let temp = '<tr>' +
                `<th>${customer.customer_ID}</th>` +
                `<th>${customer.full_name}</th>` +
                `<th>${customer.license}</th>` +
                `<th>${customer.age}</th>` +
                `<th>${customer.phone}</th>` +
                `<th>${customer.email}</th>` +
                `<th styile="text-transform: capitalize;"id='${'B' + customer.customer_ID}'>${customer.rating}</th>` +
                `<th>${customer.payment_method}</th>` +
                `<th>${customer.register_date}</th>` +

                `<th> <button type="submit" class="btn btn-primary" onclick=updatePopUp(this) id="update">Update</button></th>` +
                `<th><button type="button" onclick=deleteRecord('${customer.customer_ID}','customer') class="btn btn-danger delete">Delete</button></form></th>`;
            block = `<th><button type="button" status = ${customer.status} onclick=blockRecord('${customer.customer_ID}',this)  class="btn btn-danger block ">${parseInt(customer.status) ? 'Block' : 'Unblock'}</button></th>`;
            let rating = 'Make admin';
            if (customer.ratin === 'admin') {
                rating = 'Remove admin'
            }
            temp_admin = `<th> <button type="button" onclick=admin('${customer.customer_ID}',this) class="btn btn-primary admin" >${rating}</button></th>`;

            temp += (block + temp_admin + '</tr>');
            //  console.log(temp + '<br>');
            customers_table.innerHTML += temp;

        }
    }

    updatePopUp()

}


function admin(id, btn) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let ex = this.response;
            if (ex === 'admin') {
                btn.innerText = 'Remove admin';;
                document.querySelector('#B' + id).innerText = 'Admin';

            } else {
                btn.innerText = 'Make admin';
                document.querySelector('#B' + id).innerText = 'User';

            }
        }
    };
    xhttp.open("POST", "../api/admin/toggleAdmin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('id=' + id);
}

function blockRecord(id, btn, type) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let ex = this.response;
            //  console.log(ex);
            if (ex === '1') {
                btn.innerText = 'Block';
                btn.setAttribute('status', ex);
            } else {
                btn.innerText = 'Unblock';
                btn.setAttribute('status', ex);
            }
        }
    };
    xhttp.open("POST", '../api/admin/block.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('id=' + id + '&' + "status=" + btn.getAttribute('status'));
}

function deleteRecord(id, type) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //  console.log(this.response);
        }
    };
    xhttp.open("POST", "../api/admin/deleteRecord.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Deleted!", {
                    icon: "success",

                });

                if (type === 'car') {

                    getCars(1);

                } else {
                    getAllCustomers(2);

                }

                xhttp.send('id=' + id + '&' + 'type=' + type);


            } else {
                swal("Your Record is safe!");
            }
        });

}


function updateCustomerData(btn) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            let ex = this.response;
            //  console.log(ex);
            if (ex === 'empty') {
                swal("sorry!", "you have to fill every field  !", "warning");

            } else if (ex === '1') {
                swal("Good job!", "profile updated!", "success");
                getAllCustomers(2);

            } else {
                swal("sorry!", "Something went wrong !", "warning");


            }

        }
    };
    xhttp.open("POST", `../api/admin/editProfile.php?id=${btn.getAttribute('id')}`, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // console.log(serialize(update_form_data));
    xhttp.send(serialize(update_form_data));
}

function changeCustomerPassword(btn) {
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

            }

        }
    };
    xhttp.open("POST", `../api/admin/updatePassword.php?id=${btn.getAttribute('id')}`, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(serialize(update_form_password));
}

function updatePopUp() {


    let panel = document.querySelector(".update-info");
    let update = document.querySelectorAll('#update');
    update.forEach(btn => {
        let cells = btn.parentElement.parentElement.children;
        let inputs = document.querySelectorAll(".tabels input");

        btn.addEventListener('click', () => {

            panel.classList.toggle('activeate');
            let panel_buttons = panel.querySelectorAll('button');

            panel_buttons[0].addEventListener('click', () => {
                panel.classList.remove('activeate');

            });
            panel_buttons[1].setAttribute('id', cells[0].innerText);
            panel_buttons[2].setAttribute('id', cells[0].innerText);
            inputs[0].setAttribute('disabled', 'disabled');
            for (var i = 0; i < 8; i++) {
                inputs[i].value = cells[i].innerText;
            }


        });
    });

}

function updatePopUpCar(btn) {
    let panel = document.querySelector(".update-info-car");
    let cells = null;
    if (btn != null) {
        cells = btn.parentElement.parentElement.children
        let inputs = panel.querySelectorAll('input');
        let textarea = panel.querySelector('textarea');
        panel.classList.toggle('activeate');
        let panel_buttons = panel.querySelectorAll('button');
        panel_buttons[0].addEventListener('click', () => {
            panel.classList.remove('activeate');

        });
        panel_buttons[1].setAttribute('id', cells[0].innerText);
        inputs[0].setAttribute('disabled', 'disabled');
        for (var i = 0; i < inputs.length; i++) {
            console.log(inputs);
            console.log(cells);
            inputs[i].value = cells[i].innerText;
        }
        textarea.value = cells[7].innerText;
    }
}

let car_select = document.querySelector('#car-select');

car_select.addEventListener('change', (e) => {

    getCars(e.target.value)
    console.log(e.target.value);
});

async function getCars(type) {
    let response = await fetch('http://localhost//CarRentingWebSite/api/cars/getAllCars.php?type=' + type);
    let cars = await response.json();

    try {
        fillCars(cars);
    } catch (err) {}
}
getCars(1);

function fillCars(cars) {
    cars_table.innerHTML = '';

    let temp_html = cars_table.innerHTML;
    let tr = '<tr>'
    if (cars.data == 'No data') {
        noDataCars.innerHTML = `<span style ="font-size:1.5rem ; color:red;">No data</sapn>`

    } else {
        for (car of cars) {
            temp_html = cars_table.innerHTML;
            let temp =
                `<th>${car.car_id}</th>` +
                `<th>${car.manufacturer}</th>` +
                `<th>${car.model}</th>`;
            let status = parseInt(car.status);
            let text = '';
            switch (status) {
                case 0:
                    { text = 'Disabled'; break; }
                case 1:
                    { text = 'Avilable'; break; }
                case 2:
                    { text = 'Taken'; break; }
            }
            temp += `<th>${text}</th>` +
                `<th class = ${'A' + car.car_id}  data=${car.dealing_type}> ${parseInt(car.dealing_type) ? 'Selling' : 'Renting'}</th>`
            let rating = '';
            switch (parseInt(car.rating)) {
                case 0:
                    rating = 'Common';
                    break;
                case 1:
                    rating = 'Rare';
                    break;
                case 2:
                    rating = 'Epic';
                    break;
                case 3:
                    rating = 'Most Wanted';
                    break;
            }

            temp += `<th>${car.cost}</th>`;
            let temp2 =
                `<th>${rating}</th>` +
                `<th style="display: none;">${car.description}</th>` +
                `<th><button id ='update-car' onclick=updatePopUpCar(this) class="btn btn-primary">Update</button></th>` +
                `<th><button type="button" onclick=deleteRecord('${car.car_id}','car') class="btn btn-danger delete">Delete</button></form></th>`;
            let toggle = `<th><button type="button" onclick=toggleDealing('${car.car_id}') class="btn btn-primary">Toggle Dealing</button></form></th>` + `<th style="display: none;">${car.description}</th>`
            let disable = `<th><button type="button" onclick=disableCar('${car.car_id}') class="btn btn-danger">${parseInt(car.status) ? 'Disable' : 'Enable'}</button></form></th>`;

            if (status != 2 && status != 0) {
                temp2 += (toggle + disable);
            } else if (status == 0) {
                temp2 += ('<th></th>') + disable;
            }
            temp += temp2;
            tr += temp + '</tr>'
            temp_html += tr;


        }
    }

    cars_table.innerHTML = temp_html + '';
    updatePopUpCar();

}

function updateCarData(btn) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            let ex = this.response;
            console.log(ex);
            if (ex === 'empty') {
                swal("sorry!", "you have to fill every field  !", "warning");

            } else if (ex === '1') {
                swal("Good job!", "profile updated!", "success");
                getCars(1);
            } else {
                swal("sorry!", "Something went wrong !", "warning");


            }

        }
    };
    xhttp.open("POST", `../api/admin/editCarData.php?id=${btn.getAttribute('id')}`, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(serialize(update_car_form_data));
}


function toggleDealing(id) {
    let dealing_element = document.querySelector('.A' + id);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            //1 selling 0 renting
            dealing_element.innerText = parseInt(this.response) ? 'Selling' : 'Renting';
            dealing_element.setAttribute('data', this.response)

        }
    };
    xhttp.open("POST", "../api/admin/toggleDealingType.php?" + 'id=' + id + '&dealing=' + dealing_element.getAttribute('data'), true);
    xhttp.send();
}

function disableCar(id) {


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            getCars(1);
        }
    };
    xhttp.open("GET", "../api/admin/disableCar.php?id=" + id, true);
    xhttp.send();
}
async function getDeals() {
    let response = await fetch();
    let data = await response.json;

}