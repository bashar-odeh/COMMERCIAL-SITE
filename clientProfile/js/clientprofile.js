const bio = document.querySelector('.row.info');
const table = document.querySelector('table');


// functions
async function getAll() {
    const response = await fetch('http://localhost//CarRentingWebSite/api/getprofileinfo.php?type=');
    const json_data = await response.json();
    var data_array = [json_data['customer_ID'], json_data['full_name'], json_data['license'],
        json_data['rating'], parseInt(json_data['age']), json_data['email'],
        json_data['phone'], json_data['register_date'], parseInt(json_data['status']) ? "Active" : "Blcked",
        json_data['payment_method']
    ]
    fillInfo(data_array, parseInt(json_data['status']));
}

getAll();

function disableAll() {
    let allButtons = document.querySelectorAll('button');
    allButtons.forEach((btn) => {
        btn.disabled = true;
    });
    console.log(allButtons);
    allButtons[1].disabled = false;

    let allinputs = document.querySelectorAll('input');
    allinputs.forEach((input) => {

        input.disabled = true;
    })
}

function fillInfo(data_array, status) {

    status ? 1 : disableAll();
    let inputs = document.querySelectorAll('.form-control');

    inputs.forEach((input, index) => {
        input.value = data_array[index];
    });



}
const nodata = document.querySelector(".nodata");
async function getDeals() {
    let response = await fetch('http://localhost//CarRentingWebSite/api/cusotmerdeals.php');
    let data = await response.json();

}

function fillDeals(deal) {
    let deal_status = 'Finished' //
    let deal_type = 'rent' // 1 means rent
    if (deal['deal_type'] === 0) {
        deal_type = 'sell';
    }
    if (deal['deal_status'] === 1) {
        deal_status = 'Active'
    }

    let y = ``
    let temp = table.innerHTML;
    let tr = ` <tr>
     <td>${deal['customer_ID']}</td>
     <td>${deal['full_name']}</td>
     <td>${deal['car_id']}</td>
     <td>${deal['manufacturer']}</td>
     <td>${deal['model']}</td>
     <td>${deal_type}</td>
     <td>${deal['start_date']}</td>
     <td>${deal['end_date']}</td>
     <td>${deal['deal_cost']}</td>
     <td>${deal_status}</td>
     </tr>`
    table.innerHTML += tr;
}
getDeals();