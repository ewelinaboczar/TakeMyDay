<?php
$user_array = json_decode($_COOKIE['logUser'],true);

$logUser = new User($user_array['email'],$user_array['password'],$user_array['nick']);
$nick=$logUser->getNick();
$email=$logUser->getEmail();
$name=$user_array['name'];
$surname=$user_array['surname'];
$photograph=$user_array['user_photo'];
