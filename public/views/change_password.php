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
    <?php include 'top-photo.php'; ?>
    <div class="bottom">
        <nav id="menu">
            <ul>
                <li>
                    <a class="notactive" href="/home"><i class="fas fa-home"></i><h>HOME</h></a>
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
                    <a class="active" href="/account_details"><i class="fas fa-user-circle"></i><h>ACCOUNT</h></a>
                </li>
            </ul>
        </nav>
        <main class="your-plans-bottom">
            <div class="selectable-bar">
                <a class="notactive" href="account_details">Account Details</a>
                <a class="notactive" href="change_account_details">Change Details</a>
                <a class="active" href="change_password">Change Password</a>
            </div>
            <section class="account">
                <p>Change Password</p>
                <div class="box-informations">
                    <form class="personal-details" id="submit_pass" action="change_pass" method="post">
                        <div class="messages">
                            <?php if (isset($messages)) {
                                foreach ($messages as $message) {
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                        <div id="pass">
                            <p>old password:</p>
                            <input name="old_password" type="password">
                        </div>
                        <div id="pass">
                            <p>new password:</p>
                            <input name="new_password" type="password">
                        </div>
                        <div id="pass">
                            <p>confirm password:</p>
                            <input name="confirmed_password" type="password">
                        </div>
                        <a class="save_changes" onclick="submit_pass()">Change Password</a>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
<script>
    function submit_pass() {
        document.getElementById("submit_pass").submit();
    }
</script>
