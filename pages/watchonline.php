<!DOCTYPE html>
<?php
include '../db.php';

if (isset($_REQUEST['token'])) {
    if (ctype_alnum($_REQUEST['token'])) {
        $querry = "SELECT * FROM ux_video WHERE thumbnail=" . $token . ".gif LIMIT 5";
//    var_dump($querry);
        $result = $conn->query($querry);
        if ($result->num_rows > 0) {
//            var_dump($result);
        } else {
//            echo "Video not found";
//            http_redirect("http://www.xxxunique.com");
        }
    } else "unwanted character found";
} else {
//    http_redirect("http://www.xxxunique.com");
//    echo "token not found";
    exit(0);
}
?>
<html lang="en">
<?php require_once '../site/head.php' ?>
<body>
<?php require_once '../site/navbar.php' ?>

<!--Row intermediate-->
<div class="row blue-grey lighten-3">
    <br><br>
    <!--    --><?php //require_once '../site/sidebar.php' ?>

    <div class="col s1 m1 l1">
        <br>
    </div>
    <div class="col s12 m12 l6">
        <div>
            <video id="really-cool-video" class="video-js vjs-big-play-centered" controls
                   preload="auto" width="100%" height="auto" poster="really-cool-video-poster.jpg"
                   data-setup='{}'>
                <source src="../Videos/bbbbb.mp4" type="video/mp4">
                <source src="../Videos/bbbbb.mp4" type="video/webm">
                <p class="vjs-no-js col s12 m12 l6">
                    To view this video please enable JavaScript, and consider upgrading to a web browser
                    that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
        </div>
        <br>
<style>
    .padd{
    margin: 10px;
    }
</style>
        <div>
            <a class="waves-effect waves-light btn col s11 m5 l3 padd"><i class="material-icons left fa fa-download"></i>Download</a>
            <a class="waves-effect waves-light btn col s11 m5 l3 padd"><i class="material-icons left fa fa-share"></i>Share</a>
            <a class="waves-effect waves-light btn col s11 m5 l3 padd"><i class="material-icons left fa fa-clock-o"></i>Watch Later</a>
        </div>
        <div class="col s12 m12 l12">
            <h2>
                Sunny Leone with S.W.A.T
            </h2>
            <p>

            </p>
        </div>
    </div>
    <div class="col s12 m12 l4">
        <div class="col s12 m12 l12">
            <img src="../images/advertisement.jpg" style="width: inherit;height: inherit;">
        </div>
    </div>
    <div class="col s1 m1 l1">
        <br>
    </div>
</div>
<?php require_once '../site/footer.php' ?>
</body>
</html>
