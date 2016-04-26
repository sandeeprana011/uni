<?php

/**
 * Created by PhpStorm.
 * User: sandeeprana
 * Date: 11/03/16
 * Time: 9:53 PM
 */
class SiteModel
{
    public $conn;
    public $accessToken;

    function __construct()
    {
        $accessToken=$_SESSION['fb_access_token'];
    }

    function head()
    {
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>

    <meta property=\"og:url\" content=\"http://www.xxxunique.com/videos.html\"/>
    <meta property=\"og:type\" content=\"website\"/>
    <meta property=\"og:title\" content=\"Sunny Leone in SWAT\"/>
    <meta property=\"og:description\" content=\"Sunny Leone in swat team. Time for a risky shot.\"/>
    <meta property=\"og:image\" content=\"http://www.xxxunique.com/images/office.jpg\"/>

    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1.0\"/>
    <title>Starter Template - Materialize</title>

    <!-- CSS  -->
    <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">

    <!--  Scripts-->

    <script>
//        window.fbAsyncInit = function () {
//            FB.init({
//                appId: '1519022465059371',
//                xfbml: true,
//                version: 'v2.5'
//            });
//        };
//
//        (function (d, s, id) {
//            var js, fjs = d.getElementsByTagName(s)[0];
//            if (d.getElementById(id)) {
//                return;
//            }
//            js = d.createElement(s);
//            js.id = id;
//            js.src = \"//connect.facebook.net/en_US/sdk.js\";
//            fjs.parentNode.insertBefore(js, fjs);
//        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script src=\"https://code.jquery.com/jquery-2.1.1.min.js\"></script>
    <script src=\"../js/materialize.js\"></script>
    <script src=\"../js/init.js\"></script>

    <link href=\"http://vjs.zencdn.net/5.8.0/video-js.css\" rel=\"stylesheet\">

    <!-- If you'd like to support IE8 -->
    <script src=\"http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js\"></script>
    <!--    --><?php //echo $addScript?>
    <link href=\"../css/materialize.min.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen,projection\"/>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"../css/font-awesome.css\"/>
    <script>
        $(document).ready(function () {
            $(\"button-collapse\").sideNav();
            $(\"#sharebutton\").click(function () {
                $(\"#share\").toggle(500);
            });
        });

    </script>
    <style>
        .padding10x {
            padding: 5px;
        }

        .margin10x {
            margin: 10px;
        }

        .card-custom {
            padding: 0px;

        }
    </style>


    <!--    <link href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen,projection\"/>-->
</head>

<body>
";
    }

    function headerSite()
    {
        echo "
<div id=\"fb-root\"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1\";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class=\"navbar-fixed\">
    <nav class=\"pink darken-1\">
        <div class=\"nav-wrapper\">
            <a href=\"#\" class=\"brand-logo\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;XXXUnique.com</a>
            <a href=\"#\" data-activates=\"mobile-demo\" onclick=\"$(this).sideNav();\" class=\"button-collapse\"><i
                    class=\"material-icons\">menu</i></a>
            <ul class=\"right hide-on-med-and-down\">
                <li>
                    <form>
                        <div class=\"input-field\">
                            <input id=\"search\" type=\"search\" required>
                            <label for=\"search\"><i class=\"material-icons\">search</i></label>
                            <i class=\"material-icons\">close</i>
                        </div>
                    </form>
                </li>
                <li><a href=\"../pages/sexfriend.php\">Sex Friend</a></li>
                <li><a href=\"../pages/videos.php\">Videos</a></li>
                <li><a href=\"../pages/images.php\">Images</a></li>
                <li><a href=\"../pages/jokes.php\">Jokes</a></li>
                <li><a href=\"../pages/chat.php\">Chat</a></li>

                <li><a class=\"fa fa-facebook\" href=\"#\">b login</a></li>
</ul>
            <ul class=\"side-nav\" id=\"mobile-demo\">
                <li>
                    <form>
                        <div class=\"input-field teal lighten-3\">
                            <input id=\"search\" type=\"search\" required>
                            <label for=\"search\"><i class=\"material-icons\">search</i></label>
                            <i class=\"material-icons accent-2\">close</i>
                        </div>
                    </form>
                </li>
                <li><a href=\"../pages/sexfriend.php\">Sex Friend</a></li>
                <li><a href=\"../pages/videos.php\">Videos</a></li>
                <li><a href=\"../pages/images.php\">Images</a></li>
                <li><a href=\"../pages/jokes.php\">Jokes</a></li>
                <li><a href=\"../pages/chat.php\">Chat</a></li>
                <li><a class=\"fa fa-facebook\" href=\"#\">b login</a></li>
            </ul>
        </div>
    </nav>
</div>
";
    }

    function sidebar()
    {
        echo "    <div class=\"col s12 m4 l2 \">
        <div class=\"col s12 m12 l12\">
            <div class=\"card\">
                <a href=\"#!\" class=\"col l12 m12 s12 btn waves-effect waves-teal\">Teen</a>
                <a href=\"#!\" class=\"col l12 m12 s12 btn waves-effect waves-ripple\">Horny</a>
                <a href=\"#!\" class=\"col l12 m12 s12 btn waves-effect waves-block\">Ebony</a>
                <a href=\"#!\" class=\"col l12 m12 s12 btn waves-effect waves-green\">Amateur</a>
                <a href=\"#!\" class=\"col l12 m12 s12 btn waves-effect waves-purple\">Lesbians</a>
                <a href=\"#!\" class=\"col l12 m12 s12 btn waves-effect waves-yellow\">Gang Bang</a>
            </div>
        </div>
    </div>
";
    }

    function footer()
    {

//        require_once '../site/footer.php';
        echo "
<footer class=\"page-footer orange\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col l6 s12\">
                <h5 class=\"white-text\">XXXUnique</h5>

                <p class=\"grey-text text-lighten-4\">
                    We are really serious about your security.
                </p>


            </div>
            <div class=\"col l3 s12\">
                <h5 class=\"white-text\">Settings</h5>
                <ul>
                    <li><a class=\"white-text\" href=\"#!\">Link 1</a></li>
                    <li><a class=\"white-text\" href=\"#!\">Link 2</a></li>
                    <li><a class=\"white-text\" href=\"#!\">Link 3</a></li>
                    <li><a class=\"white-text\" href=\"#!\">Link 4</a></li>
                </ul>
            </div>
            <div class=\"col l3 s12\">
                <h5 class=\"white-text\">Connect</h5>
                <ul>
                    <li><a class=\"white-text\" href=\"#!\">Link 1</a></li>
                    <li><a class=\"white-text\" href=\"#!\">Link 2</a></li>
                    <li><a class=\"white-text\" href=\"#!\">Link 3</a></li>
                    <li><a class=\"white-text\" href=\"#!\">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class=\"footer-copyright\">
        <div class=\"container\">
            Made by <a class=\"orange-text text-lighten-3\" href=\"http://materializecss.com\">Materialize</a>
        </div>
    </div>
</footer>
";
    }
}