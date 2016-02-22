<?php
require_once 'google-api-php-client/src/Google/autoload.php';
include_once 'includes/db_conn.php';
$pdo = Database::connect();             
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
$client = new Google_Client();
$client->setAuthConfigFile('client_secrets.json');
$client->addScope(Google_Service_Calendar::CALENDAR);
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  //pull my events
  $client->setAccessToken($_SESSION['access_token']);
  $service = new Google_Service_Calendar($client);
  // Print the next 50 events on the user's calendar.
	$calendarId = 'primary';
	$optParams = array(
	  'maxResults' => 50,
	  'orderBy' => 'startTime',
	  'singleEvents' => TRUE,
	  'timeMin' => date('c'),
	);
	$results = $service->events->listEvents($calendarId, $optParams); 
  $JSONresults = json_encode($results);
  $JSONresults = json_decode($JSONresults, true);
  $gmail = $JSONresults['summary'];
  //pull session calender events
  $service = new Google_Service_Calendar($client);
  $calendarId = 'jdqm6altus3iebpsq36igpgtv0@group.calendar.google.com';
  $optParams = array(
    'maxResults' => 500,
    'orderBy' => 'startTime',
    'singleEvents' => TRUE,
    'timeMin' => date('c'),
  );
  $sessionCalendarResults = $service->events->listEvents($calendarId, $optParams); 
  // print_r($sessionCalendarResults);
  //put session calender events into array
   $sessionEventsArray = array();
    foreach ($sessionCalendarResults->getItems() as $event) {
      $start = $event->start->dateTime;
      $end = $event->end->dateTime;
      if (empty($start)) {
        $start = $event->start->date;
      }
      if (empty($end)) {
        $end = $event->end->date;
      }
      $attendees = $event->attendees;
      $attendeesArray = [];
      foreach($attendees as $person) {
        $attendeeEmail = $person->email;
        $attendeesArray[] = $attendeeEmail;
      }
      $sessionEventsArray[] = [$event->getSummary(), $start, $end, $attendeesArray, $event->getId(), $event->getDescription(), $event->getLocation()];
   }
   // print_r($sessionEventsArray);
  //check if email is in system and add information to session if it is
  $sql = "SELECT id, firstname, lastname, email, role FROM users WHERE email LIKE ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($gmail));
      $user = $q->fetch(PDO::FETCH_ASSOC);
  if (empty($user)) {
    header("Location: register.php?err=3");
  }
  else {
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['id'] = $user['id'];
    //get list of tutors to fill out drop down
    $sql = "SELECT firstname, lastname, email FROM users WHERE role LIKE ?";
    $q = $pdo->prepare($sql);
    $q->execute(array('tutor'));
    $tutors = $q->fetchAll();
    //get array of available date/times and the tutor associated with them
    $pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
    $sql = "SELECT users.firstname, users.lastname, users.email, availableDate.date, availableDate.startTime, availableDate.endTime, availableDate.recurring FROM users JOIN user_availableDate ON (users.id = user_availableDate.userID) JOIN availableDate ON (availableDate.id = user_availableDate.availableDateID) WHERE role LIKE ?";
    $q = $pdo->prepare($sql);
    $q->execute(array('tutor'));
    $availableDates = $q->fetchAll();
    $availableDatesArray = [];
    for ($i = 0; $i < count($availableDates); $i++) {
      $firstname = $availableDates[$i]['users.firstname'];
      $lastname = $availableDates[$i]['users.lastname'];
      $email = $availableDates[$i]['users.email'];
      $date = $availableDates[$i]['availableDate.date'];
      $startTime = $availableDates[$i]['availableDate.startTime'];
      $endTime = $availableDates[$i]['availableDate.endTime'];
      $recurring = $availableDates[$i]['availableDate.recurring'];
      $availableDatesArray[] = [$firstname, $lastname, $email, $date, $startTime, $endTime, $recurring];
    }
    // get user's calender items
    $resultsArray = array();
    foreach ($results->getItems() as $event) {
      $start = $event->start->dateTime;
      if (empty($start)) {
        $start = $event->start->date;
      }
      $end = $event->end->dateTime;
      if (empty($end)) {
        $end = $event->end->date;
      }
      $resultsArray[] = [$event->getSummary(), $start, $end, $event->getId(), $event->getDescription(), $event->getLocation()];
   }
  }
  // print_r($resultsArray);
  function convertDate($date) {
    $dateArray = explode('T', $date);
    $dt = DateTime::createFromFormat('Y-m-d', $dateArray[0]);
    $dt = $dt->getTimestamp();
    $day = date("l, F d, Y", $dt);
    if ($dateArray[1]) {
      $time = substr($dateArray[1], 0, 5);
      $startTime = date("g:i a", strtotime($time));
      echo $day.', at '.$startTime;
    }
    else {
      echo $day;
    }
  }
	?>

	<!DOCTYPE html>
	<html>
    <head>
        <meta charset="UTF-8">
        <title>Session Scheduler</title>
        <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/fullcalendar.css">
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body ng-app="app">
    <div class="container">
      <input type="hidden" id="sessionEmail" value="<?php echo $_SESSION['email']; ?>">
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="settings">
          <p>Hello, <?php echo $_SESSION['firstname']; ?><?php if ($_SESSION['role'] == 'tutor') { ?><a href="myaccount.php"> | My Availability</a><?php } ?> | <a data-toggle="modal" href="#logoutModal">Log Out</a></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="mainTitle">
          <h3>Session Scheduler</h3>
        </div>
      </div>
      

    <div ng-view></div>

    <script type = "text/ng-template" id="myCalendar.htm">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" id="eventdropdownbutton" type="button" data-toggle="dropdown">My Upcoming Events
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <?php if (empty($resultsArray)) { echo '<li><p>No upcoming events.</p></li>'; } else { for ($i = 0; $i < 3; $i++) {
              if ($resultsArray[$i]) {
              ?>
              <li><p ><strong><?php convertDate($resultsArray[$i][1]); ?></strong>: <?php echo $resultsArray[$i][0]; ?></p></li>
               <?php } } } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="tabs row">
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab1"><a href="#myCalendar">My Calendar</a></div>
        <?php if ($_SESSION['role'] == 'student') { ?>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab2"><a href="#sessionsCalendar">Schedule A Session</a></div>
        <?php } ?>
        <?php if ($_SESSION['role'] == 'tutor') { ?>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab2"><a href="#allSessionsCalendar">Sessions Calendar</a></div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="cal1">
          <div id="calendar1">
          </div>
        </div>
      </div>
      {{createCalendar()}}
     </script>
     
     <script type = "text/ng-template" id="sessionsCalendar.htm">
     <div class="row">
        <div class="sidebar">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="filterbar">
            <select class="form-control" id="selectfilter" ng-model="selectedItem" ng-change="filterTutor()">
            <option value="">All Tutors</option>
              <?php foreach ($tutors as $person) { ?>
                <option value="<?php echo $person['email']; ?>"><?php echo $person['firstname'].' '.$person['lastname']; ?></option> <?php } ?>
            </select>
        </div>
      </div>
     </div>
      <div class="tabs row">
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab1"><a href="#myCalendar">My Calendar</a></div>
        <?php if ($_SESSION['role'] == 'student') { ?>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab2"><a href="#sessionsCalendar">Schedule A Session</a></div>
        <?php } ?>
        <?php if ($_SESSION['role'] == 'tutor') { ?>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab2"><a href="#allSessionsCalendar">Sessions Calendar</a></div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="cal2">
          <div id="calendar2"></div>
      </div>
      </div>
      {{createCalendar()}}
     </script>

     <script type = "text/ng-template" id="allSessionsCalendar.htm">
     <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" id="eventdropdownbutton" type="button" data-toggle="dropdown">My Upcoming Events
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
            <?php if (empty($resultsArray)) { echo '<li><p>No upcoming events.</p></li>'; } else { for ($i = 0; $i < 3; $i++) {
              if ($resultsArray[$i]) {
              ?>
              <li><p ><strong><?php convertDate($resultsArray[$i][1]); ?></strong>: <?php echo $resultsArray[$i][0]; ?></p></li>
               <?php } } } ?>
            </ul>
          </div>
        </div>
      </div>
     <div class="tabs row">
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab1"><a href="#myCalendar">My Calendar</a></div>
        <?php if ($_SESSION['role'] == 'student') { ?>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab2"><a href="#sessionsCalendar">Schedule A Session</a></div>
        <?php } ?>
        <?php if ($_SESSION['role'] == 'tutor') { ?>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="tab2"><a href="#allSessionsCalendar">Sessions Calendar</a></div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="cal2">
          <div id="calendar2">
          </div>
        </div>
      </div>
      {{createCalendar()}}
     </script>

    <!--create event modal-->
    <div class="modal fade" id="createEventModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Request a New Session</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="newevent.php" method="post">
              <!--hidden input fields to pass to new event-->
                <input name="date" id="hiddenDate" value="" type="hidden">
                <input name="startTime" id="hiddenStartTime" value="" type="hidden">
                <input name="endTime" id="hiddenEndTime" value="" type="hidden">
              <p class="modalp">Please confirm your new session details below:</p>
              <p class="modalp" id="showDay"></p> 
              <p class="modalp" id="showTime"></p> 
            <p class="modalp">Session Name: <input type="text" name="summary" id="summary" value="Tutoring Session - Requested By: <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>" class="form-control" readonly></p>
            <p class="modalp">Location: <input type="text" name="location" id="location" class="form-control"></p>
            <p class="modalp">Description (e.g. "Review Chapter 2"): <input type="text" name="description" id="description" class="form-control" placeholder="Optional"></p>
            <p class="modalp">Tutor: <select name ="tutor" id="tutor" class="form-control"></select></p>
          </div>
          <div class="modal-footer">
            <p><button type="button" class="btn btn-default buttonfloatleft" data-dismiss="modal">Close</button></p>
            <div class="form-actions">
              <p><button type="submit" class="btn btn-primary buttonfloatright">Submit Request</button></p>
            </div>
          </div>
        </form>
        </div>
      </div>
  </div>

    <!--read event modal-->
    <div class="modal fade" id="readEventModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <form class="form-horizontal" action="modifyevent.php" method="post">
              <input name="readEventId" class="readEventId" type="hidden">
            <p class="modalp">Session Name: <input type="text" name="readSummary" id="readSummary" class="form-control" placeholder=""></p>
            <p class="modalp">Location: <input type="text" name="readLocation" id="readLocation" class="form-control" placeholder=""></p>
            <p class="modalp">Description: <input type="text" name="readDescription" id="readDescription" class="form-control" placeholder=""></p>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <p class="modalp">Date:<input type="text" name="readDate" value="" id="datepicker" class="modaldatepicker"></p>
                </div>
              </div><!--end row-->
              <div class="row" ng-controller="endTimeCtrl">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <p class="modalp">Start Time: <select name="readStartTime" id="readStartTime" class="form-control" ng-change="fillEndTime()" ng-model="selectedTime">
                      <option value="08:00:00">8:00am</option>
                      <option value="09:00:00">9:00am</option>
                      <option value="10:00:00">10:00am</option>
                      <option value="11:00:00">11:00am</option>
                      <option value="12:00:00">12:00pm</option>
                      <option value="13:00:00">1:00pm</option>
                      <option value="14:00:00">2:00pm</option>
                      <option value="15:00:00">3:00pm</option>
                      <option value="16:00:00">4:00pm</option>
                      <option value="17:00:00">5:00pm</option>
                      <option value="18:00:00">6:00pm</option>
                      <option value="19:00:00">7:00pm</option>
                      <option value="20:00:00">8:00pm</option>
                    </select></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <p class="modalp">End Time: <select name="readEndTime" id="readEndTime" class="form-control">
                      <option value="08:00:00">8:00am</option>
                      <option value="09:00:00">9:00am</option>
                      <option value="10:00:00">10:00am</option>
                      <option value="11:00:00">11:00am</option>
                      <option value="12:00:00">12:00pm</option>
                      <option value="13:00:00">1:00pm</option>
                      <option value="14:00:00">2:00pm</option>
                      <option value="15:00:00">3:00pm</option>
                      <option value="16:00:00">4:00pm</option>
                      <option value="17:00:00">5:00pm</option>
                      <option value="18:00:00">6:00pm</option>
                      <option value="19:00:00">7:00pm</option>
                      <option value="20:00:00">8:00pm</option>
                    </select></p>
                </div>
              </div><!--end row-->
            <p class="modalp">Attendees: <ul id="readAttendees"></ul></p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
               <p><button type="button" class="btn btn-default readbutton" data-dismiss="modal">Close</button></p>
            </div>
            <div class="form-actions col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <p><button type="submit" class="btn btn-warning readbutton">Modify Session</button></p>
            </div>
          </form>
            <!--hidden form to submit eventId to delete event-->
            <form class="form-horizontal" action="deleteevent.php" method="post">
              <input name="deleteEventId" class="readEventId" type="hidden">
                <div class="form-actions col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <p><button type="submit" class="btn btn-danger readbutton">Cancel Session</button></p>
              </div>
            </form>
          </div><!--end row-->
        </div>
      </div>
  </div>

  <!--personal event notice modal-->
    <div class="modal fade" id="personalCalendarModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <p>Personal calendar event.</p>
            <div class="modal-footer">
              <p><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></p>
            </div>
        </div>
      </div>
  </div>
</div>

  <!--log out alert-->
  <div class="modal fade" id="logoutModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <p>Log out will log out of all Google applications.</p>
            <div class="modal-footer">
              <p><a href="logout.php"><button type="button" class="btn btn-success buttonfloatright">Confirm</button></a></p>
              <p><button type="button" class="btn btn-default buttonfloatleft" data-dismiss="modal">Close</button></p>
            </div>
        </div>
      </div>
  </div>
</div>

  </div><!--end container-->
	  <script src="http://code.jquery.com/jquery-2.1.3.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.3.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="http://momentjs.com/downloads/moment.js"></script>
        <script src="https://code.angularjs.org/1.3.9/angular.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-moment/0.10.3/angular-moment.min.js"></script>
        <script src="//rawgit.com/angular-ui/ui-calendar/master/src/calendar.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.0/fullcalendar.min.js"></script>
        <script src='js/gcal.js'></script>
        <script src="js/angular-route.js"></script>
        <script src="js/client.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">var resultsArray =<?php echo json_encode($resultsArray); ?>; var sessionEventsArray =<?php echo json_encode($sessionEventsArray); ?>; var availableDatesArray =<?php echo json_encode($availableDatesArray); ?>; </script>
        <script src="js/appjs.js"></script>
        <script src="js/controllers.js"></script>
    </body>
</html>
	<?php }
 else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/html/scheduling/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
Status API Training Shop Blog About Pricing
