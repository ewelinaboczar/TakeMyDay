<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/plans-home.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>Discover page</title>
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
                    <a class="active" href=""><i class="fas fa-map-marked-alt"></i>DISCOVER</a>
                </li>
                <li>
                    <a class="notactive" href="favourite"><i class="fas fa-heart"></i>FAVOURITE</a>
                </li>
                <li>
                    <a class="notactive" href="your_plans"><i class="far fa-clock"></i>YOUR PLANS</a>
                </li>
                <li>
                    <a class="notactive" href="account_details"><i class="fas fa-user-circle"></i>ACCOUNT</a>
                </li>
            </ul>
        </nav>
        <main class="discover-bottom">
            <div class="selectable-bar" id="discover-bar">
                <label for="city">
                    <input list="browsers" name="browser" id="browser" placeholder="City..">
                        <datalist id="browsers" >
                            <?php foreach($city as $key): ?>
                                <option id="city" value="<?=$key['city_name']?>"></option>
                            <?php endforeach; ?>
                        </datalist>
                </label>
            </div>
            <div class="under" id="plan-result">
                <p>
                    Find your best day plan
                </p>
                <a href="#" class="uselocation"><i class="fas fa-map-pin"></i>Use your location</a>
            </div>
        </main>
    </div>
</div>
</body>

<template id="plan-template">
    <a id="" class="templ-a">
        <img src="">
        <div class="plan-photograph" >
            <p><i class="far fa-heart"></i></p>
        </div>
        <div class="description">
            <div class="plan-informations" id="plan-temp">
                <div>
                    <div>
                        <i class="fas fa-map-marker-alt"></i>
                        <div id="location"></div>
                    </div>
                    <div>
                        <i class="fas fa-calendar-check"></i>
                        <div id="date"></div>
                    </div>
                    <div>
                        <i class="fas fa-clock"></i>
                        <div id="time">time</div>
                    </div>
                    <div>
                        <i class="fas fa-comment"></i>
                        <div id="comments"></div>
                    </div>
                    <div>
                        <i class="fas fa-user"></i>
                        <div id="nick"></div>
                    </div>
                    <div>
                        <i class="fas fa-walking"></i>
                        <div id="milestones">6 milestones of the day</div>
                    </div>
                    <div>
                        <i class="fas fa-route"></i>
                        <div id="map">notavailable</div>
                    </div>
                    <div>
                        <i class="fas fa-heart"></i>
                        <div id="likes">0</div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</template>

