<?php
require '../config.php';

if (isset($_POST['username']) && !isset($_SESSION['username'])) {
    $_SESSION['username'] = $_POST['username'];
    header("Location: $host?page=purchase", true, 301);
} else {
    header("Location: $host?page=purchase", true, 301);
}
