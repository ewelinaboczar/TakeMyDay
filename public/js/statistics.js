const heaartButtons = document.querySelector("#clickme");
const heartContainer = document.querySelector(".heart-fav");
const idContainer = document.querySelector(".img");

function changeStats() {
    const fav = document.querySelector("#likes");
    const id = idContainer.getAttribute("id");

    if (parseInt(heartContainer.getAttribute('id')) === 0) {
        fetch(`/heart/${id}`)
            .then(function () {
                console.log(1);
                fav.innerHTML = parseInt(fav.innerHTML) + 1;
            });
        let k = 1;
        heaartButtons.setAttribute("class", "fas fa-heart");
        heartContainer.setAttribute("id", k);
    } else {
        fetch(`/unheart/${id}`)
            .then(function () {
                console.log(0);
                fav.innerHTML = parseInt(fav.innerHTML) - 1;
            });
        let k = 0;
        heaartButtons.setAttribute("class", "far fa-heart");
        heartContainer.setAttribute("id", k);
    }
}

console.log(parseInt(heartContainer.getAttribute("id")));
if (parseInt(heartContainer.getAttribute("id")) === 0) {
    heaartButtons.setAttribute("class", "far fa-heart");
} else {
    heaartButtons.setAttribute("class", "fas fa-heart");
}

heaartButtons.addEventListener("click", changeStats);



