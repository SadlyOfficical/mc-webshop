<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand ms-5 me-5" href="#">
            <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            N4Yz
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a class="nav-link <?php if ($_GET['page'] == "home") echo "active"; ?>" href="<?php echo "$host?page=home"; ?>"><i class="fad fa-home"></i> หน้าหลัก</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link <?php if ($_GET['page'] == "purchase") echo "active"; ?>" href="<?php echo "$host?page=purchase"; ?>"><i class="fad fa-shopping-cart"></i> ร้านค้า</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="downloadDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fad fa-cloud-download-alt"></i> ดาวน์โหลด
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="downloadDropdown">
                        <li><a class="dropdown-item" href="https://minecraft.net/">Offical Minecraft</a></li>
                        <li><a class="dropdown-item" href="https://tlauncher.org/">TLauncher</a></li>
                    </ul>
                </li>

                <li class="nav-item me-3">
                    <a class="nav-link <?php if ($_GET['page'] == "rule") echo "active"; ?>" href="<?php echo "$host?page=rule"; ?>"><i class="fad fa-exclamation-circle"></i> กฎ</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link <?php if ($_GET['page'] == "team") echo "active"; ?>" href="<?php echo "$host?page=team"; ?>"><i class="fad fa-user-friends"></i> ทีมงาน</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link <?php if ($_GET['page'] == "contact") echo "active"; ?>" href="<?php echo "$host?page=contact"; ?>"><i class="fad fa-question-circle"></i> ติดต่อ</a>
                </li>
            </ul>
            <span class="navbar-text me-5">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a class="nav-link" style="display: inline-block;"><i class="fad fa-user"></i> ' . $_SESSION["username"] . '</a>';
                    echo '
                    <form action="api/logout.php" method="post" style="display: inline-block;">
                        <button class="btn logout-btn" type="submit"><i class="fad fa-sign-out-alt"></i> ออกจากระบบ</a></button>
                    </form>';
                }
                ?>
                <a class="nav-link" style="display: inline-block;"><i class="fad fa-users"></i> ผู้เล่นออนไลน์: <?php $status = json_decode(file_get_contents('https://api.mcsrvstat.us/2/' . $serverIP));
                                                                                                                echo $status->players->online; ?></a>
            </span>
        </div>
    </div>
</nav>

<div class="container">
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo $host; ?>page/assets/image/slider/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $host; ?>page/assets/image/slider/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $host; ?>page/assets/image/slider/3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="box row">
        <div class="col mt-4">
            <marquee class="announce" behavior="scroll" scrollamount=8>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui iste, soluta facere at perspiciatis voluptate numquam placeat quaerat modi quibusdam quos corporis officiis nemo rem necessitatibus quod incidunt, doloremque veniam.</marquee>