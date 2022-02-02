<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/fav.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Favourite page</title>
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
                    <a class="active" href="/favourite/"><i class="fas fa-heart"></i><h>FAVOURITE</h></a>
                </li>
                <li>
                    <a class="notactive" href="/your_plans/"><i class="far fa-clock"></i><h>YOUR PLANS</h></a>
                </li>
                <li>
                    <a class="notactive" href="/account_details/"><i class="fas fa-user-circle"></i><h>ACCOUNT</h></a>
                </li>
            </ul>
        </nav>
        <main class="fav-bottom">
            <p>Your favourite day plans</p>
            <section class="fav">
                <?php $id = 1;
                foreach ($fav_plans as $plan) : ?>
                <a id="<?= $plan->getId(); ?>" href="day_plan/<?= $plan->getId(); ?>" >
                    <img src="/public/uploads/<?= $plan->getImage(); ?>">
                    <div class="plan-photograph">
                        <p><i class="fas fa-heart"></i></p>
                    </div>
                    <div class="description">
                        <div class="plan-informations">
                            <div>
                                <div><i class="fas fa-map-marker-alt"></i><?= $plan->getCity(); ?></div>
                                <div><i class="fas fa-clock"></i><?= $plan->getDate(); ?></div>
                                <div>
                                    <i class="fas fa-user"></i>
                                    <?= $plan->getCreatedBy(); ?>
                                </div>
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
</div>
</body>
</html>