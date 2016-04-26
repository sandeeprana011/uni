<?php

session_start();
require_once 'facebook-php/src/Facebook/autoload.php';
require_once 'PHPClasses/Database.php';


//
$fb = new Facebook\Facebook([
    'app_id' => '1519022465059371',
    'app_secret' => '36445100ece1bf74b29be09207e26182',
    'default_graph_version' => 'v2.5'
]);
//
echo "Logged in";

$helper = $fb->getRedirectLoginHelper();


try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
    echo 'Graph returned a n error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
//
if (!isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

// Logged in
echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('1519022465059371'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();
//var_dump($tokenMetadata);

if (!$accessToken->isLongLived()) {
// Exchanges a short-lived access token for a long-lived one
    try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
        exit;
    }

    echo '<h3>Long-lived</h3>';
//    var_dump($accessToken->getValue());
}
//var_dump($accessToken);

$_SESSION['fb_session_token'] = (string)$accessToken;


//$fb = new Facebook\Facebook([
//
//    'app_id' => '1519022465059371',
//    'app_secret' => '36445100ece1bf74b29be09207e26182',
//    'default_graph_version' => 'v2.5'
//]);

try {

    $response = $fb->get('/me?fields=id,name,picture.height(100).width(100),email,first_name,last_name,middle_name,location,hometown,birthday,gender,age_range,relationship_status,bio', $accessToken);
//    var_dump($accessToken);

//    echo $response;
//    print_r($response);

} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$user = $response->getGraphUser();

$uID = $user['id'];
$uFirstName = $user['first_name'];
$uMiddleName = $user['middle_name'];
$uLastName = $user['last_name'];
$uPicture = $user['picture'];
$uUrl = $uPicture['url'];
$uEmail = $user['email'];
$uLocation = $user['location'];
$uLocID = $uLocation['id'];
$uLocName = $uLocation['name'];
$uHometown = $user['hometown'];
$uHomeID = $uHometown['id'];
$uHomeName = $uHometown['name'];
//$uBirthday="";
$uBirthday = $user['birthday'];
$uBirthDate = $uBirthday->format('Y-m-d H:i:s');
$uGender = $user['gender'];
$uAgeRange = $user['age_range'];
$uAgeMin = $uAgeRange['min'];
$uRelationshipStatus = $user['relationship_status'];
$uName = $uFirstName . " " . $uMiddleName . " " . $uLastName;
$uBio = $user['bio'];
//

echo $uID;
echo "<br>";
echo $uFirstName;
echo "<br>";
echo $uMiddleName;
echo "<br>";
echo $uLastName;
echo "<br>";
echo $uEmail;
echo "<br>";
echo $uLocID;
echo "<br>";
echo $uLocName;
echo "<br>";
echo $uHomeID;
echo "<br>";
echo $uHomeName;
echo "<br>";
//if (isset($uBirthday))
//var_dump($uBirthday);
$uPassword = "";
//print $uBirthday;

echo $uBirthday->format('Y-m-d H:i:s');
echo "<br>";

echo $uGender;
echo "<br>";
echo $uAgeRange;
echo "<br>";
echo $uAgeMin;
echo "<br>";
echo $uRelationshipStatus;
echo "<br>";


$db = new Database();
$conne = $db->connection();

$sqlVerifyUser = "SELECT * FROM users WHERE fb_id=" . $uID." OR email='".$uEmail."'";

$result = $conne->query($sqlVerifyUser);

if (($result->num_rows) > 0) {
    echo "Data already available";
} else {

    $sqlInsertQuery = "INSERT INTO users (fb_id,name,email,password,remember_token,created_at,updated_at,first_name,middle_name,last_name,location_id,location,hometown_id,hometown,birthday,gender,about,age_range,relationship_status,bio) " .
        " VALUES (" . $uID . ",'" . $uName . "','" . $uEmail . "','" . $uPassword . "','" . $accessToken . "',now(),now(),'" . $uFirstName . "','" . $uMiddleName . "','" . $uLastName . "',0" . $uLocID . ",'" . $uLocName . "',0" . $uHomeID . ",'" . $uHomeName . "','" . $uBirthDate . "','" . $uGender . "','" . $uBio . "','" . $uAgeMin . "','" . $uRelationshipStatus . "','" . $uBio . "')";


    echo $sqlInsertQuery;

    if ($conne->query($sqlInsertQuery) === TRUE) {
        echo "Logged in successfully";
    } else {
        echo "Error: " . $sqlInsertQuery . "<br>" . $conne->error;
    }


}


echo 'Name: ' . $user['name'];
$picture = $user['picture'];
//
echo 'Photo <img src="' . $picture['url'] . '">';

