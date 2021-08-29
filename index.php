<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == "home")
        require 'page/home.php';
    else if ($_GET['page'] == "purchase")
        require 'page/purchase.php';
    else if ($_GET['page'] == "contact")
        require 'page/contact.php';
    else if ($_GET['page'] == "rule")
        require 'page/rule.php';
    else if ($_GET['page'] == "team")
        require 'page/team.php';
    else if ($_GET['page'] == "thankyou")
        require 'page/thankyou.php';
} else
    header("Location: ?page=home", true, 301);
