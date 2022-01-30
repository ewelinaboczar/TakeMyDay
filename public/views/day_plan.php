<!DOCTYPE html>
<head>
    <meta charset='utf-8'/>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/day-plan.css">
    <link rel="stylesheet" type="text/css" href="/public/css/map.css">

    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/map.js" defer></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet'/>
    <title>Day plan page</title>
</head>
<body>
<div class="home-container">
    <?php include 'top-photo.php'; ?>
    <div class="bottom">
        <nav id="menu">
            <ul>
                <li>
                    <a class="notactive" href="/home"><i class="fas fa-home"></i>HOME</a>
                </li>
                <li>
                    <a class="active" href="/discover"><i class="fas fa-map-marked-alt"></i>DISCOVER</a>
                </li>
                <li>
                    <a class="notactive" href="/favourite"><i class="fas fa-heart"></i>FAVOURITE</a>
                </li>
                <li>
                    <a class="notactive" href="/your_plans"><i class="far fa-clock"></i>YOUR PLANS</a>
                </li>
                <li>
                    <a class="notactive" href="/account_details"><i class="fas fa-user-circle"></i>ACCOUNT</a>
                </li>
            </ul>
        </nav>
        <main class="discover-bottom" id="dp">
            <div>
                <div id="day_plan">
                    <div id="img">
                        <img src="/public/uploads/<?= $plan->getImage(); ?>">
                        <div id="heart-fav">
                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                    <div id="details">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <div id="location"><?= $plan->getCity(); ?></div>
                        </div>
                        <div>
                            <i class="fas fa-calendar-check"></i>
                            <div id="date"><?= $plan->getDate(); ?></div>
                        </div>
                        <div>
                            <i class="fas fa-clock"></i>
                            <div id="time">time</div>
                        </div>
                        <div>
                            <i class="fas fa-comment"></i>
                            <div id="comments"><?= $plan->getComments(); ?></div>
                        </div>
                        <div>
                            <i class="fas fa-user"></i>
                            <div id="nick"><?= $plan->getCreatedBy(); ?></div>
                        </div>
                        <div>
                            <i class="fas fa-walking"></i>
                            <div id="milestones_count">6 day steps</div>
                        </div>
                        <div>
                            <i class="fas fa-route"></i>
                            <div id="mapps"><?= $plan->getMap(); ?></div>
                        </div>
                        <div>
                            <i class="fas fa-heart"></i>
                            <div id="likes"><?= $plan->getLikes(); ?></div>
                        </div>
                    </div>
                    <div class="map-container">
                        <p id="tittle">MAP</p>
                        <div id='map'></div>
                    </div>
                </div>
                <div id="milestones">
                    <p id="tittle">DAY PLAN</p>
                    <div id="bg-color">
                        <div id="zero">
                            <p>0.</p>
                            <div>
                                <i class="fas fa-map-marker-alt"></i>
                                <div><?= $city_country[0] ?>, <?= $city_country[1] ?></div>
                            </div>
                        </div>
                        <br>
                        <div class="milest-info">
                            <?php $i = 1;
                            foreach ($milestones

                                     as $m) : ?>
                                <div>
                                    <div id="milestone-number">
                                        <p><?= $i ?>.</p>
                                    </div>
                                    <div id="milestones-details">
                                        <div>
                                            <div>
                                                <i class="far fa-clock"></i>
                                                <div><?= $m->getMilestoneTime() ?></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-utensils"></i>
                                                <div><?= $m->getMilestoneLocation() ?></div>
                                            </div>
                                            <div>
                                                <i class="far fa-file-alt"></i>
                                                <div><?= $m->getMilestoneDescription() ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php $i += 1; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>


