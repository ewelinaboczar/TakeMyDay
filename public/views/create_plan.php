<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/selectable-bar.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <title>Your plans page</title>
</head>
<body>
<div class="home-container">
    <div class="top-photo">
        <div class="left">
            <a class="settings"><i class="fas fa-sliders-h"></i></a>
            <a class="log-out" href="../login"><i class="fas fa-sign-out-alt"></i></a>
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
            <div class="under-create">
                <p>
                    Create Your New Day Plan
                </p>
                <a class="start-button" href="add_plan">Let's start</a>
            </div>
        </main>
    </div>
</body>