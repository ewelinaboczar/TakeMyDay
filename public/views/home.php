<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/plans-home.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/gotoclickedplan.js" defer></script>
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <title>Home page</title>
</head>

<body>
<div class="home-container">
    <?php include 'top-photo.php'; ?>
    <div class="bottom">
        <nav>
            <ul>
                <li>
                    <a class="active" href="/home"><i class="fas fa-home"></i><h>HOME</h></a>
                </li>
                <li>
                    <a class="notactive" href="/discover"><i class="fas fa-map-marked-alt"></i><h>DISCOVER</h></a>
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
        <main class="home-bottom">
            <div class="left">
                <p class="txt1">The most popular plans for the day</p>
                <p class="txt2">TOP 10 in Poland</p>
                <section class="plans-home">
                    <?php $id = 1;
                    foreach ($planspl as $plan) {
                    ?>
                    <a id="<?= $plan->getId(); ?>" class="idplan" href="/day_plan/<?= $plan->getId(); ?>">
                        <img src="/public/uploads/<?= $plan->getImage(); ?>">
                        <div class="plan-photograph" >
                            <p><?php echo $id; $id+=1; ?></p>
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
                                    <div>
                                        <i class="fas fa-heart"></i>
                                        <?= $plan->getLikes(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php if($id == 11){break;}}?>
                </section>
            </div>
            <div class="right">
                <div class="counter">
                    <div class="left">
                        <p>Day plans made:</p>
                        <div class="number"><?php echo $plansCounter; ?></div>
                    </div>
                    <div class="right">
                        <p>Cities with plans:</p>
                        <div class="number"><?php echo $citiesCounter; ?></div>
                    </div>
                </div>
                <p class="txt2">TOP 10 Viral</p>
                <section class="plans-home">
                    <?php $id = 1;
                    foreach ($plansvir as $plan) { ?>
                        <a id="<?= $plan->getId(); ?>" class="idplan" href="day_plan/<?= $plan->getId(); ?>">
                            <img src="/public/uploads/<?= $plan->getImage(); ?>">
                            <div class="plan-photograph">
                                <p><?php echo $id;
                                    $id += 1; ?></p>
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
                                        <div>
                                            <i class="fas fa-heart"></i>
                                            <?= $plan->getLikes(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php if ($id == 11) {
                            break;
                        }
                    } ?>
                </section>
            </div>
        </main>
    </div>
</div>
</body>

