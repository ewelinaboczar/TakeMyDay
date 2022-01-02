<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
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
                <form>
                    <input name="user name" type="text" placeholder="User Name">
                    <input name="email" type="text" placeholder="Email">
                    <input name="password" type="password" placeholder="Password">
                    <input name="confirm password" type="password" placeholder="Confirm password">
                    <input name="country" type="text" placeholder="Country">
                </form>
            </div>
            <div class="ok-button">
                <a class="active" href="../home">Ok</a>
            </div>
        </div>
    </div>
</body>