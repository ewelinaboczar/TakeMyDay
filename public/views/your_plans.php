<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/selectable-bar.css">
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
                <a class="active" href="/your_plans">Your plans</a>
                <a class="notactive" href="/create_plan">Create plan</a>
            </div>
            <section class="specific-plans">
                <?php
                foreach ($your_plans as $plan) :
                    for ($r = 0; $r < count($counter); $r++) {
                        for ($j = 0; $j < 2; $j++) {
                            $count = $counter[$r][$j];
                        }
                    }
                    ?>
                    <a id="<?= $plan->getId(); ?>" class="yp" href="/day_plan/<?= $plan->getId(); ?>">
                        <img class="photo" src="/public/uploads/<?= $plan->getImage(); ?>">
                        <div class="heart">
                            <p><i class="fas fa-crown"></i></p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i><?= $plan->getCity(); ?></div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        <?= $plan->getCreatedBy(); ?>
                                    </div>
                                    <div><i class="fas fa-walking"></i><?= $count ?> steps</div>
                                    <div><i class="fas fa-route"></i><?= $plan->getMap(); ?></div>
                                    <div><i class="fas fa-calendar-check"></i><?= $plan->getDate(); ?></div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p><?= $plan->getLikes(); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>
        </main>
    </div>

</body>