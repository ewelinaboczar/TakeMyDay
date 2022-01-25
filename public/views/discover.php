<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Discover page</title>
</head>
<body>
<div class="home-container">
    <?php include 'top-photo.php'; ?>
    <div class="bottom">
        <nav id="menu">
            <ul>
                <li>
                    <a class="notactive" href="home"><i class="fas fa-home"></i>HOME</a>
                </li>
                <li>
                    <a class="active" href=""><i class="fas fa-map-marked-alt"></i>DISCOVER</a>
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
                <form action="/discover_results">
                    <label for="city">
                        <select name="city" id="city" size="1">
                            <?php foreach($countries as $key): ?>
                                <option value="miasto"><?=$key['country_name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <br><br>
                    <input class="submit" type="submit" value="OK">
                </form>
            </div>
            <div class="under">
                <p>
                    Find your best day plan
                </p>
                <a href="#"><i class="fas fa-map-pin"></i>Use your location</a>
            </div>
        </main>
    </div>
</div>
</body>
