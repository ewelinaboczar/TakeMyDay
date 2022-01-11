<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/selectable-bar.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <title>Account</title>
</head>
<body>
<div class="home-container">
    <?php include 'top-photo.php'; ?>
    <?php include 'user_by_cookie.php';?>
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
                    <a class="notactive" href="your_plans"><i class="far fa-clock"></i>YOUR PLANS</a>
                </li>
                <li>
                    <a class="active" href="account_details"><i class="fas fa-user-circle"></i>ACCOUNT</a>
                </li>
            </ul>
        </nav>
        <main class="your-plans-bottom">
            <div class="selectable-bar">
                <a class="active" href="account_details">Account Details</a>
                <a class="notactive" href="change_account_details">Change Details</a>
                <a class="notactive" href="change_password">Change Password</a>
            </div>
            <section class="account">
                <p>Personal Information</p>
                <div class="box-informations">
                    <div class="changing-photo">
                        <div class="photo">
                            <img src="/public/uploads/<?= $details->getUserPhoto() ?>">
                        </div>
                    </div>
                    <div class="personal-details">
                        <div>
                            <p>nick:</p>
                            <div class="bg">
                                <p><?= $nick ?></p>
                            </div>
                        </div>
                        <div>
                            <p>name:</p>
                            <div class="bg">
                                <p><?= $details->getName() ?></p>
                            </div>
                        </div>
                        <div>
                            <p>surname:</p>
                            <div class="bg">
                                <p><?= $details->getSurname() ?></p>
                            </div>
                        </div>
                        <div>
                            <p>country:</p>
                            <div class="bg">
                                <p>country</p>
                            </div>
                        </div>
                        <div>
                            <p>date of birth:</p>
                            <div class="bg">
                                <p>date of birth</p>
                            </div>
                        </div>
                        <div>
                            <p>email:</p>
                            <div class="bg">
                                <p><?= $details->getEmail() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
