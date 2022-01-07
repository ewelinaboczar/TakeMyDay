<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Login page</title>
</head>

<body>
    <div class="container">
        <div class="tlo">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
        </div>
        <div class="login-container">
            <div class="upper-buttons">
                <a class="active" href="login">Login</a>
                <a class="notactive" href="register">Register</a>
            </div>
            <div class="text-welcome">
                <div>Welcome</div>
            </div>
            <div class="text-upper">
                <div>Please login to your account.</div>
            </div>
            <div class="personal-information">
                <form id="log_id" action="login" method="post">
                    <div class="messages">
                        <?php if(isset($messages)){
                            foreach ($messages as $message ){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="email" type="text" type="email" placeholder="Email">
                    <input name="password" type="password" placeholder="Password">
                    <div class="ok-button">
                        <a class="active" onclick="log()">Ok</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function log() {
        document.getElementById("log_id").submit();
    }
</script>