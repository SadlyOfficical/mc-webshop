<!DOCTYPE html>
<html lang="en">

<?php require 'assets/component/header.php'; ?>

<body>
    <?php require 'assets/component/head.php'; ?>

    <div class="main-box">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <i class="fab fa-facebook"></i> เฟซบุ๊ค
                    <br>
                    <div style="width:100%;" class="fb-page" data-href="<?php echo $facebook ?>" data-tabs="timeline" data-height="475" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="<?php echo $facebook ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $facebook ?>"></a></blockquote>
                    </div>
                </div>
                <div class="col">
                    <i class="fab fa-discord"></i> ดิสคอร์ด
                    <br>
                    <iframe src="<?php echo "https://discord.com/widget?id=$discordID&theme=light" ?>" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                </div>
                <div class="col">
                    <i class="fab fa-github"></i> Github
                    <br>
                    <div class="github-widget" data-username="M4h45amu7x"></div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'assets/component/footer.php'; ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="NNYYqocU"></script>
    <script src="https://unpkg.com/github-card@1.2.1/dist/widget.js"></script>
</body>

</html>