<?php
session_start();
if (isset($_SESSION['id'])  || isset($_SESSION['admin'])) {
    session_destroy();
    header('Location: http://localhost//CarRentingWebSite/index.html');
} else {
// remeber to reomove when cheking for every page to be logged in first ;
    header('Location: http://localhost//CarRentingWebSite/index.html');
}
