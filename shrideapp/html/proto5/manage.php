<?php session_start(); $PHPSESSID=session_id(); ?>

<!DOCTYPE html>

<html>

<head>
  <title>SHRIDE</title>
  <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>

  <script>
    var user = "<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'no user' ?>";
    if (user == "no user") {
      window.location = "login.php";
    } else {
    //  handleUsers(user);
    }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-webapp-status-bar-style" content="black">

  <link rel="stylesheet" href="../../css/Shride.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
  <!-- MANAGE FEED -->

  <div data-role="page" id="managefeed" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="home.php" rel="external" data-inline="true" ><img src="back.png" width="50px"></a>

      <h1>SHRIDE</h1>
    </div>
    <!-- /header -->
    <div data-role="content" class="ui-content">
      <ul data-role="listview">
        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg" width="80px">
            <h3 class="ui-li-heading">
              <strong>RIDE:</strong> 5/18/15, 5:30pm</h3>
            <p class="ui-li-desc">Wellesley to Piedmont</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="drive.svg">
            <h3 class="ui-li-heading">
              <strong>DRIVE:</strong> 5/25/15, 7:00pm</h3>
            <p class="ui-li-desc">Wellesley to South Station</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="drive.svg">
            <h3 class="ui-li-heading">
              <strong>DRIVE:</strong> 5/27/15, 9:00am</h3>
            <p class="ui-li-desc">Davis Square to South Station</p>
          </a>
        </li>

      </ul>
    </div>
    </br>
    <div data-role="footer">
      <a href="home.php" rel="external" data-inline="true" style="border: none;"><img src="home.png" width="50px"></a>
    </div>
  </div>
  <!-- SINGLE DRIVE IN NEWSFEED-->

  <div data-role="page" id="drive1" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#managenewsfeed" rel="external" data-inline="true" style="border: none;"><img src="back.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content" class="ui-content">
      <ul data-role="listview">
        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg">
            <h3 class="ui-li-heading">5/18/15, 3:00pm</h3>
            <p class="ui-li-desc">To: Logan Airport</br>
              </br>From: Wellesley</br>
              </br>How many passengers: 2</br>
              </br>Price Range: $20-$40</br>
            </p>
          </a>
        </li>
      </ul>

      </br>
      <a href=#contact data-role="button" data-mini="true">Contact</a>

      </br>

      <ul data-role="listview">

        <li>
          <a href="" class="ui-link-inherit">
            <p class="ui-li-desc">5/18/15, Wellesley to South Station</p>
          </a>
        </li>

        <li>
          <a href="" class="ui-link-inherit">
            <p class="ui-li-desc">5/19/15, Davis Square to South Station</p>
          </a>
        </li>

        <li>
          <a href="" class="ui-link-inherit">
            <p class="ui-li-desc">5/19/15, Harvard Square to Wellesley</p>
          </a>
        </li>

      </ul>
    </div>
    </br>
    </br>
  </div>

  <!-- CONTACT INFO-->

  <div data-role="page" id="contact" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#drive1" data-inline="true" back-btn="true" style="border: none;"><img src="back.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content" class="ui-content">

    <p><strong>Phone Number (text only): </strong></br> 800-123-4567
    </br>
  </br>
    <strong>E-mail: </strong></br studentname@wellesley.edu
  </p>
    </div>
  </div>



  <script type="text/javascript">
    Parse.initialize("JwqmCZVQV0EHyLNKbOE7eklPE0f7ji7LhH8f2UyQ", "KUqYU0RP5KRhjHY32fwbXSGm9zUAFDO1kSo6hh4y");
    // var TestObject = Parse.Object.extend("TestObject");
    // var testObject = new TestObject();
    // testObject.save({
    // foo: "bar"
    // }, {
    // success: function(object) {
    // $(".success").show();
    // },
    // error: function(model, error) {
    // $(".error").show();
    // }
    // });

    //this is for getting the username out, purely for signing up. need another way to check if person is in the database already or not, and then to do this otherwise.






    function handleUsers(param2) {



      Parse.User.logIn(param2, "my pass", {
        success: function(user) {
          // Do stuff after successful login.
        //  alert("login successful");
        },
        error: function(user, error) {
          // The login failed. Check error to see why.
          //alert("Error: " + error.code + " " + error.message);
          //alert("not login, new user?");
          var user = new Parse.User();
          user.set("username", param2);
          user.set("password", "my pass"); //we don't need this though
          user.set("email ", " <? php echo $user ?> @wellesley.edu ");
          // other fields can be set just like with Parse.Object
          user.set("phone ", "650 - 555 - 0000 ");
          user.signUp(null, {
            success: function(user) {
              // Hooray! Let them use the app now.
            //  alert("yay, new user added");
            },
            error: function(user, error) {
              // Show the error message somewhere and let the user try again.

          //    alert("Error: " + error.code + " " + error.message);
            }
          })
        }
      })


    };
  </script>
</body>

</html>
