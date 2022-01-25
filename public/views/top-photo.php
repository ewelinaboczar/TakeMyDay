<?php
include 'cookie_verify.php';
include 'user_by_cookie.php';
echo '
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
            <div class="person"">
                <div>Hi, ';echo $nick ,'</div>
                <div>
                    <img src="/public/uploads/';echo $photograph,'">
                </div>
            </div>
        </div>
    </div>
';