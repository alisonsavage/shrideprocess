<!-- home.php has the home login screen and the settings page. -->

<!-- pass kchan4 through the form -->
<?php
session_start();
$PHPSESSID = session_id();

?>
<!DOCTYPE html>

<html>

<head>
  <title>SHRIDE</title>
  <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>

  <script>
    var user = "<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'no user' ?>".toString();
    if (user == "no user") {
      window.location = "login.php";
    } else {
    //  alert(user);

     Parse.initialize("JwqmCZVQV0EHyLNKbOE7eklPE0f7ji7LhH8f2UyQ", "KUqYU0RP5KRhjHY32fwbXSGm9zUAFDO1kSo6hh4y");

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



      Parse.User.logIn(param2, "my pass", {
        success: function(user) {
          // Do stuff after successful login.
        //  alert("login successful");
    //      getFeed();
        },
        error: function(user, error) {
          // The login failed. Check error to see why.
          //this should be because they aren't in the database yet, so we'll add them.
      //    alert("Error: " + error.code + " " + error.message);
        //  alert("not login, new user?");

          window.location="#newuser";

            }

        }
      )


    };

    var name;
    var picture;
    var pronoun;
    var phoneNum;
    var rider;
    var driver;
    var hasCar;
    var hasZipcar;
    var email;
    var text;
    var seats;
    var username;
    function newUser(){
      username= parseQuery();
  //    alert("wtf");
      name = document.getElementById("object").value;
      picture = document.getElementById("picture").value;
      pronoun = document.getElementById("pronouns").value;

      phoneNum = document.getElementById("number").value;

//    alert("Name="+name+"\npicture="+picture+"pronouns="+pronoun+"phonenum="+phoneNum);
  //  window.location = "#carstuff";
};

function newUser2(){
//  alert("wtf");
  rider= document.getElementById("ridebutton").value;
  driver = document.getElementById("drivebutton").value;
  hasCar = document.getElementById("carowner2").value;
  seats = document.getElementById("categorySelect").value;
  hasZipcar = document.getElementById("zipcar").value;
//  alert(rider+"."+driver+"."+hasCar+"."+seats+"."+hasZipcar);
//  window.location = "#pref";
};

function newUser3(){
//  alert("wtf");
  venmo= document.getElementById("venmo").value;
  cash= document.getElementById("cash").value;
  email = document.getElementById("email").value;
  text = document.getElementById("phone").value;
//  alert(email+text+venmo+cash);
  addUser();

};

function parseQuery(){

  var queryString = window.location.search;
  queryString = queryString.substring(1);
  queries = queryString.split("&");
  query = queryString.split("=");
  return query[1];
};

function addUser(){
  Parse.initialize("JwqmCZVQV0EHyLNKbOE7eklPE0f7ji7LhH8f2UyQ", "KUqYU0RP5KRhjHY32fwbXSGm9zUAFDO1kSo6hh4y");

var user = new Parse.User();
      user.set("username", username);
      user.set("name",name);
      user.set("password", "my pass"); //we don't need this though
      user.set("email", username+"@wellesley.edu");
      // other fields can be set just like with Parse.Object
      user.set("phone", phoneNum);
      //user.set("picture", picture);
      user.set("pronouns", pronoun);
      user.set("rider", rider);
      user.set("driver",driver);
      user.set("hasCar", hasCar);
      user.set("hasZipcar",hasZipcar);
      user.set("seats",seats);
      user.set("emailcontact",email);
      user.set("textcontact",text);
      user.set("venmo",venmo);
      user.set("cash",cash);


      user.signUp(null, {
        success: function(user) {
          // Hooray! Let them use the app now.
          alert("yay, new user added");
        },
        error: function(user, error) {
          // Show the error message somewhere and let the user try again.

          alert("Error: " + error.code + " " + error.message);
    }})




  };


/*

  function getFeed(){
  //Once again, we extend the Parse.Object class to make the ListItem class
  PostItem = Parse.Object.extend("Posts");

  //This time, we use Parse.Query to generate a new query, specifically querying the ListItem table.
  query = new Parse.Query(PostItem);

  //We set constraints on the query.
  query.limit = 10;
//  alert("before descending");
  query.descending('createdAt');

  //We submit the query and pass in callback functions.
  query.find({
    success: function(results) {
      // Add the contents of options[0] to #foo:
      for (var i = 0; i < results.length; i++) {
      var object = results[i];
      var time= object.get("when");
      var start= object.get("comingfrom");
      var end= object.get("goingto");
      var array= [time,start,end]
    //  alert(time);
      document.getElementById("feed").appendChild(makeUL(array)); //need to specify fields later
    //  alert("do we get here");
    }


    },
    error: function(error) {
      //Error Callback
    }
  }) };

  function makeUL(array) {
    // Create the list element:
    var timedate= array[0].split(" ");
    var date= timedate[0];
    var time= timedate[1]; //splitting date and time
    //var input= date+"   Time:"+time;


//creating the date one
    var list = document.createElement('li');
    var first= document.createElement('h1');



    first.appendChild(document.createTextNode(date));
    list.appendChild(first);


    var second= document.createElement('h2');



    second.appendChild(document.createTextNode("Time: "+time));
    list.appendChild(second);

    for(var i = 1; i < array.length; i++) {
        // Create the list item:
        var item = document.createElement('p');

        // Set its contents:
        item.appendChild(document.createTextNode(array[i]));

        // Add it to the list:
        list.appendChild(item);
    }

    // Finally, return the constructed list:
    return list;
} */
</script>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-webapp-status-bar-style" content="black">

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/Shride.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  <link href="glDatePicker.default.css" rel="stylesheet" type="text/css">
  <script>
  (function() {
      var dialog = document.getElementById('window');
      document.getElementById('show').onclick = function() {
          dialog.show();
      };
      document.getElementById('exit').onclick = function() {
          dialog.close();
      };
  })();

  //// Add the contents of options[0] to #foo:
  //document.getElementById('foo').appendChild(makeUL(options[0]));

    </script>
</head>

<body>
  
  <!-- home page for the app -->
  <div data-role="page" id="home" data-theme="d">
    <div data-role="header" data-position="inline" style="border-width:0px;">
      <h1>SHRIDE</h1>
      <a href="#popupMenu" data-rel="popup" data-inline="true" data-transition="slide" style="border: none;"><img src="menu.png" width="50px"></a>
      <a href="#help" data-inline="true" style="border: none;"><img src="info.svg" width="50px"></a>
      <div data-role="popup" id="popupMenu" data-overlay-theme="b">
        <ul data-role="listview" data-inset="true" style="width:180px;" data-theme="b">
          <li><a href="manage.php" rel="external" data-icon="manage">Manage</a></li>
          <li><a href="home.php#settings" rel="external" data-icon="gear">Settings</a></li>
          <li><a href="login.php" rel="external" data-icon="star">Logout</a></li>
        </ul>
      </div>

    </div>
    <!-- /header -->

    <div data-role="content">




      <ul data-role="listview">
        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="ride.svg" width="80px">
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
            <img src="ride.svg" width="80px">
            <h3 class="ui-li-heading">5/19/15, 10:00am</h3>
            <p class="ui-li-desc">Davis Square to South Station</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="drive.svg">
            <h3 class="ui-li-heading">5/19/15, 8:00pm</h3>
            <p class="ui-li-desc">Harvard Square to Wellesley</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <img src="drive.svg">
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
            <img src="drive.svg">
            <h3 class="ui-li-heading">5/21/15, 11:00am</h3>
            <p class="ui-li-desc">Wellesley to Logan Airport</p>
          </a>
        </li>

      </ul>

<!-- it works but it doesn't look pretty so for later...
      <ul id="feed" data-role="listview">

      </ul> -->

</div>

  <!--  <div data-role="footer" data-position="inline"> -->
  <div data-role="footer" id="addnewsection" data-position="inline">

    <table>
      <tr>
        <td>
  <a href="#" id="started" style="float:left;"><img src="plus.png" width="50px"></a></td>

  <td>
    <div id="modal" style="display:none;"><div id="closed">
      <a href="ride.php" title="Create a ride" class="tooltip" rel="external"><img src="ride.svg" width="50px" style="margin-right:50px;"></a>

        <a data-transition="flow" data-prefetch="true" href="drive.php" rel="external" title="Create a drive" class="tooltip"><img src="drive.svg" width="50px"></a>

</div> </td>

      </tr>

      </table>

      <div id="shade"></div>
    </div>
</div>
  </div>


  <!-- SINGLE DRIVE IN NEWSFEED-->

  <div data-role="page" id="drive1" data-theme="d">
    <div data-role="header" data-position="inline" style="border: none;">
      <a href="home.php" rel="external"><img src="back.png" width="50px"></a>
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
      <a href="#join" data-role="button" data-mini="true" onclick="alert('Are you sure?');">Join</a>
      </br>

      <ul data-role="listview">

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <p class="ui-li-desc">5/18/15, Wellesley to South Station</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
            <p class="ui-li-desc">5/19/15, Davis Square to South Station</p>
          </a>
        </li>

        <li>
          <a href="#drive1" class="ui-link-inherit">
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
    <strong>E-mail: </strong></br> asavage2@wellesley.edu
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
  <div data-role="page" id="help" data-theme="d">
    <div data-role="header" data-position="inline">
      <h1>SHRIDE</h1>
      <a href="#home" data-inline="true" ><img src="back.png" width="50px"></a>

    </div>
    <div data-role="content" data-position="inline">
      <h2>Help: Icon Guide</h2></br>
      <img src="plus.png" alt="alternate text" width="50px" height="50px" style="float:right;">
      <p> Tap to create new ride or drive:  </p>
    </br>
      <img src="drive.svg" alt="alternate text" width="50px" height="50px" style="float:right;">
      <p>Drives:</p></br></br>
      <img src="ride.svg" alt="alternate text" width="50px" height="50px" style="float:right;">
    </br>
    <p>Rides:</p>
    </div>
    </div>


  <div data-role="page" id="newuser" data-theme="d">

    <div data-role="header" data-position="inline">

      <h1>SHRIDE</h1>
    </div>

    <div data-role="content">
      <form id="registration" method="post">
<fieldset>
<h2>Please fill out the info below for your profile.</h2>
              <label for="object">
                <strong>Your name:</strong>
              </label>
              <input type="text" id="object" name="object" />
              <label for="phone">
                <strong>Phone number?</strong>
              </label>
              <input type="tel" id="number" maxlength="11">
              <label for="picture">
                <strong>Upload a photo of yourself:</strong>
              </label>
              <input type="file" id="picture" accept="image/*;capture=camera">


                <label for="combobox">
                  <strong>Your preferred pronouns?</strong>
                </label>
                <select name="combobox" id="pronouns">
                  <option value="">Select one...</option>
                  <option value="female">She, hers, hers</option>
                  <option value="male">He, him, his</option>
                  <option value="genderneutral">They, them, theirs</option>

                </select>
                <a href="#carstuff" onclick="return newUser();"><img src="next.png" width="50px" style="float:right;"></a>
              </fieldset>
            </form>
          </div>

          </div>


                <div data-role="page" id="carstuff" data-theme="d">

                  <div data-role="header" data-position="inline">

                    <h1>SHRIDE</h1>
                  </div>

                  <div data-role="content">
                    <form id="cardetails" method="post">
                      <fieldset>
            <div class="flipbuttons">
            <label for="flipbuttons">
                  <h2><strong>Select your role.</strong></h2>
                </label>

                    <label for="ridebutton">
                      <strong>Rider:</strong>
                    </label>

                    <select name="flip-1" id="ridebutton" data-role="slider">
                      <option value="off">Off</option>
                      <option value="on">On</option>
                    </select>

                    <label for="drivebutton">
                      <strong>Driver:</strong>
                    </label>
                    <select name="flip-1" id="drivebutton" class="ui-state-default ui-corner-all" data-role="slider">
                      <option value="off">Off</option>
                      <option value="on">On</option>
                    </select>

            </div>
            <div class="drive" style="display: none;">


                  <label for="flip-1">
                    <strong>Own a car?:</strong>
                  </label>
                  <select name="flip-1" id="carowner2" data-role="slider">
                    <option value="off">Off</option>
                    <option value="on">On</option>
                  </select>

                  <div class="seats" style="display: none;">
                    <label for="categorySelect">
                      <strong>How many seats?:</strong>
                    </label>
                    <select name="categorySelect" id="categorySelect" name="categorySelect">
                      <option value="one">1</option>
                      <option value="two">2</option>
                      <option value="three">3</option>
                      <option value="four">4</option>
                      <option value="five">5</option>
                      <option value="six">6</option>
                    </select>

                  </div>


                  <label for="zipcar">
                    <strong>Zipcar:</strong>
                  </label>
                  <select name="flip-1" id="zipcar" class="ui-state-default ui-corner-all" data-role="slider">
                    <option value="off">Off</option>
                    <option value="on">On</option>
                  </select>

            </div>
            <a href="#pref" onclick="return newUser2();"><img src="next.png" width="50px" style="float:right;"></a>
            </fieldset>
          </form>
        </div>
        </div>

        <div data-role="page" id="pref" data-theme="d">

          <div data-role="header" data-position="inline">

            <h1>SHRIDE</h1>
          </div>

  <div data-role="content">
    <form id="preferences" method="post">
<fieldset>
            <div class="flipbuttons">
              <label for="flip-1">
                <strong>Preferred payment?</strong>
              </label>
              <br>

                    <label for="venmo">
                      <strong>Venmo:</strong>
                    </label>
                    <select name="flip-1" id="venmo" data-role="slider">
                      <option value="off">Off</option>
                      <option value="on">On</option>
                    </select>

                    <label for="cash">
                      <strong>Cash/Alternatives:</strong>
                    </label>
                    <select name="flip-1" id="cash" class="ui-state-default ui-corner-all" data-role="slider">
                      <option value="off">Off</option>
                      <option value="on">On</option>
                    </select>

            </div>
            <div class="notificationbuttons">
              <label for="flip-1">
                <strong>Preferred notifications?</strong>
              </label>
              <br>

                    <label for="phone">
                      <strong>Text?</strong>
                    </label>

                    <select name="flip-1" id="phone" data-role="slider">
                      <option value="off">Off</option>
                      <option value="on">On</option>
                    </select>

                    <label for="email">
                      <strong>Email?</strong>
                    </label>
                    <select name="flip-1" id="email" class="ui-state-default ui-corner-all" data-role="slider">
                      <option value="off">Off</option>
                      <option value="on">On</option>
                    </select>

            </div>
            <button onclick="newUser3();">Confirm</button>

          </fieldset>







    </form>
  </div> </div>



    <!-- Settings 1 -->

    <div data-role="page" id="settings" data-theme="d">
      <div data-role="header" data-position="inline">
        <h1>SHRIDE</h1>
      </div>
      <!-- /header -->
      <div data-role="content">

        <label for="flip-1">
          <strong>Test notifications</strong>
        </label>
        <select name="flip-1" id="flip-1" data-role="slider">
          <option value="off">Off</option>
          <option value="on">On</option>
        </select>
        </br>
        <label for="flip-1">
          <strong>Privacy</strong>
        </label>
        <select name="flip-1" id="flip-1" data-role="slider">
          <option value="off">Off</option>
          <option value="on">On</option>
        </select>
        </br>
        <label for="flip-1">
          <strong>Email Public</strong>
        </label>
        <select name="flip-1" id="flip-1" data-role="slider">
          <option value="off">Off</option>
          <option value="on">On</option>
        </select>
        </br>
        <label for="flip-1">
          <strong>Phone Number Public</strong>
        </label>
        <select name="flip-1" id="flip-1" data-role="slider">
          <option value="off">Off</option>
          <option value="on">On</option>
        </select>


        <a href="#profile" data-role="button" data-mini="true">Edit profile</a>

      </div>
      </br>
      <div data-role="footer">
        <a href="home.php" rel="external" data-inline="true" style="border: none;"><img src="home.png" width="50px"></a>
      </div>
    </div>

    <!-- Settings 2 -->


    <div data-role="page" id="profile" data-theme="d">
      <div data-role="header" data-position="inline">
        <a href="#settings" data-role="button" data-mini="true">Back</a>
        <h1>SHRIDE</h1>
      </div>
      <!-- /header -->
      <div data-role="content">

        <!-- Forms -->


        <form method="get" action="Submitted.html" id="register" onsubmit="return validateForm();">

          <!-- FORM FIELDS GO HERE -->
          <label for="name">First Name:</label>
          <!-- form errors <div class="error" id="name-error">First name is a required field.</div>  -->
          <input type="text" name="name" id="name" value="Alison">

          <label for="email">Last Name:</label>
          <!-- form errors <div class="error" id="name-error">First name is a required field.</div>  -->
          <input type="text" name="lastname" id="lastname" value="Savage">

          <label for="dob">Wellesley Username:</label>
          <!-- form errors <div class="error" id="name-error">First name is a required field.</div>  -->
          <input type="email" name="email" id="email" value="asavage2">

          <label for="pwd">Phone number:</label>
          <!-- form errors <div class="error" id="name-error">First name is a required field.</div>  -->
          <input type="tel" name="phone" id="phone">





          <br />

        </form>
        Do you still:

        <!-- this is for the drivers only -->
        <div class="drive">

          <tr>
            <td>
              <label for="flip-1">
                <strong>Own a car?:</strong>
              </label>
              <select name="flip-1" id="carowner" data-role="slider">
                <option value="off">Off</option>
                <option value="on">On</option>
              </select>

              <div class="seats" style="display: none;">
                <label for="categorySelect">
                  <strong>How many seats?:</strong>
                </label>
                <select name="categorySelect" id="categorySelect" name="categorySelect">
                  <option value="one">1</option>
                  <option value="two">2</option>
                  <option value="three">3</option>
                  <option value="four">4</option>
                  <option value="five">5</option>
                  <option value="six">6</option>
                </select>

              </div>

            </td>
            <td>
              <label for="button">
                <strong>Zipcar:</strong>
              </label>
              <select name="flip-1" id="zipcar" class="ui-state-default ui-corner-all" data-role="slider">
                <option value="off">Off</option>
                <option value="on">On</option>
              </select>
            </td>
          </tr>

        </div>
        <!--
        <label for="flip-1">
          <strong>rider?</strong>
        </label>
        <select name="flip-1" id="flip-1" data-role="slider">
          <option value="off">Off</option>
          <option value="on">On</option>
        </select>
        </br>
        <label for="flip-1">
          <strong>driver?</strong>
        </label>
        <select name="flip-1" id="drivebutton" data-role="slider">
          <option value="off">Off</option>
          <option value="on">On</option>
        </select>
        </br>
        <div class="drive" style="display:none;">
          <form id="contact" action="/contact" method="post">
            <script language="JavaScript" type="text/javascript">
            </script>
            <div class="two-thirds column" id="main">
              <fieldset>
                <label for="categorySelect">
                  <strong>Seats</strong>
                  </br>
                </label>
                <select id="categorySelect" name="categorySelect">
                  <option value="one">1</option>
                  <option value="two">2</option>
                  <option value="three">3</option>
                  <option value="four">4</option>
                  <option value="five">5</option>
                  <option value="six">6</option>
                </select>
              </fieldset>
            </div>
          </form>
        </div>
  -->
        </br>
        <a href="#create" data-role="button" data-mini="true"><img src="next.png" width="50px" style="float:right;"></a>
      </div>
      </br>
      <div data-role="footer">
        <div data-role="navbar">
          <ul>
            <li> <a href="#home" data-icon="home">Home</a>
              <li> <a href="#settings" data-icon="gear">Settings</a>
                <li> <a href="" data-icon="star">Logout</a>
          </ul>
        </div>
      </div>
    </div>

    <!-- Create profile -->


      <!-- home page for the app -->
      <div data-role="page" id="create" data-theme="d">
        <div data-role="header" data-position="inline">

          <a href="#profile" data-role="button" data-mini="true">Back</a>


          <h1>SHRIDE</h1>
        </div>
        <!-- /header -->
        <div data-role="content">

          Edit your Shride Profile!

          <P>
            <img src="Savage_photo.png" width="200" alt="profile picture" />


            <a href="#" data-role="button" data-mini="true" onClick="alert('Uploaded!');">Upload Profile Picture</a>
            </br>

            <form id="contact" action="/contact" method="post">
              <script language="JavaScript" type="text/javascript">
              </script>
              <div class="two-thirds column" id="main">
                <fieldset>
                  <label for="categorySelect">
                    <strong>Preferred Pronouns:</strong>
                    </br>
                  </label>
                  <select id="categorySelect" name="categorySelect">
                    <option value="they/them/theirs">they/them/theirs</option>
                    <option value="she/her/hers">she/her/hers</option>
                    <option value="he/him/his">he/him/his</option>
                  </select>
                </fieldset>
              </div>
            </form>

            </br>
            <a href="home.php" rel="external" data-role="button" data-mini="true" onClick="alert('Changes saved!');">Save changes</a>


        </div>
        </br>
        <div data-role="footer">
          <a href="home.php" rel="external" data-inline="true" style="border: none;"><img src="home.png" width="50px"></a>
        </div>
      </div>

    <script type="text/javascript">
      $(function() {
        $('#drivebutton').change(function() {
          if ($('.drive').is(':visible')) {
            $('.drive').hide();
          } else {
            $('.drive').show();
          }
        });
      });
      $(function() {
        $('#carowner').change(function() {
          if ($('.seats').is(':visible')) {
            $('.seats').hide();
          } else {
            $('.seats').show();
          }
        });
      });
      $(function() {
        $('#carowner2').change(function() {
          if ($('.seats').is(':visible')) {
            $('.seats').hide();
          } else {
            $('.seats').show();
          }
        });
      });



                  var modal= document.getElementById('modal');
                  var shade= document.getElementById('shade');
                  document.getElementById('started').onclick= function() {
                      modal.style.display=shade.style.display= 'block';

                  };
                  document.getElementById('closed').onclick= function() {
                      modal.style.display=shade.style.display= 'none';

                  };

                  // This code is a workaround for IE6's lack of support for the
                  // position: fixed style.
                  //
                  if (!('maxHeight' in document.body.style)) {
                      function modalsize() {
                          var top= document.documentElement.scrollTop;
                          var winsize= document.documentElement.offsetHeight;
                          var docsize= document.documentElement.scrollHeight;
                          shade.style.height= Math.max(winsize, docsize)+'px';
                          modal.style.top= top+Math.floor(winsize/3)+'px';
                      };
                      modal.style.position=shade.style.position= 'absolute';
                      window.onscroll=window.onresize= modalsize;
                      modalsize();
                  }




    </script>
<!--    <div>Icons made by <a href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div> -->
  </body>

</html>
