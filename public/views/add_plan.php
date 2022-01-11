<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/selectable-bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add-plan.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Your plans page</title>
</head>
<body>
<div class="home-container">
    <?php include 'top-photo.php'; ?>
    <div class="bottom">
        <nav id="menu">
            <ul>
                <li>
                    <a class="notactive" href="home"><i class="fas fa-home"></i>HOME</a>
                </li>
                <li>
                    <a class="notactive" href="discover"><i class="fas fa-map-marked-alt"></i>DISCOVER</a>
                </li>
                <li>
                    <a class="notactive" href="favourite"><i class="fas fa-heart"></i>FAVOURITE</a>
                </li>
                <li>
                    <a class="active" href="your_plans"><i class="far fa-clock"></i>YOUR PLANS</a>
                </li>
                <li>
                    <a class="notactive" href="account_details"><i class="fas fa-user-circle"></i>ACCOUNT</a>
                </li>
            </ul>
        </nav>
        <main class="your-plans-bottom">
            <div class="selectable-bar">
                <a class="notactive" href="your_plans">Your plans</a>
                <a class="active" href="create_plan">Create plan</a>
            </div>
            <section class="add-plan">
                <div class="milestone-number">
                    <p>1</p>
                </div>
                <form class="component">
                    <div class="loc">
                        Location:
                        <input name="location" type="text">
                    </div>
                    <div class="type">
                        Location type:
                        <input name="location-type" type="text">
                    </div>
                    <div class="des">
                        Description:
                        <input name="plan-description" type="text">
                    </div>
                    <div class="buttons">
                        <p>Time:   <span id="time"></span></p>
                        <div>
                            <a class="add"><i class="fas fa-plus"></i></a>
                            <a class="finish">Finish</a>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>

<script>
    const datetime = new Date().toLocaleTimeString();

    function refreshTime() {
        const datetime = new Date().toLocaleTimeString();
        console.log(datetime);
        document.getElementById("time").textContent = datetime;
    }
    setInterval(refreshTime, 1000);

</script>