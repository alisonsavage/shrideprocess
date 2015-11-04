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
          alert("login successful");
        },
        error: function(user, error) {
          // The login failed. Check error to see why.
          alert("Error: " + error.code + " " + error.message);
          alert("not login, new user?");
          var user = new Parse.User();
          user.set("username", param2);
          user.set("password", "my pass"); //we don't need this though
          user.set("email ", " <? php echo $user ?> @wellesley.edu ");
          // other fields can be set just like with Parse.Object
          user.set("phone ", "650 - 555 - 0000 ");
          user.signUp(null, {
            success: function(user) {
              // Hooray! Let them use the app now.
              alert("yay, new user added");
            },
            error: function(user, error) {
              // Show the error message somewhere and let the user try again.

              alert("Error: " + error.code + " " + error.message);
            }
          })
        }
      })


    };

  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/Shride.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-gmaps-latlon-picker.css" />
  <script src="js/jquery-gmaps-latlon-picker.js"></script>

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

  function newRide(){
    var datetime = document.getElementById("datetime").value;
    var addressfrom = document.getElementById("addressfrom").value;
    var addressto = document.getElementById("addressto").value;
    var passengers = document.getElementById("passengers").value;
    var cost1 = document.getElementById("cost1").value;
    var cost2 = document.getElementById("cost2").value;
    alert(datetime+addressfrom+addressto+passengers+cost1+cost2);
    window.location="#rpnew2";
    window.location="#rpnew3";
    window.location="#rpnew4";
  }

  </script>

</head>

<body>
  <!-- RIDER NEWSFEED -->

  <div data-role="page" id="ridenewsfeed" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="" data-rel="back" back-btn="true">Back</a>

      <h1>SHRIDE</h1>
    </div>
    <!-- /header -->
    <div data-role="content" class="ui-content">
      <a href=#createnewride data-role="button" data-mini="true">Create New Ride</a>
      </br>
      <ul data-role="listview">
        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/18/15, 3:00pm</h3>
            <p class="ui-li-desc">Wellesley to Logan Airport</p>
          </a>
        </li>

        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/18/15, 7:00pm</h3>
            <p class="ui-li-desc">Wellesley to South Station</p>
          </a>
        </li>

        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/19/15, 10:00am</h3>
            <p class="ui-li-desc">Davis Square to South Station</p>
          </a>
        </li>

        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/19/15, 8:00pm</h3>
            <p class="ui-li-desc">Harvard Square to Wellesley</p>
          </a>
        </li>

        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/20/15, 1:00pm</h3>
            <p class="ui-li-desc">Logan Airport to Wellesley</p>
          </a>
        </li>

        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/21/15, 12:00am</h3>
            <p class="ui-li-desc">Government Center to Wellesley</p>
          </a>
        </li>

        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/21/15, 11:00am</h3>
            <p class="ui-li-desc">Wellesley to Logan Airport</p>
          </a>
        </li>

      </ul>
    </div>
    </br>
    <div data-role="footer">
      <div data-role="navbar">
        <ul>
          <li> <a href="#home" data-icon="home">Home</a>
            <li> <a href="#gear" data-icon="gear">Settings</a>
              <li> <a href="#star" data-icon="star">Logout</a>
        </ul>
      </div>
    </div>
  </div>

  <!-- END RIDER NEWSFEED-->

  <!-- SINGLE RIDE IN NEWSFEED-->

  <div data-role="page" id="ride1" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="dp" data-rel="back" back-btn="true">Back</a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content" class="ui-content">
      <ul data-role="listview">
        <li>
          <a href="#ride1" class="ui-link-inherit">
            <img src="car.png">
            <h3 class="ui-li-heading">5/18/15, 3:00pm</h3>
            <p class="ui-li-desc">To: Logan Airport</br>
              </br>From: Wellesley</br>
              </br>How many seats open: 4</br>
              </br>Cost per person: $20</br>
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
    <div data-role="footer">
      <div data-role="navbar">
        <ul>
          <li> <a href="#home" data-icon="home">Home</a>
            <li> <a href="#gear" data-icon="gear">Settings</a>
              <li> <a href="#star" data-icon="star">Logout</a>
        </ul>
      </div>
    </div>
  </div>

  <!-- CONTACT INFO-->

  <div data-role="page" id="contact" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="dp" data-rel="back" back-btn="true">Back</a>
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

  <!-- JOIN RIDE CONFIRMATION -->

  <div data-role="page" id="join" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="dp" data-rel="back" back-btn="true">Back</a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content" class="ui-content">
      <p>Your ride has been added to your profile. You will be notified of your ride via text 30 minutes prior to departure.</br>
        -----------------------
        </br>To: Logan Airport
        </br>From: Wellesley
        </br>3 more seats are open in this ride.</p>
    </div>
    <div data-role="footer">
      <div data-role="navbar">
        <ul>
          <li> <a href="#home" data-icon="home">Home</a>
            <li> <a href="#gear" data-icon="gear">Settings</a>
              <li> <a href="#star" data-icon="star">Logout</a>
        </ul>
      </div>
    </div>
  </div>

  <!-- CREATE NEW RIDE -->

  <div data-role="page" id="createnewride" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="#ridenewsfeed" data-role="button" data-mini="true">Cancel</a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>When do you need the ride?</strong>
      <!--CALENDAR HERE -->
      </br>
      </br>

      <p>Enter Date and Time: </p>
       <input type="text" id="datetime" name="datetime" data-field="datetime" readonly>

       <div id="dtBox"></div>

      </br>
      </br>
    </div>
    <div data-role="footer">
      <a data-icon="carat-l" data-rel="back" back-btn="true">Back</a>
      <button onclick="newRide();">Next</button>

    </div>
    </br>
  </div>

  <div data-role="page" id="rpnew2" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="#ridenewsfeed" data-role="button" data-mini="true">Cancel</a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>Where will you be coming from (Enter Street, Number and Town)?</strong>
      <!--GOOGLE MAP HERE -->
      <fieldset class="gllpLatlonPicker">
        <input type="text" id="addressfrom" name="addressfrom" class="gllpSearchField">
        <input type="button" class="gllpSearchButton" value="search">
        <div class="gllpMap">Google Maps</div>
        <input type="hidden" class="gllpLatitude" value="20" />
        <input type="hidden" class="gllpLongitude" value="20" />
        <input type="hidden" class="gllpZoom" value="3" />
      </fieldset>
    </div>
    <div data-role="footer">
      <a data-icon="carat-l" data-rel="back" back-btn="true">Back</a>
      <button onclick="newRide();">Next</button>
      </div>
    </br>
  </div>

  <div data-role="page" id="rpnew3" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="#ridenewsfeed" data-role="button" data-mini="true">Cancel</a>
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>Where will you be going?</strong>
      <!--GOOGLE MAP HERE -->
      <fieldset class="gllpLatlonPicker">
        <input type="text" id="addressto" name="addressto" class="gllpSearchField">
        <input type="button" class="gllpSearchButton" value="search">
        <div class="gllpMap">Google Maps</div>
        <input type="hidden" class="gllpLatitude" value="20" />
        <input type="hidden" class="gllpLongitude" value="20" />
        <input type="hidden" class="gllpZoom" value="3" />
      </fieldset>
    </div>
    <div data-role="footer">
      <a data-icon="carat-l" data-rel="back" back-btn="true">Back</a>
      <button onclick="newRide();">Next</button>
        </div>
    </br>
  </div>

  <div data-role="page" id="rpnew4" data-theme="d">
    <div data-role="header" data-position="inline">
      <a href="#ridenewsfeed" data-role="button" data-mini="true">Cancel</a>
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
            <label for="passengers">
              <strong>How many passengers?</strong>
              </br>
            </label>
            <select id="passengers" name="passengers">
              <option value="one">1</option>
              <option value="two">2</option>
              <option value="three">3</option>
              <option value="four">4</option>
              <option value="five">5</option>
              <option value="six">6</option>
            </select>
            <label for="cost1">
              </br>
              <strong>Preferred Cost</strong>
              </br>
              Between
            </label>
            <select id="cost1" name="cost1">
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

            <label for="cost2">
              and
              </br>
            </label>
            <select id="cost2" name="cost2">
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
          </fieldset>
        </div>
        </br>
      </form>
    </div>
    <div data-role="footer">
      <a data-icon="carat-l" data-rel="back" back-btn="true">Back</a>
      <button onclick="newRide();">Next</button>
        </div>
    </br>
  </div>

  <div data-role="page" id="rpnew5" data-theme="d">
    <div data-role="header" data-position="inline">
      <h1>SHRIDE</h1>
    </div>
    <div data-role="content">
      <strong>Your Ride is Complete!</strong>

      <div id="accordion">
        <h1>Your Listing</h1>
        <div>
          <p>
            Date:
            </br>
            </br>
            From:
            </br>
            </br>
            To:
            </br>
            </br>
            Passengers:
            </br>
            </br>
            Price Range:
            </br>
            </br>
          </p>
        </div>
      </div>

    </div>
    <div data-role="footer">
      <a href="#ridenewsfeed" data-role="button" data-mini="true">Return to Ride Newsfeed</a>
    </div>
    </br>
  </div>

  <script type="text/javascript">


    $(document).ready(function()
{
$("#dtBox").DateTimePicker();
});

  </script>
</body>

</html>
