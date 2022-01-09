<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/results.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Discover_results page</title>
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
                    <a class="active" href="discover"><i class="fas fa-map-marked-alt"></i>DISCOVER</a>
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
            <div class="selectable-bar">
                <form action="/discover_results.php">
                    <label for="city">
                        <select name="city" id="city" size="1">
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                            <option value="miasto">Miasto</option>
                        </select>
                    </label>
                    <br><br>
                    <label for="date"><input name="date" type="date"></label>
                    <br><br>
                    <label for="time"><input name="time" type="time"></label>
                    <br><br>
                    <input class="submit" type="submit" value="OK">
                </form>
            </div>
            <div class="under">
                <div class="filters">
                    <i class="fas fa-filter"></i>
                    <p>Filters</p>
                    <a class="up">popularity</a>
                    <a class="up">date</a>
                    <a class="up">comments</a>
                </div>

            </div>
        </main>
    </div>
</div>
</body>