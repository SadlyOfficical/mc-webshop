<?php
require '../config.php';

if (isset($_SESSION['username'])) {
    session_destroy();
    header("Location: $host?page=home", true, 301);
} else {
    header("Location: $host?page=purchase", true, 301);
}
