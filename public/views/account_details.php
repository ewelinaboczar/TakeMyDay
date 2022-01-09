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
                <a class="active" href="account_details">Account Details</a>
                <a class="notactive" href="change_password">Change Password</a>
            </div>
            <section class="account">
                <p>Personal Information</p>
                <div class="box-informations">
                    <div class="changing-photo">
                        <div class="photo">
                            <img src="/public/img/osoba.svg">
                        </div>
                        <div class="button">
                            <form id="submit" action="addphoto" method="post" enctype="multipart/form-data">
                                <div class="messages">
                                    <?php if(isset($messages)){
                                        foreach ($messages as $message ){
                                            echo $message;
                                        }
                                    }
                                    ?>
                                </div>
                                <input type="file" name="file">
                                <a onclick="submit()">save photo</a>
                            </form>
                        </div>
                    </div>
                    <div class="personal-details">
                        <div>
                            <p>nick:</p>
                            <div><? echo $_COOKIE['nick']?></div>
                        </div>
                        <div>
                            <p>name:</p>
                            <input name="name" type="text">
                        </div>
                        <div>
                            <p>surname:</p>
                            <input name="surname" type="text">
                        </div>
                        <div>
                            <p>country:</p>
                            <input name="country" type="text">
                        </div>
                        <div>
                            <p>date of birth:</p>
                            <div>1999-01-01</div>
                        </div>
                        <div>
                            <p>email:</p>
                            <div><? echo $_COOKIE['email']?> </div>
                        </div>
                        <a class="save_changes">Save Changes</a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
