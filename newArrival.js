const new_arrival = document.querySelector(".new-arrival");
const new_arrival_cards = new_arrival.children[1];


async function getTop3() {
    let response = await fetch('http://localhost//CarRentingWebSite/api/cars/top3.php');
    let data = await response.json();
    addNewArrivalItems(data)
}
getTop3();

function addNewArrivalItems(data) {

    let cards = new_arrival_cards;
    let text = cards.innerHTML;
    for (car of data) {
        text += createCard(car.main_pic_path, car.manufacturer, car.description, car.model, car.car_id, car.cost, car.dealing_type);
    }

    cards.innerHTML = text;

}


var counter = 0;

function addIndicators() {
    var text = gallery_indicators.innerHTML;
    text += ` <li data-target='#gallery' data-slide-to=${counter} class="active"></li>`
    counter++;
    gallery_indicators.innerHTML = text;


}


function createCard(main_pic_path, manufacturer, description, model, car_id, cost, dealing_type) {
    let card =
        `
    <div class="card" style = 'margin-left:  2rem;margin-right:  2rem;'>
    <div class="card-image"><img src="api/cars/${main_pic_path}" alt="">  
     <span class='type'>${parseInt(dealing_type)?'Sell':'Rent'}</sapn>
    </div>
    <div class="card-text">
    <h2>${manufacturer} | ${model}</h2>
    <span style="color:gold; text-align:center;font-weight:bold;font-size:1.2rem;">${cost}$</span>
    <p>${description}</p>
    </div>
    <div class="card-stats">
    <div class="button_container">
    <a><button class="btn" onclick="window.location.href='carProfile.html?id=${car_id}'"><span>Explore</span></button> </a>        </div>
    </div>
    </div>`

    return card;
}