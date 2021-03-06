<!DOCTYPE html>
<head>
    <meta charset='utf-8'/>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/day-plan.css">
    <link rel="stylesheet" type="text/css" href="/public/css/map.css">

    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../public/js/script.js" defer></script>
    <script type="text/javascript" src="../public/js/map.js" defer></script>
    <script type="text/javascript" src="../public/js/statistics.js" defer></script>
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
                    <a class="notactive" href="/home"><i class="fas fa-home"></i><h>HOME</h></a>
                </li>
                <li>
                    <a class="active" href="/discover"><i class="fas fa-map-marked-alt"></i><h>DISCOVER</h></a>
                </li>
                <li>
                    <a class="notactive" href="/favourite"><i class="fas fa-heart"></i><h>FAVORITE</h></a>
                </li>
                <li>
                    <a class="notactive" href="/your_plans"><i class="far fa-clock"></i><h>YOUR PLANS</h></a>
                </li>
                <li>
                    <a class="notactive" href="/account_details"><i class="fas fa-user-circle"></i><h>ACCOUNT</h></a>
                </li>
            </ul>
        </nav>
        <main class="discover-bottom" id="dp">
            <div>
                <?php $fav = 0;
                if ($isFav) {
                    $fav = 1;
                } else {
                    $fav = 0;
                } ?>
                <div id="day_plan">
                    <div class="img" id="<?= $plan->getId(); ?>">
                        <img src="/public/uploads/<?= $plan->getImage(); ?>">
                        <div class="heart-fav" id="<?= $fav ?>">
                            <i class="far fa-heart" id="clickme"></i>
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
                            <i class="fas fa-user"></i>
                            <div id="nick"><?= $plan->getCreatedBy(); ?></div>
                        </div>
                        <div>
                            <i class="fas fa-walking"></i>
                            <div id="milestones_count"><?= $milestones_counter ?> steps</div>
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
                    <div class="for_admin" id="<?= $admin ?>">
                        <button class="delete">delete plan</button>
                    </div>
                </div>
                <div id="milestones">
                    <p id="tittle">DAY PLAN</p>
                    <div id="bg-color">
                        <div>
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
            </div>
            <div class="map-container">
                <p id="tittle">MAP</p>
                <div id='map'></div>
            </div>
        </main>
    </div>
</div>
</body>


