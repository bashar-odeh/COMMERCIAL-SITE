const carusal = document.querySelector(".carousel-inner");
const carusal_indicators = document.querySelector('.carousel-indicators');

window.onload = function() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id');
    getSingleCar(id);
}

async function getSingleCar(id) {
    let response = await fetch('http://localhost//CarRentingWebSite/api/cars/getSingleCar.php?id=' + id)
    let data = await response.json();
    let colors = await getColor(id);
    fillCarspecs(data.manufacturer, data.cost, data.model, data.description, data.rating, colors, id);
}

async function getColor(id) {
    let response = await fetch('http://localhost//CarRentingWebSite/api/cars/getSingleCarColors.php?id=' + id)
    let data = await response.json();
    let colors = [];
    let path = []
    for (car of data) {
        colors.push(car.color);
        console.log(car.path);
        fillImageSlider(car.path);
    }
    return colors;
}


function fillCarspecs(manufacturer, cost, model, description, rating, colors, id) {
    console.log(colors);
    let text = '';
    let active = 'active-span';
    for (var i = 0; i < 3; i++) {
        text += `    <span data=${i}  class='${active}' onclick=getCarColor(this,${i})>${colors[i]}</span>    `
        active = '';
    }
    switch (parseInt(rating)) {
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
    let item = `    
      <h1> <i></i> ${manufacturer} | ${model}</h1>
    <h4>Rating: <span style="color:black">${rating}</span></h4>
    <h2>Cost: ${cost}$</h2>
    <p class="description">${description}</p>
    <div class="color">
       ${text}
    </div>

    <div class="buttons">
        <button class="buy">Buy</button>
        <button class="rent">Rent</button>
    </div>`

    document.querySelector(".right").innerHTML = item;
    getRelated(id, manufacturer);
}

function getCarColor(color_span, number) {
    let colors = document.querySelector('.color').children;
    let indicators = carusal_indicators.children;
    for (let i = 0; i < indicators.length; i++) {
        colors[i].classList.remove('active-span');

        if (indicators[i].getAttribute('data-slide-to') == number) {
            indicators[i].click();
            color_span.classList.add('active-span');
        }
    }


}
var counter = 0;

function fillImageSlider(src) {

    let active = 'active'
    if (counter >= 1) {
        active = '';
    }
    // add indicators
    console.log(src);
    let indicator =
        ` <li data-target="#carprofile" data-slide-to=${counter} class='${active}'></li>`;
    carusal_indicators.innerHTML += indicator;
    let x =

        `
     <div class="carousel-item ${active} role">
    <img class="d-block w-100"  src='api/cars/${src}' alt="First slide">
    </div>
    `


    // add images
    carusal.innerHTML += x;

    counter++;
}

async function getRelated(id, manufacturer) {
    let response = await fetch('http://localhost//CarRentingWebSite/api/cars/related.php?manufacturer=' + manufacturer + '&id=' + id);
    let data = await response.json();
    fillRelated(data);
}

const inner = document.querySelector("#related").children[0];

function related(data) {
    let active = 'active';
    var temp = inner.innerHTML;
    var text = '';
    for (var i = 0; i < data.length; i++) {
        text += createCardReltated(data[i].main_pic_path, data[i].manufacturer, data[i].model, data[i].description, data[i].car_id, data[i].dealing_type);
    }
    var y =
        `<div class="card-deck a w-75"> ${text} </div>`
    let item = ` <div class="carousel-item ${active}">
 ${y}
    </div> `

    inner.innerHTML = temp += item;
}

function createCardReltated(main_pic_path, manufacturer, model, description, car_id, dealing_type) {

    return ` <div class="card">
<div>
<span class='type'>${parseInt(dealing_type) ? 'Sell' : 'Rent'}</sapn>
</div>    <img class="card-img-top" src='api/cars/${main_pic_path}' alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">${manufacturer} | ${model}</h5>
        <p class="card-text">${description}.</p>
        <div class="container">
        <button class="btn"  onclick="window.location.href='carProfile.html?id=${car_id}'"><span>Explore</span></button>
        </div>
    </div>
    </div> `
}
let counter1 = 0;

function fillRelated(data) {


    for (var i = 0; i < 1; i++) {

        if (counter1 == 0) {
            related(data);
        } else {
            related('');
        }
        counter1++;
    }

}