const datetime = new Date().toLocaleTimeString();


function refreshTime() {
    document.getElementById("time").textContent = new Date().toLocaleTimeString();
}

setInterval(refreshTime, 1000);


let counter = 0;

class Milestone {
    cords;

    constructor(place, type, description) {
        this.place = place;
        this.type = type;
        this.description = description;
    }

    setTime(time) {
        this.time = time;
    }

    setCords(lon, lat) {
        let lo = String(lon);
        let la = String(lat)
        this.cords = new Array([lo, la]);
    }

    getPlace() {
        return this.place;
    }

    getDesc() {
        return this.description;
    }

    getType() {
        return this.type;
    }
}


const milestones = [];
const add = document.getElementById('add_btn');
const finish = document.getElementById('final-plan');
const number = document.getElementById('nb');
const milestoneContainer = document.querySelector('.add-plan');
const uploadPhoto = document.querySelector('.plan_photo_add');
const addPhotoBtn = document.querySelector('#accept_photo');
const acceptPlanBtn = document.querySelector('#accept_your_plan');
let val;

uploadPhoto.style.display = 'none';

add.addEventListener("click", function (event) {

    const place = document.getElementById('place_location').value;
    const locationType = document.getElementById("milestone_type").value;
    const description = document.getElementById("plan-description").value;
    let number_val = parseInt(document.getElementById('nb').innerText);
    const time = new Date().toLocaleTimeString();

    const milestone = new Milestone(place, locationType, description);

    if ((place === '') || (locationType === '')) {
        console.log('You have to enter something')
    } else {
        if (counter > 0) {
            const m2 = getMilestoneWithoutTime(milestones[counter - 1]);
            if (JSON.stringify(milestone) === JSON.stringify(m2)) {
                console.log('same milestones');
            } else {
                milestone.setTime(time);
                addMilestoneToArray(milestone);
                number.innerText = number_val + 1;
            }
        } else {
            milestone.setTime(time);
            addMilestoneToArray(milestone);
            number.innerText = number_val + 1;
        }
    }

});

function addMilestoneToArray(milestone) {
    milestones.push(milestone);
    counter += 1;
    console.log(milestones);
}

function getMilestoneWithoutTime(milestone) {
    return new Milestone(milestone.getPlace(), milestone.getType(), milestone.getDesc());
}

//Ta metoda nie działa tzn dziala ale nie mozna przekazac zadnych danych dalej.....
function locationTypeVerify(typemil) {
    const data = {type: typemil};
    fetch("/typeMilestones", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (types) {
        setOut(types)
    });

}


finish.addEventListener('click', function (event) {
    milestoneContainer.style.display = 'none';
    if (uploadPhoto.style.display === 'none') {
        uploadPhoto.style.display = 'flex';
    }
});


addPhotoBtn.addEventListener('click', function (event) {
    val = (document.querySelector('input[name="file"]')).value;
    if (acceptPlanBtn.style.display === 'none') {
        acceptPlanBtn.style.display = 'block';
    }
});


