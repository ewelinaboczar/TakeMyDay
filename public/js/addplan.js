const datetime = new Date().toLocaleTimeString();


function refreshTime() {
    document.getElementById("time").textContent = new Date().toLocaleTimeString();
}
setInterval(refreshTime, 1000);


let counter = 0;

class Milestone {
    cords=new Array(2);
    constructor(place, type, description) {
        this.place = place;
        this.type = type;
        this.description = description;
    }

    setTime(time) {
        this.time = time;
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


const milestones = new Array(Milestone);

function saveMilestone(){
    const place = document.getElementById('place_location').value;
    const locationType = document.getElementById("milestone_type").value;
    const description = document.getElementById("plan-description").value;
    const time = new Date().toLocaleTimeString();

    const milestone = new Milestone(place, locationType, description);

    console.log(locationTypeVerify(locationType));

    if((place === '') || (locationType === '') || (description === '')){
        console.log('You have to enter something')
    }else if(locationTypeVerify(locationType)){
        if(counter > 0){
            const m2 = getMilestoneWithoutTime(milestones[counter - 1]);
            if(JSON.stringify(milestone) === JSON.stringify(m2)){
                console.log('same milestones');
            }else{
                milestone.setTime(time);
                addMilestoneToArray(milestone);
            }
        }else{
            milestone.setTime(time);
            addMilestoneToArray(milestone);
        }
    }

}
function addMilestoneToArray(milestone){
    milestones.push(milestone);
    counter += 1;
    console.log(milestones);
}
function getMilestoneWithoutTime(milestone){
    return new Milestone(milestone.getPlace(), milestone.getType(), milestone.getDesc());
}

function locationTypeVerify(typemil){
    const data = {type: typemil};
    let res;
    if(typemil !== ''){
        fetch("/typeMilestones", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(response =>
            response.json()
        ).then(result =>{
            console.log(result);
            res = result;
        }
        );
    }
    console.log(res);
    return res;
}

function saveDayPlan(){
    console.log(JSON.stringify(milestones));
}