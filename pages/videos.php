<?php

require_once "../PHPClasses/SiteModel.php";
include "../PHPClasses/Database.php";

$model = new SiteModel();
$model->head();
$model->headerSite();
if (isset($_REQUEST['token'])) {
    $token = $_REQUEST['token'];
}
//echo "databse";
$objDatabase = new Database();

//echo "databse";
$conn = $objDatabase->connection();

//echo "databse";

$sqlQuery = "SELECT * FROM ux_video WHERE thumbnail=\"" . $token . "\" LIMIT 5";
$result = $conn->query($sqlQuery);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $description = $row['description'];
    $video_name = $row['video_name'];
    $video_id = $row['video_id'];
    $pstar_id = $row['pornstar_id'];
    $time = $row['time_upload'];
    $deleted = $row['delete_video'];
    $thumbnail = $row['thumbnail'];
    $downPath = "http://www.xxxunique.com/pages/download.php?token=" . $thumbnail;
}

$sqlQueryfeelings = "SELECT * FROM ux_video_feelings WHERE video_id=" . $video_id . " LIMIT 100";
$resultFeelings = $conn->query($sqlQueryfeelings);


?>
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
                   preload="auto" width="100%" height="auto"
                <?php
                echo "poster=\"../Videos/thumb/" . $thumbnail . "\"";
                ?>
                   data-setup='{}'>

                <?php
                //                download.php?token=".$thumbnail."
                echo "<source src=\"" . $downPath . "\" type=\"video/mp4\">
                <source src=\"" . $downPath . "\" type=\"video/webm\">
                ";
                ?>

                <p class="vjs-no-js col s12 m12 l6">
                    To view this video please enable JavaScript, and consider upgrading to a web browser
                    that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
        </div>
        <br>
        <style>
            .padd {
                margin: 10px;
            }
        </style>
        <div>
            <!--Likes and ratings here-->
        </div>
        <div class="col s12 m12 l12 card card-panel">
            <div>
                <button class="waves-effect waves-light btn col s11 m5 l3 padd"><i
                        class="material-icons left fa fa-download"></i>Download
                </button>
                <button id="sharebutton" class="waves-effect waves-light btn col s11 m5 l3 padd"><i
                        class="material-icons left fa fa-share"></i>Share
                </button>
                <button class="waves-effect waves-light btn col s11 m5 l4 padd"><i
                        class="material-icons left fa fa-clock-o"></i>Watch
                    Later
                </button>
                <div class="col s12 m12 l12 card padding10x" id="share" style="display: none; height: 60px">
                    <!-- Your share button code -->
                    <div class="fb-share-button"
                         data-href="http://www.xxxunique.com/videos.html"
                         data-layout="button_count">
                    </div>

                </div>
            </div>

            <h4 class="">
                <?php echo $video_name; ?>
                <!--                Sunny Leone in S.W.A.T-->
            </h4>

            <div class="card-content">
                <?php echo $description; ?>
                <!--                Yes it is sunny leone in SWAT. I hope you could understand the risk of having a pornstar as a securty-->
                <!--                personnel.-->
                <!--                This might be a vulnerability in the Security System.-->
                <!--                As we all know that a pornstar can start below job at any time. Even when she is on duty.-->
            </div>

            <div class="card-action">
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 l12 m12">
                                <input placeholder="Title" id="feelings_title" name="feelings_title" type="text"
                                       class="validate">
                                <label for="feelings_title">Title </label>
                            </div>
                            <div class="input-field col s12 l12 m12">
                                <input placeholder="I am feeling...." id="feelings_text" name="feelings_text"
                                       type="text"
                                       class="validate">
                                <label for="feelings_text">What you are feeling?</label>
                            </div>

                            <button type="reset" class="btn btn-block"
                                    onclick="Materialize.toast('Comment is not available now', 4000)">
                                Tell Everyone
                            </button>
                        </div>
                    </form>
                </div>
                <div id="comments" class="col s12 m12 l12">
                    <h5 class="cyan-text">Feelings shared</h5>


                    <ul class="collection">
                        <?php
                        //                        feelings are populated here

                        if ($resultFeelings->num_rows > 0) {
                            while ($curRow = $resultFeelings->fetch_assoc()) {
                                echo "<li class=\"collection-item avatar\">
                            <div style='background-color: #ffffff' class='circle responsive-img valign'>
                            <i class=\"circle center\">".$curRow['rating']."</i>
                            </div>
                            <span class=\"title cyan-text darken-3\">" .
                                    $curRow['feeling_title'] . "</span>

                            <p>" . $curRow['feeling_text'] . "
                            </p>
                        </li>";
                            }
                        }

                        ?>


                    </ul>
                </div>


            </div>
        </div>
    </div>
    <div class="col s11 m11 l4">
        <div class="col s12 m12 l12">
            <img src="../images/advertisement.jpg" style="width: inherit;height: inherit;">
        </div>


        <div class="row" style="padding: 10px">
            <ul>

                <?php

                ?>
                <li class="col s12 m12 l12 white">
                    <a href="#">
                        <div style="">
                            <img class="col m4 s4 l4" src="../images/office.jpg" height="75px" width="100px">

                            <h5>Sunny Leone</h5>
                            <span>This is sunny leone</span>
                        </div>
                    </a>
                </li>

                <li class="col s12 m12 l12 white">
                    <a href="#">
                        <div style="">
                            <img class="col m4 s4 l4" src="../images/office.jpg" height="75px" width="100px">

                            <h5>Sunny Leone</h5>
                            <span class="truncate   ">This is sunny leone</span>
                        </div>
                    </a>
                </li>

                <li class="col s12 m12 l12 white">
                    <a href="#">
                        <div style="">
                            <img class="col m4 s4 l4" src="../images/office.jpg" height="75px" width="100px">

                            <h5>Sunny Leone</h5>
                            <span>This is sunny leone</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>


    </div>
    <div class="col s1 m1 l1">
        <br>
    </div>
</div>
<?php $model->footer(); ?>
</body>
</html>
