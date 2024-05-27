<?php

function getCurrentUrl() {
    $url = basename($_SERVER['PHP_SELF']);
    return '/' . pathinfo($url, PATHINFO_FILENAME);
}