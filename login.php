<?php
session_start();
require_once 'PHPClasses/SiteModel.php';
require_once 'PHPClasses/Fields.php';
require_once 'facebook-php/src/Facebook/autoload.php';




$model = new SiteModel();

////    'app_id' => '1519022465059371',
////    'app_secret' => '36445100ece1bf74b29be09207e26182',
////    'default_graph_version' => 'v2.5',
$model->head();
$model->headerSite();
$fb = new Facebook\Facebook([

    'app_id' => '1519022465059371',
    'app_secret' => '36445100ece1bf74b29be09207e26182',
    'default_graph_version' => 'v2.5'

]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://xxxunique.com/callback.php', $permissions);


echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
try{
$accessToken=$helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

?>

<?php
$model->footer();
?>