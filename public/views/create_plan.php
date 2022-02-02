<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/selectable-bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add-plan.css">
    <link rel="stylesheet" type="text/css" href="/public/css/day-plan.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/addplan.js" defer></script>
    <title>Create new plan</title>
</head>
<body>
<div class="home-container">
    <?php include 'top-photo.php'; ?>
    <div class="bottom">
        <nav id="menu">
            <ul>
                <li>
                    <a class="notactive" href="/home/"><i class="fas fa-home"></i><h>HOME</h></a>
                </li>
                <li>
                    <a class="notactive" href="/discover/"><i class="fas fa-map-marked-alt"></i><h>DISCOVER</h></a>
                </li>
                <li>
                    <a class="notactive" href="/favourite/"><i class="fas fa-heart"></i><h>FAVOURITE</h></a>
                </li>
                <li>
                    <a class="active" href="/your_plans/"><i class="far fa-clock"></i><h>YOUR PLANS</h></a>
                </li>
                <li>
                    <a class="notactive" href="/account_details/"><i class="fas fa-user-circle"></i><h>ACCOUNT</h></a>
                </li>
            </ul>
        </nav>
        <main class="your-plans-bottom">
            <div class="selectable-bar">
                <a class="notactive" href="/your_plans">Your plans</a>
                <a class="active" href="/create_plan">Create plan</a>
            </div>
            <div class="under-create">
                <div class="create-new-plan-div">
                    <p>
                        Create Your New Day Plan
                    </p>
                    <a class="start-button">Create new Day Plan</a>
                </div>
                <section class="add-plan">
                    <form class="component" id="milestone-form" action="/add_plan/" method="post"
                          enctype="multipart/form-data">
                        <div class="accept-div">
                            <p>Accept your plan</p>
                            <div class="plan-to-accept">
                                <div>
                                    <div id="day_plan">
                                        <div class="img" id="">
                                            <img class="imgg" src="/public/uploads/">
                                        </div>
                                        <div id="details">
                                            <div>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <div id="location"></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-calendar-check"></i>
                                                <div id="date"></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-user"></i>
                                                <div id="nick"><?= $nick ?></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-walking"></i>
                                                <div id="milestones_count"></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-route"></i>
                                                <div id="mapps">not avaliable</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="milestones">
                                        <p id="tittle">DAY PLAN</p>
                                        <div id="bg-color">
                                            <div>
                                                <div id="zero" class="zero">
                                                    <p class="n0">0.</p>
                                                    <div>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <div class="cos"></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="milest-info">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttonsss">
                            <button type="reset">Reset Day Plan!</button>
                            <button type="submit">Save Day Plan!</button>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </div>
</div>
</body>

<template id="template">
    <div id="form_step" class="form_step">
        <div class="milestone-number">
            <p id="nb">1</p>
        </div>
        <div id="form_inputs">
            <div class="new_milestone">
                <div class="loc">City:
                    <select id="cities" name="city" size="1">
                        <?php foreach ($cities as $key): ?>
                            <option
                                    value="<?= $key['city_name'] ?>"><?= $key['city_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="place">Location:
                    <input name="place_location" id="place_location" type="text"
                           placeholder="McDonald, Szewska 2, 31-009 Kraków..." required>
                </div>
                <div class="type">Location type:
                    <select id="milestone_types" name="milestone_type" size="1">
                        <?php foreach ($milestone_type as $k): ?>
                            <option
                                    value="<?= $k['milestone_type'] ?>"><?= $k['milestone_type'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="des">Description:
                    <input id="plan-description" name="plan-description" type="text"
                           placeholder="It was really delicious burger...">
                </div>
                <div class="tim">Time:
                    <input id="plan-time" name="plan-time" type="time"
                           placeholder="8:00...">
                </div>
                <div id="cords">
                </div>
            </div>
            <div class="buttons">
                <p id="timerr">Time: <span id="timer"></span></p>
                <div>
                    <a class="add" id="add_btn"><i class="fas fa-plus" aria-disabled="false"></i></a>
                    <a class="final-plan" id="final-plan"">Final Plan</a>
                </div>
            </div>
        </div>
    </div>
</template>

<template id="accept-plan">
    <div class="accept">
        <p class="numbers-of-steps">You have ... steps to a daily plan</p>
        <div class="new-photo">
            <p>Please upload your photo to your daily plan</p>
            <p class="info"></p>
            <input class="file" type="file" name="file" accept="image/jpg,image/png,image/jpeg">
            <a class="save">Save Photo</a>
        </div>
    </div>
</template>

<template class="milestone">
    <div>
        <div id="milestone-number">
            <p class="mn"></p>
        </div>
        <div id="milestones-details">
            <div>
                <div>
                    <i class="far fa-clock"></i>
                    <div class="mt"></div>
                </div>
                <div>
                    <i class="fas fa-utensils"></i>
                    <div class="ml"></div>
                </div>
                <div>
                    <i class="far fa-file-alt"></i>
                    <div class="md"></div>
                </div>
            </div>
        </div>
    </div>
</template>

