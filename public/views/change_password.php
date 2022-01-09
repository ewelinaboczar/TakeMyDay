<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/selectable-bar.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Account</title>
</head>
<body>
<div class="home-container">
    <div class="top-photo">
        <div class="left">
            <a class="settings"><i class="fas fa-sliders-h"></i></a>
            <form id="submit" action="logout" method="get">
                <a class="log-out" onclick="submit()" ><i class="fas fa-sign-out-alt"></i></a>
            </form>
        </div>
        <div class="right">
            <div class="logo-home">
                <img src="/public/img/logo.svg">
            </div>
            <div class="person">
                <div>Hi, <? echo $_COOKIE['nick']?> </div>
                <div>
                    <img src="/public/img/osoba.svg">
                </div>
            </div>
        </div>
    </div>
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
                <a class="notactive" href="account_details">Account Details</a>
                <a class="active" href="change_password">Change Password</a>
            </div>
            <section class="account">
                <p>Change Password</p>
                <div class="box-informations">
                    <div class="personal-details">
                        <div>
                            <p>old password:</p>
                            <input name="old_password" type="password">
                        </div>
                        <div>
                            <p>new password:</p>
                            <input name="new_password" type="password">
                        </div>
                        <div>
                            <p>confirm password:</p>
                            <input name="confirmed_password" type="password">
                        </div>
                        <a class="save_changes">Change Password</a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
