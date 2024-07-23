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
        background-color: #fff;
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
        top: 20px;
        right: 20px;
        background-color: transparent;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
    }

    .sidebar .toggle-btn i {
        font-size: 20px;
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
        padding: 15px 20px;
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
        background-color: #1a1a2e;
    }

    .main {
        margin-left: 250px;
        padding: 20px;
        transition: all 0.3s;
    }

    .main.collapsed {
        margin-left: 80px;
    }

    .header {
        background-color: #f8f9fa;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
    }

    .header .profile-dropdown {
        position: relative;
        display: inline-block;
    }

    .header .profile-dropdown img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
    }

    .header .profile-dropdown .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        overflow: hidden;
        z-index: 1000;
    }

    .header .profile-dropdown:hover .dropdown-menu {
        display: block;
    }

    .header .profile-dropdown .dropdown-menu a {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
    }

    .header .profile-dropdown .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            overflow: visible;
        }

        .sidebar.collapsed {
            width: 100%;
        }

        .main {
            margin-left: 0;
        }

        .sidebar .toggle-btn {
            display: block;
        }
    }

    @media (max-width: 576px) {
        .sidebar-heading {
            font-size: 14px;
        }

        .sidebar ul li a {
            font-size: 14px;
        }

        .header {
            padding: 5px 10px;
        }

        .header .profile-dropdown img {
            width: 30px;
            height: 30px;
        }

        .chart-container {
            height: 300px;
        }
    }

    .chart-container {
        position: relative;
        height: 400px;
        width: 100%;
    }
</style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" id="toggle-btn">☰</button>
        <br><br>
        <div class="sidebar-heading">
    <div class="logo-container">
        <img src="../img/logo.png" alt="Logo" class="logo-img">
    </div>
    <span class="header-text">Event Judging System</span>
</div>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span>DASHBOARD</span></a></li>
            <li><a href="home.php"><i class="fas fa-calendar-check"></i> <span>ONGOING EVENTS</span></a></li>
            <li><a href="upcoming_events.php"><i class="fas fa-calendar-alt"></i> <span>UPCOMING EVENTS</span></a></li>
            <li><a href="score_sheets.php"><i class="fas fa-clipboard-list"></i> <span>SCORE SHEETS</span></a></li>
            <li><a href="rev_main_event.php"><i class="fas fa-chart-line"></i> <span>DATA REVIEWS</span></a></li>
        </ul>
    </div>

    <!-- Header -->
    <div class="header">
        <div>
            <!-- Add any left-aligned content here if needed -->
        </div>
        <div class="profile-dropdown">
           <div style="font-size:small;"> <?php echo $name; ?></div>
            <div class="dropdown-menu">
                <a href="edit_organizer.php"> Account Settings</a>
                <a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> <span>LOGOUT</span></a>
            </div>
        </div>
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
            <form>
              <div class="mb-3">
                <input type="hidden" class="form-control" id="eventID">
                <label for="eventTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="eventTitle" required>
              </div>
              <div class="mb-3">
                <label for="eventStart" class="form-label">Start</label>
                <input type="datetime-local"  class="form-control" id="eventStart" required>
              </div>
              <div class="mb-3">
                <label for="eventEnd" class="form-label">End</label>
                <input type="datetime-local"  class="form-control" id="eventEnd" required>
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
        selectConstraint:{
          start: new Date().toISOString().slice(0, 10),
          end: null
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

    function datetimeLocal(datetimeStr) {
      return moment(dateTimeStr).format('YYYY-MM-DDTHH:mm');
    };

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
