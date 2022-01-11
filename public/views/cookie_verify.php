<?php
if (!isset($_COOKIE['logUser'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}

