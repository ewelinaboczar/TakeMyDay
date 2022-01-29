const search = document.querySelector('input[name="browser"]');
const planContainer = document.querySelector('.under');

search.addEventListener("keyup", function (event){
    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function (plans){
            planContainer.innerHTML = "";
            loadPlans(plans)
        });
    }
});

function loadPlans(plans){
    plans.forEach(plan =>{
        console.log(plan);
        createPlan(plan);
    });
}

function createPlan(plan) {
    const template = document.querySelector("#plan-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${plan.image}`;
    const location = clone.querySelector("#location");
    location.innerHTML = plan.city_name;
    const date = clone.querySelector("#date");
    date.innerHTML = plan.date_added;
    const comments = clone.querySelector("#comments");
    comments.innerHTML = plan.comments;
    const nick = clone.querySelector("#nick");
    nick.innerHTML = plan.nick;
    const likes = clone.querySelector("#likes");
    likes.innerHTML = plan.likes;
    const time = clone.querySelector("#time");
    time.innerHTML = plan.start_time;
    const milestones = clone.querySelector("#milestones");
    milestones.innerHTML = plan.count;
    const map = clone.querySelector("#map");
    if(plan.map === false){
        plan.map = 'not avaliable'
    }else{
        plan.map = 'avaliable'
    }
    map.innerHTML = plan.map;

    planContainer.appendChild(clone);
}