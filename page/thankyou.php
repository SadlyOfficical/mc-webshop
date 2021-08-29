<!DOCTYPE html>
<html lang="en">

<?php require 'assets/component/header.php'; ?>

<body>
    <?php require 'assets/component/head.php'; ?>

    <div class="main-box">
        <div class="container">
            <div class="row text-center">
                <p>ซื้อสินค้าเสร็จสิ้นแล้ว</p>
                <p>ขอบคุณที่ใช้บริการ!</p>
                <img src="<?php echo $host . "page/assets/image/check.png" ?>" alt="" style="width: 10%; margin-left: auto; margin-right: auto;">
            </div>
        </div>
    </div>

    <?php require 'assets/component/footer.php'; ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="NNYYqocU"></script>
    <script src="https://unpkg.com/github-card@1.2.1/dist/widget.js"></script>
</body>

</html>