<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</head>
<body>
    <div id="sidebar">
        <button id="toggle-btn"><i class="fas fa-bars"></i></button>
        <!-- Add your sidebar content here -->
    </div>

    <div id="main-content">
        <div id="calendar"></div>

        <!-- Add Event Modal -->
        <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                    </div>
                    <div class="modal-body">
                        <form id="addEventForm">
                            <div class="mb-3">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="addEventButton">Save Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Event Modal -->
        <div class="modal fade" id="updateEventModal" tabindex="-1" aria-labelledby="updateEventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateEventModalLabel">Update Event</h5>
                    </div>
                    <div class="modal-body">
                        <form id="updateEventForm">
                            <input type="hidden" id="updateeventID">
                            <div class="mb-3">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="updateEventButton">Update Event</button>
                                <button type="button" class="btn btn-danger" id="deleteEventButton">Delete Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var sidebar = $('#sidebar');
                var toggleBtn = $('#toggle-btn');
                var mainContent = $('#main-content');

                toggleBtn.click(function() {
                    sidebar.toggleClass('collapsed');
                    mainContent.toggleClass('collapsed');
                    $(this).find('i').toggleClass('fas fa-bars fas fa-times');
                });

                $('#logout').click(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'logout.php',
                        success: function(response) {
                            window.location.href = 'login.html';
                        },
                        error: function() {
                            alert('Logout failed. Please try again.');
                        }
                    });
                });

                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
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
                    events: 'get-events.php',
                    select: function(info) {
                        var startTime = moment(info.startStr).format('YYYY-MM-DDTHH:mm');
                        var endTime = moment(info.endStr).format('YYYY-MM-DDTHH:mm');
                        $('#eventStart').val(startTime);
                        $('#eventEnd').val(endTime);
                        $('#addEventModal').modal('show');
                        calendar.unselect();
                    },
                    eventClick: function(info) {
                        $('#updateEventModal').modal('show');
                        $('#updateeventID').val(info.event.id);
                        $('#updateeventTitle').val(info.event.title);
                        $('#updateeventStart').val(moment(info.event.start).format('YYYY-MM-DDTHH:mm'));
                        $('#updateeventEnd').val(moment(info.event.end).format('YYYY-MM-DDTHH:mm'));

                        $('#updateEventButton').off('click').on('click', function() {
                            var id = $('#updateeventID').val();
                            var title = $('#updateeventTitle').val();
                            var start = $('#updateeventStart').val();
                            var end = $('#updateeventEnd').val();
                            if (title && start && end && validateTime(start) && validateTime(end)) {
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
                                    }
                                });
                            } else {
                                alert('Please fill all required fields and ensure times are within the allowed intervals');
                            }
                        });

                        $('#deleteEventButton').off('click').on('click', function() {
                            var id = $('#updateeventID').val();
                            $.ajax({
                                url: 'delete-event.php',
                                type: 'POST',
                                data: { id: id },
                                success: function(data) {
                                    calendar.refetchEvents();
                                    $('#updateEventModal').modal('hide');
                                }
                            });
                        });
                    }
                });

                calendar.render();

                $('#addEventButton').on('click', function() {
                    var title = $('#eventTitle').val();
                    var start = $('#eventStart').val();
                    var end = $('#eventEnd').val();
                    if (title && start && end && validateTime(start) && validateTime(end)) {
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
                        alert('Please fill all required fields and ensure times are within the allowed intervals');
                    }
                });

                function validateTime(dateTime) {
                    var time = moment(dateTime).format('HH:mm');
                    var hours = parseInt(time.split(':')[0], 10);
                    var minutes = parseInt(time.split(':')[1], 10);
                    return (hours >= 7 && hours <= 10) && (minutes === 0 || minutes === 30);
                }
            });
        </script>
    </div>
</body>
</html>
