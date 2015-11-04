<?php
// CAS will start a session, so test before trying
$PHPSESSID = session_id();
if( empty($PHPSESSID)) {
    session_start();
    $PHPSESSID = session_id();
}
header('Access-Control-Allow-Origin: *');
require_once 'config-simple.php';
require_once 'CAS.php';

// Enable debugging
phpCAS::setDebug();

// Initialize phpCAS
phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);

// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();

if(isset($_GET['loginCAS'])) {
    phpCAS::forceAuthentication();

    $_SESSION['loggedIn'] = true;
    $_SESSION['user'] = phpCAS::getUser();
    // this clears the "loginCAS" from the URL

    header('Location: home.php?user='.$_SESSION['user']); //maybe send person to the home page if they are a returning user
    die();
} else if( isset($_GET['logoutCAS'])) {
    phpCAS::logout();

    $_SESSION['loggedIn'] = false;
    $_SESSION['user'] = 'no user';
    // this clears the "logoutCAS" from the URL
    header('Location: home.php');
    die();
}



$loggedIn = isset($_SESSION['loggedIn']) ? $_SESSION['loggedIn'] : false;
$user = isset($_SESSION['user']) ? $_SESSION['user'] : 'no user';

?>
<!doctype html>
<html lang='en'>
<head>
<meta charset="utf-8">
<title>Shride</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-webapp-status-bar-style" content="black">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/Shride.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>

<script>
  var loggedIn = <?php echo $loggedIn ? "true;" : "false;"; ?>

  var user = "<?php echo $user ?>";

  var PHPSESSID = "<?php echo $PHPSESSID ?>";

$(document).ready( function () { $('#phpsessid').html(PHPSESSID); });
$(document).ready( function () { $('#user').html(user); });
</script>
<style type="text/css">

</style>
</head>
<body>

  <div data-role="page" id="login" data-theme="d">

    <!-- /header -->
    <div data-role="header" data-position="inline">
      <h1>Shride</h1>
    </div>
    <div data-role="content">

      <div style="text-align: center;">

      <img src="logo.svg" width="60%" style="padding-top: 50%;"/>

</div>

    </div>


<?php
              if(!$loggedIn) {
                  echo '  <div data-role="loginbox" data-position="inline"><table><tr><td><a href="?loginCAS="><img src="login.png" width="80px" alt="Log in"></a></td>';
                  echo '<td><a href="#openLearn"><img src="question.png" width="80px" alt="Learn more"></a>';
              } else {
                  echo "<p>Welcome, $user.  ";
                  echo '  <div data-role="loginbox" data-position="inline"><table><tr><td><a href="?logoutCAS"><img src="logout.png" width="80px" alt="Log out"></a></td>';
                  echo '<td><a href="home.php?user='.$user.'"><img src="home.png" width="80px" alt="Home"></a>';
              }
        ?></td></tr></table>
    </div>
    </br>
  </div>




<div id="openLearn" class="modalDialog">
  <div>	<a href="#close" title="Close" class="close">X</a>

        <h2>What is this?</h2>

      <p>Shride is a ride-share application for the Wellesley College community. It is an HTML/CSS/JS application that uses Parse on the back end. </p>
  </div>
</div>

<script type="text/javascript">

var sessId = '<?php echo $PHPSESSID; ?>';
var user = '<?php echo $user; ?>';

</script>


        <!-- /header -->

        <!-- <div>Icons made by <a href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div> -->
</body>
</html>
