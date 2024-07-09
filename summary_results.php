<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('header.php');
    include('session.php');

    // Check if main_event_id is set in the URL
    if (!isset($_GET['main_event_id'])) {
        // Redirect or show an error message
        echo "Main Event ID is missing.";
        exit; // Stop further execution
    }

    $active_main_event = $_GET['main_event_id'];

    // Fetch main event details
    $event_query = $conn->prepare("SELECT * FROM main_event WHERE mainevent_id = :active_main_event");
    $event_query->bindParam(':active_main_event', $active_main_event, PDO::PARAM_INT);
    $event_query->execute();
    $event_row = $event_query->fetch(PDO::FETCH_ASSOC);

    if (!$event_row) {
        // Main event not found, handle error
        echo "Main Event not found.";
        exit; // Stop further execution
    }

    $event_name = $event_row['event_name'];
    ?>
    <title><?php echo $event_name; ?> - Tally Sheet</title>
</head>
<body>
<div class="container">
    <div class="span12">
        <center>
            <?php include('doc_header.php'); ?>
            <table>
                <tr>
                    <td align="center">
                        <h3><strong><?php echo $event_name; ?></strong></h3>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h3>Tally Sheet</h3>
                    </td>
                </tr>
            </table>
        </center>

        <section id="download-bootstrap">
            <div class="page-header">
                <table class="table table-bordered" align="center">
                    <?php
                    $sy_query = $conn->prepare("SELECT DISTINCT sy FROM main_event WHERE organizer_id = :session_id AND mainevent_id = :active_main_event");
                    $sy_query->bindParam(':session_id', $session_id, PDO::PARAM_INT);
                    $sy_query->bindParam(':active_main_event', $active_main_event, PDO::PARAM_INT);
                    $sy_query->execute();

                    while ($sy_row = $sy_query->fetch(PDO::FETCH_ASSOC)) {
                        $sy = $sy_row['sy'];

                        $event_query = $conn->prepare("SELECT * FROM main_event WHERE organizer_id = :session_id AND sy = :sy");
                        $event_query->bindParam(':session_id', $session_id, PDO::PARAM_INT);
                        $event_query->bindParam(':sy', $sy, PDO::PARAM_STR);
                        $event_query->execute();

                        while ($event_row = $event_query->fetch(PDO::FETCH_ASSOC)) {
                            $main_event_id = $event_row['mainevent_id'];

                            $SEctrQuery = $conn->prepare("SELECT * FROM sub_event WHERE mainevent_id = :main_event_id");
                            $SEctrQuery->bindParam(':main_event_id', $main_event_id, PDO::PARAM_INT);
                            $SEctrQuery->execute();

                            while ($SECtr = $SEctrQuery->fetch(PDO::FETCH_ASSOC)) {
                                $rs_subevent_id = $SECtr['subevent_id'];
                                ?>
                                <tr>
                                    <td>
                                        <h4>EVENT: <strong><?php echo $SECtr['event_name']; ?></strong></h4>
                                        <hr />
                                        <table class="table table-bordered" align="center">
                                            <tr>
                                                <?php
                                                $contxx_query = $conn->prepare("SELECT DISTINCT fullname FROM contestants WHERE subevent_id = :rs_subevent_id");
                                                $contxx_query->bindParam(':rs_subevent_id', $rs_subevent_id, PDO::PARAM_INT);
                                                $contxx_query->execute();

                                                while ($contxx_row = $contxx_query->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <th><strong><center><?php echo $contxx_row['fullname']; ?></center></strong></th>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <?php
                                                $contxxz_query = $conn->prepare("SELECT contestant_id FROM contestants WHERE subevent_id = :rs_subevent_id");
                                                $contxxz_query->bindParam(':rs_subevent_id', $rs_subevent_id, PDO::PARAM_INT);
                                                $contxxz_query->execute();

                                                while ($contxxz_row = $contxxz_query->fetch(PDO::FETCH_ASSOC)) {
                                                    $contxzID = $contxxz_row['contestant_id'];

                                                    $place_query = $conn->prepare("SELECT DISTINCT place_title FROM sub_results WHERE contestant_id = :contxzID AND subevent_id = :rs_subevent_id");
                                                    $place_query->bindParam(':contxzID', $contxzID, PDO::PARAM_INT);
                                                    $place_query->bindParam(':rs_subevent_id', $rs_subevent_id, PDO::PARAM_INT);
                                                    $place_query->execute();

                                                    while ($place_row = $place_query->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <td><strong><center><?php echo $place_row['place_title']; ?></center></strong></td>
                                                    <?php }
                                                } ?>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            <?php }
                        }
                    } ?>
                </table>
            </div>
        </section>
    </div>
</div>

<?php include('footer.php'); ?>

<!-- JavaScript imports here -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/application.js"></script>

</body>
</html>
