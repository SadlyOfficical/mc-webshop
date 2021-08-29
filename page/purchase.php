<!DOCTYPE html>
<html lang="en">

<?php require 'assets/component/header.php';
require 'connection.php'; ?>

<body>
    <?php require 'assets/component/head.php'; ?>

    <div class="main-box">
        <div class="container">
            <?php if (isset($_SESSION['username'])) {
                echo '
            <div class="row text-center">';
                try {
                    $select_stmt = $db->prepare("SELECT * FROM goods WHERE 1");
                    $select_stmt->execute();

                    while ($result = $select_stmt->fetchObject()) {
                        echo '
                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <a class="img-card">
                                    <img src="' . $host . 'page/assets/image/goods/' . $result->image .  '" ?>" />
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a>' . $result->display_name . '</a>
                                    </h4>
                                    <span class="price-badge">฿' . $result->price . '</span>
                                    <p>
                                    ' . $result->description . '
                                    </p>
                                </div>
                                <div class="card-purchase">
                                    <a href="?page=purchase&id=' . $result->id . '" class="card-button">
                                        ซื้อสินค้า
                                    </a>
                                </div>
                            </div>
                        </div>';
                    }
                } catch (PDOException $e) {
                }
                echo '</div>';
            } else {
                echo $_SESSION['username'];
                echo '<div class="row justify-content-center text-center">
                <div class="col-4">
                กรุณาใส่ชื่อผู้เล่นของคุณก่อนซื้อสินค้า
                <form action="api/login.php" method="post">
                <div class="form-group mt-3">
                <input type="text" class="form-control" name="username">
                <button type="submit" class="btn btn-success mt-3" style="width: 100%;">ต่อไป</button>
                </div>
                </form>
                </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1001)
            $errorMsg = "ใส่ข้อมูลไม่ครบ";
        else if ($_GET['error'] == 1002)
            $errorMsg = "อั่งเปามีปัญหาหรือถูกใช้งานไปแล้ว";
        else if ($_GET['error'] == 1003)
            $errorMsg = "ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ไมน์คราฟต์ได้";
        else if ($_GET['error'] == 1004)
            $errorMsg = "ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ฐานข้อมูลได้";
        else if ($_GET['error'] == 1005)
            $errorMsg = "ราคาอั่งเปาไม่ตรงกับราคาสินค้า";

        echo '<div class="purchase-popup">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <div class="purchase-popup-container">
                            <p style="padding: 10px; color: rgb(255, 88, 79); min-height: 80px;">ไม่สามารถซื้อสินค้าได้ (' . $errorMsg . ')</p>
                            <a class="button" href="' . $host . '?page=purchase">ยกเลิก</a>
                        </div>
                    </div>
                </div>
              </div>
                ';
    } else if (isset($_GET['id']) && isset($_SESSION['username'])) {
        echo '<div class="purchase-popup">
                <div class="container">
                    <div class="d-flex justify-content-center">
                            <div class="purchase-popup-container">
                            <form action="api/purchase.php" method="get">
                                <div class="form-group mt-3">
                                <input type="hidden" class="form-control field" name="id" value="' . $_GET['id'] . '">
                                <input type="hidden" class="form-control field" name="username" value="' . $_SESSION['username'] . '">
                                <input type="text" class="form-control field" name="voucher" placeholder="รหัสอั่งเปา">
                                <button type="submit" class="button">ยืนยัน</button>
                            </div>
                            </form>
                            <a class="button" href="' . $host . '?page=purchase">ยกเลิก</a>
                        </div>
                    </div>
                </div>
              </div>
                ';
    }
    ?>

    <?php require 'assets/component/footer.php'; ?>
</body>

</html>