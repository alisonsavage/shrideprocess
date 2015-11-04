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
      handleUsers(user);
    }

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

      Parse.initialize("JwqmCZVQV0EHyLNKbOE7eklPE0f7ji7LhH8f2UyQ", "KUqYU0RP5KRhjHY32fwbXSGm9zUAFDO1kSo6hh4y");

      Parse.User.logIn(param2, "my pass", {
        success: function(user) {
          // Do stuff after successful login.
          //alert("login successful");
        },
        error: function(user, error) {
          // The login failed. Check error to see why.
      //    alert("Error: " + error.code + " " + error.message);
        //  alert("not login, new user?");
          var user = new Parse.User();
          user.set("username", param2);
          user.set("password", "my pass"); //we don't need this though
          user.set("email ", " <? php echo $user ?> @wellesley.edu ");
          // other fields can be set just like with Parse.Object
          user.set("phone ", "650 - 555 - 0000 ");
          user.signUp(null, {
            success: function(user) {
              // Hooray! Let them use the app now.
          //    alert("yay, new user added");
            },
            error: function(user, error) {
              // Show the error message somewhere and let the user try again.

            //  alert("Error: " + error.code + " " + error.message);
            }
          })
        }
      })


    };


  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/Shride.css" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-webapp-status-bar-style" content="black">

  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  <script type="text/javascript" src="demo/jquery-1.11.0.min.js"></script>

  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-gmaps-latlon-picker.css" />
  <script src="js/jquery-gmaps-latlon-picker.js"></script>
  <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>

  <link rel="stylesheet" type="text/css" href="DateTimePicker.css" />
   <script type="text/javascript" src="DateTimePicker.js"></script>

  <style type="text/css">
    p {
      margin-left: 20px;
    }

    input {
      width: 200px;
      padding: 10px;
      margin-left: 20px;
      margin-bottom: 20px;
    }
  </style>

  <script>

  var datetime;
  var addressfrom;
  var addressto;
  var seats;
  var charge;
  var notif;

  function newDrive1(){
    datetime = document.getElementById("datetime").value;
    alert(datetime);
    window.location="#dpnew2";

  }

  function newDrive2(){
    addressfrom = document.getElementById("addressfrom").value;
    alert(addressfrom);
    window.location="#dpnew3";
  }

  function newDrive3(){
    addressto = document.getElementById("addressto").value;
    alert(addressto);
    window.location="#dpnew4";
  }

  function newDrive4(){
    seats = document.getElementById("seats").value;
    charge = document.getElementById("charge").value;
    notif = document.getElementById("notif").value;
    alert(seats+charge+notif);
  //  processDrive();
    window.location="#dpnew5";
  }

/*
  function processDrive(){

    var Posts = Parse.Object.extend("Posts");
    var post = new Posts();
    alert(Parse.User.current());
    post.set("user", Parse.User.current());
    post.set("comingfrom", addressfrom);
    post.set("goingto", addressto);
    post.set("when", datetime);
    post.set("seats", seats);
    post.set("charge", charge);
    post.set("notification",  notif);



    post.save(null, {
      success: function(post) {
        // Execute any logic that should take place after the object is saved.
        alert('New object created with objectId: ' + post.id);
      },
      error: function(post, error) {
        // Execute any logic that should take place if the save fails.
        // error is a Parse.Error with an error code and message.
        alert('Failed to create new object, with error code: ' + error.message);
      }
    });
  }
*/
  </script>

</head>


<body>
  <!-- DRIVER NEWSFEED-->

  <div data-role="page" id="drivenewsfeed" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="home.php" rel="external" data-inline="true" style="border: none;"><img src="back.png" width="50px"></a>
      <h1>SHRIDE</h1>

    </div>
    <!-- /header -->
    <div data-role="content" class="ui-content">
      <a href=#createnewdrive data-role="button" data-mini="true">Create New Drive</a>
      </br>
      <ul data-role="listview">
        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="drive.svg">
            <h3 class="ui-li-heading">5/18/15, 3:00pm</h3>
            <p class="ui-li-desc">Wellesley to Logan Airport</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg" width="80px">
            <h3 class="ui-li-heading">5/18/15, 7:00pm</h3>
            <p class="ui-li-desc">Wellesley to South Station</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="drive.svg">
            <h3 class="ui-li-heading">5/19/15, 10:00am</h3>
            <p class="ui-li-desc">Davis Square to South Station</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg" width="80px">
            <h3 class="ui-li-heading">5/19/15, 8:00pm</h3>
            <p class="ui-li-desc">Harvard Square to Wellesley</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg" width="80px">
            <h3 class="ui-li-heading">5/20/15, 1:00pm</h3>
            <p class="ui-li-desc">Logan Airport to Wellesley</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg" width="80px">
            <h3 class="ui-li-heading">5/21/15, 12:00am</h3>
            <p class="ui-li-desc">Government Center to Wellesley</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg" width="80px">
            <h3 class="ui-li-heading">5/21/15, 11:00am</h3>
            <p class="ui-li-desc">Wellesley to Logan Airport</p>
          </a>
        </li>

      </ul>
    </div>
    </br>
    <div data-role="footer">
      <a href="home.php" rel="external" data-inline="true" style="border: none;"><img src="home.png" width="50px"></a>
    </div>
  </div>

  <!-- END DRIVER NEWSFEED-->

  <!-- SINGLE DRIVE IN NEWSFEED-->

  <div data-role="page" id="drive1" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#drivenewsfeed" data-inline="true" style="border: none;"><img src="back.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content" class="ui-content">
      <ul data-role="listview">
        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="drive.svg">
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
      <a href="#join" data-role="button" data-mini="true">Join</a>
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
    <strong>E-mail: </strong></br> studentname@wellesley.edu
  </p>
    </div>
  </div>



  <!-- JOIN DRIVE CONFIRMATION -->

  <div data-role="page" id="join" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#drive1" data-inline="true" back-btn="true" style="border: none;"><img src="back.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content" class="ui-content">
      <p>Your drive has been added to your profile. You will be reminded of your drive via text 30 minutes prior to departure.</br>
        -----------------------
        </br>To: Logan Airport
        </br>From: Wellesley
        </br>2 passengers have joined this drive.</p>
    </div>
  </div>

  <!-- CREATE NEW DRIVE-->

  <div data-role="page" id="createnewdrive" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#drivenewsfeed" data-inline="true" style="border: none;"><img src="cancel.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>When can you give the ride?</strong>
      <br>
      <br>

      <!--DATE/TIME PICKER -->
      <p>Enter Date and Time : </p>
      <input type="text" id="datetime" name="datetime" data-field="datetime" readonly>

      <div id="dtBox"></div>

      </br>
      </br>
    </div>
    <div data-role="footer" style="position: fixed; margin-left: auto; text-align: center; margin-right: auto; border: none; bottom: 0px;">

      <a href="#dpnew2" data-inline="true" style="border: none;"><img src="next.png" onclick="newDrive1();" width="50px"></a>
        </div>
    </br>
  </div>

  <div data-role="page" id="dpnew2" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#drivenewsfeed" data-inline="true" style="border: none;"><img src="cancel.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>Where will you be coming from (Enter Street, Number and Town)?</strong>
      <!--GOOGLE MAP HERE -->

      <fieldset class="gllpLatlonPicker">
        <input type="text" id="addressfrom" name="addressfrom" class="gllpSearchField">
        <input type="button" class="gllpSearchButton" value="search">
        <div class="gllpMap">Google Maps</div>
        <input type="hidden" class="gllpLatitude" value="42" />
        <input type="hidden" class="gllpLongitude" value="47" />
        <input type="hidden" class="gllpZoom" value="3" />
      </fieldset>

    </div>
    <div data-role="footer" style="position: fixed; margin-left: auto; text-align: center; margin-right: auto; border: none; bottom: 0px;">
      <a href="#createnewdrive" style="border: none;"><img src="back.png" width="50px"></a>
      <a href="#dpnew3" data-inline="true" style="border: none;"><img src="next.png" onclick="newDrive2();" width="50px"></a>
    </div>
    </br>
  </div>

  <div data-role="page" id="dpnew3" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#drivenewsfeed" data-inline="true" style="border: none;"><img src="cancel.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>Where will you be going (Enter Street Number and Town)?</strong>

      <fieldset class="gllpLatlonPicker">
        <input type="text" id="addressto" name="addressto"class="gllpSearchField">
        <input type="button" class="gllpSearchButton" value="search">
        <div class="gllpMap">Google Maps</div>
        <input type="hidden" class="gllpLatitude" value="20" />
        <input type="hidden" class="gllpLongitude" value="20" />
        <input type="hidden" class="gllpZoom" value="3" />
      </fieldset>

    </div>

    <div data-role="footer" style="position: fixed; margin-left: auto; text-align: center; margin-right: auto; border: none; bottom: 0px;">
      <a href="#dpnew2" data-inline="true" back-btn="true" style="border: none;"><img src="back.png" width="50px"></a>
      <a href="#dpnew4" data-inline="true" style="border: none;"><img src="next.png" onclick="newDrive3();" width="50px"></a>
    </div>
    </br>
  </div>

  <div data-role="page" id="dpnew4" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="#drivenewsfeed" data-inline="true" style="border: none;"><img src="cancel.png" width="50px"></a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>Just a couple more details...</strong>
      </br>
      </br>
      <form id="contact" action="/contact" method="post">
        <script language="JavaScript" type="text/javascript">
        </script>
        <div class="two-thirds column" id="main">
          <fieldset>
            <label for="seats">
              <strong>How many seats are available?</strong>
              </br>
            </label>
            <select id="seats" name="seats">
              <option value="one">1</option>
              <option value="two">2</option>
              <option value="three">3</option>
              <option value="four">4</option>
              <option value="five">5</option>
              <option value="six">6</option>
            </select>
            <label for="charge">
              </br>
              <strong>How much will you charge per seat?</strong>
              </br>
            </label>
            <select id="charge" name="charge">
              <option value="zero">$0</option>
              <option value="fivedollars">$5</option>
              <option value="ten">$10</option>
              <option value="fifteen">$15</option>
              <option value="twenty">$20</option>
              <option value="twentyfive">$25</option>
              <option value="thirty">$30</option>
              <option value="thirtyfive">$35</option>
              <option value="forty">$40</option>
              <option value="fortyfive">$45</option>
              <option value="fifty">$50</option>
            </select>
            </br>
          </fieldset>
        </div>
      </form>
      <label for="notif">
        <strong>Receive notifications?</strong>
      </label>
      <select name="notif" id="notif" data-role="slider">
        <option value="off">Off</option>
        <option value="on">On</option>
      </select>
    </div>
    <div data-role="footer" style="position: fixed; margin-left: auto; text-align: center; margin-right: auto; border: none; bottom: 0px;">
      <a href="#dpnew3" data-inline="true" back-btn="true" style="border: none;"><img src="back.png" width="50px"></a>
      <a href="#dpnew5" data-inline="true" style="border: none;"><img src="next.png" onclick="newDrive4();" width="50px"></a>
    </div>
    </br>
  </div>

  <div data-role="page" id="dpnew5" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>Your Drive is complete!</strong>

      <div id="accordion">
        <h1>Driving Devon's Listing</h1>
        <div>
          <p>
            Date: 5/20/15
            </br>
            </br>
            From: 21 Wellesley College Rd, Wellesley MA 02481
            </br>
            </br>
            To: Boston Logan Airport
            </br>
            </br>
            Seats open: 3
            </br>
            </br>
            Cost per seat: $25
            </br>
            </br>
          </p>
        </div>
      </div>

    </div>
    <div data-role="footer">
      <a href="home.php" rel="external" data-inline="true" style="border: none;"><img src="home.png" width="50px"></a>
    </div>
    </br>
  </div>

  <!-- END DRIVER PATH-->
  <script type="text/javascript">


    $(document).ready(function()
{
$("#dtBox").DateTimePicker();
});

  </script>
</body>

</html>
