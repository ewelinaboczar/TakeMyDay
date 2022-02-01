const heaartButtons = document.querySelector("#clickme");
const heartContainer = document.querySelector(".heart-fav");
const idContainer = document.querySelector(".img");
const deleteBtn = document.querySelector(".delete");
const divForAdmin = document.querySelector(".for_admin");
const id = idContainer.getAttribute("id");

function changeStats() {
    const fav = document.querySelector("#likes");

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

function ifAdmin() {
    const adm = divForAdmin.getAttribute("id");
    if (adm) {
        deleteBtn.style.display = "flex";
    } else {
        deleteBtn.style.display = "none";
    }
}

function setHeart() {
    if (parseInt(heartContainer.getAttribute("id")) === 0) {
        heaartButtons.setAttribute("class", "far fa-heart");
    } else {
        heaartButtons.setAttribute("class", "fas fa-heart");
    }
}


function deletePlan() {
    fetch(`/deletePlan/${id}`).then(function () {
    }).then(function (response) {
        return response.json();
    });
}


ifAdmin();
setHeart();
console.log(parseInt(heartContainer.getAttribute("id")));
heaartButtons.addEventListener("click", changeStats);
deleteBtn.addEventListener("click", deletePlan);



