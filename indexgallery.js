const gallery_cloursal = document.querySelector("#gallery");
const gallery_cloursal_children = gallery_cloursal.children;
const gallery_indicators = gallery_cloursal_children[0];
const carousel_inner_gallery = gallery_cloursal.children[1];

async function getRandomCars() {
    let response = await fetch('http://localhost//CarRentingWebSite/api/cars/indexGallery.php');
    let data = await response.json();
    addNewPanelOfCards(data);
}
getRandomCars();

function createPanel() {
    let item = document.createElement('div');
    item.classList.add('carousel-item');
    if (carousel_inner_gallery.children.length == 0) {
        item.classList.add('active');
    }

    let cards = document.createElement('div');
    cards.classList.add('cards');
    item.appendChild(cards);
    carousel_inner_gallery.appendChild(item);


}






function addNewPanelOfCards(data) {
    // change it to number
    let temp = data.length;
    let roll = 3;
    let j = 0;
    for (var i = 0; i < Math.ceil(data.length / 3); i++) {
        createPanel();
        let item = carousel_inner_gallery.children[i].children;
        console.log(item);
        let cards = item[0];
        console.log(cards);
        let text = cards.innerHTML

        for (; j < temp; j++) {
            if (j % roll == 0 && j != 0) {
                break;
            } else {
                text += createCardIndexGallery(data[j].main_pic_path, data[j].manufacturer, data[j].description, data[j].model, data[j].car_id, data[j].cost, data[j].dealing_type);
                cards.innerHTML = text;
            }


        }

        roll += 3;

    }
}



var counter = 0;


function createCardIndexGallery(main_pic_path, manufacturer, description, model, car_id, cost, dealing_type) {
    let card =
        ` <div class="card">

        <div class="card-image"><img src="api/cars/${main_pic_path}" alt="">      <div>
        <span class='type'>${parseInt(dealing_type) ? 'Sell' : 'Rent'}</sapn>
        </div>
        </div>
    <div class="card-text">
        <h2>${manufacturer} | ${model}</h2>
        <span style="color:gold; text-align:center;font-weight:bold;font-size:1.2rem;">${cost}$</span>

        <p>${description}</p>
    </div>
    <div class="card-stats">
        <div class="button_container">
        <button class="btn"  onclick="window.location.href='carProfile.html?id=${car_id}'"><span>Explore</span></button>
        </div>
    </div>

</div>`

    return card;
}