<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Registration page</title>
</head>

<body>
    <div class="container">
        <div class="tlo">
            <div class="logo">
                <img src="/public/img/logo.svg">
            </div>
        </div>
        <div class="register-container">
            <div class="upper-buttons">
                <a class="notactive" href="../login">Login</a>
                <a class="active" href="../register">Register</a>
            </div>
            <div class="text-welcome">
                <div>Welcome</div>
            </div>
            <div class="text-upper">
                <div>Please register to your account.</div>
            </div>
            <div class="personal-information">
                <form id="submit" action="register" method="post">
                    <div class="messages">
                        <?php if(isset($messages)){
                            foreach ($messages as $message ){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="nick" type="text" placeholder="Nickname">
                    <input name="email" type="text" placeholder="Email">
                    <input name="password" type="password" placeholder="Password">
                    <input name="confirm_password" type="password" placeholder="Confirm password">
                    <div class="ok-button">
                        <a class="active" onclick="submit()">Ok</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
