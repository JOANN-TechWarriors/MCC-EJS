<?php 
  include('dbcon.php');
  date_default_timezone_set('Asia/Manila'); 
  include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../img/logo.png"/>
  <title>Event Judging System</title>  
  <link href="..//assets/fullcalendar/main.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="..//assets/fullcalendar/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
  <script src="..//assets/fullcalendar/moment.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      background-color: #27293d;
      color: #fff;
      padding-top: 20px;
      transition: all 0.3s;
      overflow: hidden;
    }

    .sidebar.collapsed {
      width: 80px;
    }

    .sidebar .toggle-btn {
      position: absolute;
      top: 15px;
      right: -0px;
      background-color: transparent;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
    }

    .sidebar .toggle-btn i {
      font-size: 18px;
    }

    .sidebar-heading {
      text-align: center;
      padding: 10px 0;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .logo-container {
      display: block;
      margin-bottom: 10px;
    }

    .logo-img {
      max-width: 100%;
      height: auto;
    }

    .header-text {
      display: block;
      font-size: 20px;
      margin-top: 20px;
    }

    .sidebar-heading img {
        max-width: 50px;
        max-height: 50px;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .sidebar ul li {
      padding: 10px;
      border-bottom: 1px solid #555;
      transition: all 0.3s;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
    }

    .sidebar ul li a i {
      margin-right: 10px;
      transition: margin 0.3s;
    }

    .sidebar.collapsed ul li a i {
      margin-right: 0;
    }

    .sidebar ul li a span {
      display: inline-block;
      transition: opacity 0.3s;
    }

    .sidebar.collapsed ul li a span {
      opacity: 0;
      width: 0;
      overflow: hidden;
    }

    .sidebar ul li a:hover {
      background-color: #555;
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      transition: all 0.3s;
    }

    .main.collapsed {
      margin-left: 80px;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .main {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar" id="sidebar">
  <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="sidebar-heading">
      <img src="../img/logo.png" alt="Logo">
      <div>Event Judging System</div>
    </div>
    <ul>
        <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span>DASHBOARD</span></a></li>
        <li><a href="home.php"><i class="fas fa-calendar-check"></i> <span>ONGOING EVENTS</span></a></li>
        <li><a href="upcoming_events.php"><i class="fas fa-calendar-alt"></i> <span>UPCOMING EVENTS</span></a></li>
        <li><a href="score_sheets.php"><i class="fas fa-clipboard-list"></i> <span>SCORE SHEETS</span></a></li>
        <li><a href="rev_main_event.php"><i class="fas fa-chart-line"></i> <span>DATA REVIEWS</span></a></li>
        <li><a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> <span>LOGOUT</span></a></li>
    </ul>
  </div>

  <div class="main" id="main-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal" id="addEvent">
            Add Event
          </button>
          <br><br>
          <div id="calendar"></div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
        </div>
        <div class="modal-body">
          <form id="addEventForm">
            <div class="mb-3">
              <input type="hidden" class="form-control" id="eventID">
              <label for="eventTitle" class="form-label">Title</label>
              <input type="text" class="form-control" id="eventTitle" name="main_event" required>
            </div>
            <div class="mb-3">
              <label for="eventStart" class="form-label">Start</label>
              <input type="datetime-local" class="form-control" id="eventStart" name="date_start" required>
            </div>
            <div class="mb-3">
              <label for="eventEnd" class="form-label">End</label>
              <input type="datetime-local" class="form-control" id="eventEnd" name="date_end" required>
            </div>
            <div class="mb-3">
              <label for="eventTime" class="form-label">Event Time</label>
              <input type="time" class="form-control" id="eventTime" name="event_time" required>
            </div>
            <div class="mb-3">
              <label for="eventPlace" class="form-label">Place</label>
              <input type="text" class="form-control" id="eventPlace" name="place" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="addEventButton">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelEventButton">Cancel</button>
        </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="updateEventModal" tabindex="-1" aria-labelledby="updateEventModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateEventModalLabel">Edit Event</h5>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <input type="hidden" class="form-control" id="updateeventID">
                <label for="updateeventTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="updateeventTitle" required>
              </div>
              <div class="mb-3">
                <label for="updateeventBanner" class="form-label">Banner Image</label>
                <input type="file" class="form-control" id="updateeventBanner" name="eventBanner" accept="image/*">
              </div>
              <div class="mb-3">
                <label for="updateeventStart" class="form-label">Start</label>
                <input type="datetime-local" class="form-control" id="updateeventStart" required>
              </div>
              <div class="mb-3">
                <label for="updateeventEnd" class="form-label">End</label>
                <input type="datetime-local" class="form-control" id="updateeventEnd" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="updateEventButton">Update</button>
            <button type="button" class="btn btn-danger" id="deleteEventButton">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelEventButton">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  var calendarEl = document.getElementById('calendar');
  var calendar;

  document.addEventListener('DOMContentLoaded', function() {
  calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    initialDate: '<?php echo date('Y-m-d') ?>',
    weekNumbers: true,
    navLinks: true,
    editable: true,
    selectable: true,
    selectConstraint: {
      start: new Date().toISOString().slice(0, 10),
      end: null
    },
    nowIndicator: true,
    dayMaxEvents: true,
    events: {
      url: 'get-events.php',
      method: 'GET',
      failure: function() {
        alert('There was an error while fetching events!');
      }
    },
    select: function(info) {
      var start = info.startStr;
      var end = info.endStr;

      var startTime = roundToNearestHalfHour(start);
      $('#eventStart').val(startTime);

      var endTime = roundToNearestHalfHour(end);
      $('#eventEnd').val(endTime);
      $('#addEventModal').modal('show');
      calendar.unselect();
    },
    eventClick: function(info) {
      $('#updateEventModal').modal('show');
      $('#updateeventID').val(info.event.id);
      $('#updateeventTitle').val(info.event.title);
      $('#updateeventStart').val(roundToNearestHalfHour(datetimeLocal(info.event.start)));
      $('#updateeventEnd').val(roundToNearestHalfHour(datetimeLocal(info.event.end)));

      $('#updateEventModalLabel').text('Edit Event');

      $('#updateEventButton').on('click', function() {
        var id = $('#updateeventID').val();
        var title = $('#updateeventTitle').val();
        var start = $('#updateeventStart').val();
        var end = $('#updateeventEnd').val();
        if (title && start && end) {
          var eventData = {
            id: id,
            title: title,
            start: start,
            end: end
          };
          $.ajax({
            url: 'update-event.php',
            type: 'POST',
            data: eventData,
            success: function(data) {
              var response = JSON.parse(data);
              if (response.status === 'error') {
                alert(response.message);
              } else {
                calendar.refetchEvents();
                $('#updateEventModal').modal('hide');
                $('#updateeventID').val('');
                $('#updateeventTitle').val('');
                $('#updateeventStart').val('');
                $('#updateeventEnd').val('');
              }
            }
          });
        } else {
          alert('Please fill all required fields');
        }
      });

      $('#deleteEventButton').off('click').on('click', function() {
        var id = $('#updateeventID').val();
        var title = $('#updateeventTitle').val();
        var start = $('#updateeventStart').val();
        var end = $('#updateeventEnd').val();
        if (title && start && end) {
          var eventData = {
            id: id,
            title: title,
            start: start,
            end: end
          };
          $.ajax({
            url: 'delete-event.php',
            type: 'POST',
            data: eventData,
            success: function(data) {
              calendar.refetchEvents();
              $('#updateEventModal').modal('hide');
              $('#updateeventID').val('');
              $('#updateeventTitle').val('');
              $('#updateeventStart').val('');
              $('#updateeventEnd').val('');
            }
          });
        } else {
          alert('Please fill all required fields');
        }
      });

      $('#cancelEventButton').off('click').on('click', function() {
        $('#updateeventID').val('');
        $('#updateeventTitle').val('');
        $('#updateeventStart').val('');
        $('#updateeventEnd').val('');
      });
    }
  });
  calendar.render();

  var currentDateTime = new Date().toISOString().slice(0, 16);
  $('#eventStart').attr('min', currentDateTime);
  $('#eventEnd').attr('min', currentDateTime);
  $('#updateeventStart').attr('min', currentDateTime);
  $('#updateeventEnd').attr('min', currentDateTime);
});

function roundToNearestHalfHour(datetimeStr) {
  var momentObj = moment(datetimeStr);
  var minutes = momentObj.minutes();
  var roundedMinutes = Math.round(minutes / 30) * 30;
  if (roundedMinutes === 60) {
    momentObj.add(1, 'hour');
    roundedMinutes = 0;
  }
  return momentObj.minutes(roundedMinutes).seconds(0).format('YYYY-MM-DDTHH:mm');
}

function datetimeLocal(datetimeStr) {
  return moment(datetimeStr).format('YYYY-MM-DDTHH:mm');
}

$('#addEventButton').on('click', function() {
  var form = document.getElementById('addEventForm');
  var formData = new FormData(form);
  
  $.ajax({
    url: 'add-event.php',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
      var data = JSON.parse(response);
      if (data.status === 'success') {
        alert('Event added successfully!');
        $('#addEventModal').modal('hide');
        form.reset();
        calendar.refetchEvents();
      } else {
        alert('Failed to add event: ' + data.message);
      }
    },
    error: function() {
      alert('An error occurred while adding the event.');
    }
  });
});

$('#logout').on('click', function() {
  $.ajax({
    url: 'logout.php',
    success: function(response) {
      window.location.href = 'index.php';
    }
  });
});

$('#toggle-btn').on('click', function() {
  $('#sidebar').toggleClass('collapsed');
  $('#main-content').toggleClass('collapsed');
  $(this).toggleClass('collapsed');
});
</script>

</body>
</html>
