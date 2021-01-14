let card_columns = document.querySelector(".card-columns");
let color_select = document.querySelector('#color');
let Select_brand = document.querySelector('#Select-brand');
let form = document.querySelector('form');

async function getAllCars() {

    let response = await fetch('http://localhost//CarRentingWebSite/api/cars/getAllCars.php?type=6');
    let data = await response.json();

    fillGallery(data);

}
getAllCars();

function fillGallery(data) {
    card_columns.innerHTML = '';
    let text = card_columns.innerHTML;
    let temp = '';
    for (car of data) {
        temp += creatCard(car.main_pic_path, car.manufacturer, car.model, car.description, car.car_id, car.cost, car.dealing_type);
    }

    text += temp;
    card_columns.innerHTML = text;
}

function creatCard(main_pic_path, manufacturer, model, description, car_id, cost, dealing_type) {
    let card = `     <div class="card">  
       <div>
    <span class='type'>${parseInt(dealing_type) ? 'Sell' : 'Rent'}</sapn>
    </div>

    <img class="card-img-top" src='../api/cars/${main_pic_path}' alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">${manufacturer} | ${model}</h5>
        <p style="width:100%;color:gold; text-align:center;font-weight:bold;font-size:1.2rem;">${cost}$</p>
        <p class="card-text">${description}</p>
        <button class="btn" onclick="window.location.href='../carProfile.html?id=${car_id}'"><span>Explore</span></button>
        </div>
</div>`

    return card;
}

async function getAllColors() {
    let data = await fetch('http://localhost//CarRentingWebSite/api/allcolors.php');
    let response = await data.json();

    fillColors(response);
}
getAllColors();

function fillColors(data) {
    for (color of data) {
        let option = document.createElement('option');
        option.innerText = color.color;
        color_select.appendChild(option);
    }
}


async function getAllBrands() {
    let data = await fetch('http://localhost//CarRentingWebSite/api/allBrands.php');
    let response = await data.json();

    fillBrands(response);
}
getAllBrands();

function fillBrands(data) {
    for (brand of data) {
        let option = document.createElement('option');
        option.innerText = brand.brand;
        Select_brand.appendChild(option);
    }
}

async function filter() {

    let response = await fetch('http://localhost//CarRentingWebSite/api/filter.php?' + serialize(form));
    let data = await response.json();
    console.log(data);
    if (data.data === 'No Data') { getAllCars(); } else {
        fillGallery(data);
    }

}