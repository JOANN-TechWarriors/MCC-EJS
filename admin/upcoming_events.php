<?php 
  include('dbcon.php');
  date_default_timezone_set('Asia/Manila'); 
  include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Event Calendar</title>
  <link href="..//assets/fullcalendar/main.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
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
      background-color: #333;
      color: #fff;
      padding-top: 60px; /* Adjusted to match the height of the navbar */
      overflow-y: auto; /* Enable scrolling if content exceeds height */
      transition: width 0.3s; /* Smooth width transition */
    }

    .sidebar.minimized {
      width: 80px;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .sidebar ul li {
      padding: 10px;
      border-bottom: 1px solid #555;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
    }

    .sidebar ul li a span {
      margin-left: 10px;
      transition: opacity 0.3s;
    }

    .sidebar.minimized ul li a span {
      opacity: 0;
    }

    .sidebar ul li a:hover {
      background-color: #555;
    }

    .logo {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .logo img {
      max-width: 100px;
    }

    .content {
      margin-left: 250px; /* Adjusted to match the width of the sidebar */
      padding: 20px;
      transition: margin-left 0.3s; /* Smooth margin-left transition */
    }

    .content.minimized {
      margin-left: 80px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%; /* Full width on small screens */
        height: auto;
        position: relative;
      }

      .content {
        margin-left: 0;
      }
    }

    .toggle-btn {
      position: fixed;
      top: 20px;
      left: 220px;
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px;
      cursor: pointer;
      transition: left 0.3s; /* Smooth left transition */
      z-index: 1000; /* Ensure button is on top of other elements */
    }

    .toggle-btn.minimized {
      left: 50px;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <button class="toggle-btn" id="toggle-btn">☰</button>
  <div class="logo">
    <img src="../assets/img/mcc_logo.png" alt="Event Judging System Logo">
  </div>
  
  <ul>
    <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span>DASHBOARD</span></a></li>
    <li><a href="home.php"><i class="fas fa-calendar-check"></i> <span>ONGOING EVENTS</span></a></li>
    <li><a href="upcoming_events.php"><i class="fas fa-calendar-alt"></i> <span>UPCOMING EVENTS</span></a></li>
    <li><a href="score_sheets.php"><i class="fas fa-clipboard-list"></i> <span>SCORE SHEETS</span></a></li>
    <li><a href="rev_main_event.php"><i class="fas fa-chart-line"></i> <span>DATA REVIEWS</span></a></li>
    <li><a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> <span>LOGOUT</span></a></li>
  </ul>
</div
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('toggle-btn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('minimized');
    document.getElementById('content').classList.toggle('minimized');
    document.getElementById('toggle-btn').classList.toggle('minimized');
  });
</script>
  <div class="content">
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
            <form>
              <div class="mb-3">
                <input type="hidden" class="form-control" id="eventID">
                <label for="eventTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="eventTitle" required>
              </div>
              <div class="mb-3">
                <label for="eventStart" class="form-label">Start</label>
                <input type="datetime-local" class="form-control" id="eventStart" required>
              </div>
              <div class="mb-3">
                <label for="eventEnd" class="form-label">End</label>
                <input type="datetime-local" class="form-control" id="eventEnd" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelEventButton">Cancel</button>
            <button type="button" class="btn btn-success" id="addEventButton">Save</button>
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelEventButton">Cancel</button>
            <button type="button" class="btn btn-danger" id="deleteEventButton">Delete</button>
            <button type="button" class="btn btn-success" id="updateEventButton">Update</button>
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
        selectable:true,
        selectConstraint:{
          start:new Date().toISOString().slice(0,10),
          end:null
        },
        nowIndicator: true,
        dayMaxEvents: true,
        events: 'get-events.php',
        select: function(info) {
          var start = info.startStr;
          var end = info.endStr;

          var startTime = moment(start).add(8, 'hours').format('YYYY-MM-DDTHH:mm');
          $('#eventStart').val(startTime);

          var endTime = moment(start).add(17, 'hours').format('YYYY-MM-DDTHH:mm');
          $('#eventEnd').val(endTime);
          $('#addEventModal').modal('show');
          calendar.unselect();
        },
        eventClick: function(info) {
          $('#updateEventModal').modal('show');
          $('#updateeventID').val(info.event.id);
          $('#updateeventTitle').val(info.event.title);
          $('#updateeventStart').val(datetimeLocal(info.event.start));
          $('#updateeventEnd').val(datetimeLocal(info.event.end));

          $('#updateEventModalLabel').text('Edit Event');

          $('#updateEventButton').off('click').on('click', function() {
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

  

    $('#addEventButton').on('click', function() {
      var title = $('#eventTitle').val();
      var start = $('#eventStart').val();
      var end = $('#eventEnd').val();
      if (title && start && end) {
        var eventData = {
          title: title,
          start: start,
          end: end
        };
        $.ajax({
          url: 'add-event.php',
          type: 'POST',
          data: eventData,
          success: function(data) {
            calendar.refetchEvents();
            $('#addEventModal').modal('hide');
            $('#eventTitle').val('');
            $('#eventStart').val('');
            $('#eventEnd').val('');
          }
        });
      } else {
        alert('Please fill all required fields');
      }

    });


    function datetimeLocal(dateTimeStr) {
      return moment(dateTimeStr).format('YYYY-MM-DDTHH:mm');
    }
  

</body>
</html>
