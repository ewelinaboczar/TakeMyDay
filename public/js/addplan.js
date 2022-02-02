const datetime = new Date().toLocaleTimeString();
const createNewDayPlanBtn = document.querySelector('.start-button');
const endDiv = document.querySelector('.accept-div');
const buttonsDiv = document.querySelector('.buttonsss');
const startBtnDiv = document.querySelector('.create-new-plan-div');
const formContainer = document.querySelector('.component');
let counter = 0;

function showNewFormDiv() {
    console.log('jestem w shownewform');
    startBtnDiv.style.display = "none";

    const template = document.querySelector("#template");
    const clone = template.content.cloneNode(true);
    formContainer.appendChild(clone);

    const numbers = document.querySelectorAll("#nb");
    const divs = document.querySelectorAll(".form_step");
    const locs = document.querySelectorAll(".loc");

    const timers = document.querySelectorAll("#timer");
    const timer = timers[counter];

    function refreshTime() {
        timer.innerText = new Date().toLocaleTimeString();
    }

    setInterval(refreshTime, 1000);

    if (counter > 0) {
        console.log('jestem w ifie');

        const number = numbers[counter];
        const divNext = divs[counter];
        const divCity = locs[counter];
        divCity.style.display = "none";
        divNext.style.opacity = "1";
        number.innerText = counter + 1;
    }

    const addBtnsClone = document.querySelectorAll('.add');
    const finishBtnsClone = document.querySelectorAll('.final-plan');

    function addNewDiv() {
        const city = document.querySelector('#cities').value;
        const time = document.querySelectorAll('#plan-time');
        const location = document.querySelectorAll('#place_location');
        const type = document.querySelectorAll('#milestone_types');
        const descriptions = document.querySelectorAll('#plan-description');

        const t = time[counter].value;
        const l = location[counter].value;
        const typ = type[counter].value;

        descriptions[counter].setAttribute("name","plan-description"+counter);
        time[counter].setAttribute("name","plan-time"+counter);
        type[counter].setAttribute("name","milestone_type"+counter);
        location[counter].setAttribute("name","place_location"+counter);

        console.log(t,l,typ,city);

        if (checkIfIsNull(t, l, typ, city)) {
            const divv = divs[counter];
            console.log(divv);
            console.log('jestem w addnewdiv');
            divv.style.left = "-100vw";
            divv.style.opacity = "0";
            counter++;
            showNewFormDiv();
        }


    }

    function acceptPlan() {
        const divv = divs[counter];
        console.log(divv);
        const time = document.querySelectorAll('#plan-time');
        const location = document.querySelectorAll('#place_location');
        const type = document.querySelectorAll('#milestone_types');
        const city = document.querySelector('#cities').value;
        const typ = type[counter].value;
        const t2 = time[counter].value;
        const l2 = location[counter].value;

        if (checkIfIsNull(t2, l2, typ, city)){
            const descriptions = document.querySelectorAll('#plan-description');
            console.log('jestem w accept plan');
            divv.style.left = "-100vw";
            divv.style.opacity = "0";
            const template1 = document.querySelector("#accept-plan");
            const clone1 = template1.content.cloneNode(true);
            formContainer.appendChild(clone1);

            const numbersSteps = document.querySelector('.numbers-of-steps');
            numbersSteps.innerText = 'You have ' + (counter + 1) + ' steps to a daily plan';

            const saveBtn = document.querySelector('.save');
            saveBtn.addEventListener("click", checkIfEverythingIsOkay);
        }
        const inputFile = document.querySelector('.file');

        function checkIfEverythingIsOkay() {
            if (inputFile.value !== '') {
                console.log('jestem w checkIfEverythingIsOkay');
                const divv2 = document.querySelector(".accept");
                divv2.style.left = "-100vw";
                divv2.style.opacity = "0";

                endDiv.style.left = "0";
                endDiv.style.opacity = "1";
                buttonsDiv.style.left = "0";
                buttonsDiv.style.opacity = "1";

                const img = (document.querySelector('.file').value).substr(12);
                const descriptions = document.querySelectorAll('#plan-description');

                for (let i = 0; i < counter + 1; i++) {
                    const t2 = time[i].value;
                    const l2 = location[i].value;
                    const desc = descriptions[i].value;

                    const milestoneContainer = document.querySelector('.milest-info');
                    const template3 = document.querySelector(".milestone");
                    const clone3 = template3.content.cloneNode(true);
                    milestoneContainer.appendChild(clone3);

                    const mtime = document.querySelectorAll('.mt');
                    const mlocation = document.querySelectorAll('.ml');
                    const mdescriptions = document.querySelectorAll('.md');
                    const mn = document.querySelectorAll('.mn');

                    mtime[i].innerText = t2;
                    mlocation[i].innerText = l2;
                    mdescriptions[i].innerText = desc;
                    mn[i].innerText = i + 1 + '.';

                }
                const dpimg = document.querySelector('.imgg');
                const dploc = document.querySelector('.cos');
                const dpcity = document.querySelector('#location');
                const dpdate = document.querySelector('#date');
                const dpmiles_count = document.querySelector('#milestones_count');

                const steps = counter + 1;
                formContainer.setAttribute("action","add_plan/"+steps);

                dpimg.setAttribute("src", img);
                dpcity.innerText = city;
                const now = new Date();
                dpdate.innerText = `${now.getDate()}.${now.getMonth() + 1}.${now.getFullYear()}`;

                dpmiles_count.innerText = steps + ' steps';
                dploc.innerHTML = city;

            } else {
                alert("Please upload photo");
            }
        }
    }

    addBtnsClone.forEach((btn) =>
        btn.addEventListener("click", addNewDiv)
    );

    finishBtnsClone.forEach((btn) =>
        btn.addEventListener("click", acceptPlan)
    );

}

function checkIfIsNull(t, l, typ, city) {
    if (counter === 0) {
        if ((t !== '') && (l !== '') && (typ !== '') && (city !== '')) {
            return true;
        } else {
            alert('You need to complete city, location, location type and time!');
        }
    } else {
        if ((t !== '') && (l !== '') && (typ !== '')) {
            return true;
        } else {
            alert('You need to complete location, location type and time!');
        }
    }
}


buttonsDiv.style.left = "-100vw";
buttonsDiv.style.opacity = "0";
endDiv.style.left = "-100vw";
endDiv.style.opacity = "0";
createNewDayPlanBtn.addEventListener("click", showNewFormDiv);
