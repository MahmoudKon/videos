<?php

function is_active(string $routeName)
{
    // request()->segment(2) => To Get The Second Word In The URL [admin/users] Here IS 'users'
    return request()->segment(2) == $routeName ? 'active' : '';
}

function getYoutubeId ($url)
{
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return isset($match[1]) ? $match[1] : null;
}

function slug(string $name){
    return strtolower(trim(str_replace(' ' , '_'  ,$name)));
}
