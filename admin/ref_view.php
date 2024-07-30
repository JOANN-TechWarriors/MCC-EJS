<?php
// header.php and session.php should include necessary session starts and DB connections
include('header.php');
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Results</title>
    <!-- Add necessary meta tags and CSS files -->
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php
                try {
                    // Fetch sub-events
                    $s_event_query = $conn->query("SELECT * FROM sub_event WHERE view='activated'");
                    while ($s_event_row = $s_event_query->fetch()) {
                        $active_sub_event = $s_event_row['subevent_id'];
                        $active_main_event = $s_event_row['mainevent_id'];

                        // Fetch main event details
                        $event_query = $conn->prepare("SELECT * FROM main_event WHERE mainevent_id = ?");
                        $event_query->execute([$active_main_event]);
                        while ($event_row = $event_query->fetch()) {
                ?>
                <center>
                    <?php include('doc_header.php'); ?>
                    <table>
                        <tr>
                            <td align="center"><h2><?php echo htmlspecialchars($event_row['event_name']); ?></h2></td>
                        </tr>
                        <tr>
                            <td align="center"><h3>Live View of Result - <?php echo htmlspecialchars($s_event_row['event_name']); ?></h3></td>
                        </tr>
                    </table>
                </center>

                <?php
                            // Fetch distinct contestant IDs
                            $o_result_query = $conn->prepare("SELECT DISTINCT contestant_id FROM sub_results WHERE mainevent_id = ? AND subevent_id = ? ORDER BY contestant_id ASC");
                            $o_result_query->execute([$active_main_event, $active_sub_event]);
                            while ($o_result_row = $o_result_query->fetch()) {
                                $contestant_id = $o_result_row['contestant_id'];
                ?>

                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <?php
                                // Fetch contestant details
                                $cname_query = $conn->prepare("SELECT * FROM contestants WHERE contestant_id = ?");
                                $cname_query->execute([$contestant_id]);
                                while ($cname_row = $cname_query->fetch()) {
                        ?>
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo htmlspecialchars($cname_row['contestant_ctr'] . "." . $cname_row['fullname']); ?></h3>
                        </div>
                        <?php } ?>

                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Judge</th>
                                    <th>Score</th>
                                    <th>Rank</th>
                                </tr>
                                <?php
                                    $divz = 0;
                                    $totx_score = 0;
                                    $rank_score = 0;

                                    // Fetch scores and ranks
                                    $tot_score_query = $conn->prepare("SELECT judge_id, total_score, rank FROM sub_results WHERE contestant_id = ?");
                                    $tot_score_query->execute([$contestant_id]);
                                    while ($tot_score_row = $tot_score_query->fetch()) {
                                        $divz++;
                                        $totx_score += $tot_score_row['total_score'];
                                        $rank_score += $tot_score_row['rank'];
                                ?>
                                <tr>
                                    <td><?php
                                        // Fetch judge details
                                        $jjxx_query = $conn->prepare("SELECT fullname FROM judges WHERE judge_id = ?");
                                        $jjxx_query->execute([$tot_score_row['judge_id']]);
                                        while ($jjxx_row = $jjxx_query->fetch()) {
                                            echo htmlspecialchars($jjxx_row['fullname']);
                                        }
                                    ?></td>
                                    <td><?php echo htmlspecialchars($tot_score_row['total_score']); ?></td>
                                    <td><?php echo htmlspecialchars($tot_score_row['rank']); ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td>Ave: <b><?php echo round($totx_score / $divz, 2); ?></b></td>
                                    <td>Sum: <b><?php echo htmlspecialchars($rank_score); ?></b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                            } // end while o_result_row
                        } // end while event_row
                    } // end while s_event_row
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- Add necessary JavaScript files -->
    <script src="http://platform.twitter.com/widgets.js"></script>
    <script src="..//assets/js/jquery.js"></script>
    <script src="..//assets/js/bootstrap-transition.js"></script>
    <script src="..//assets/js/bootstrap-alert.js"></script>
    <script src="..//assets/js/bootstrap-modal.js"></script>
    <script src="..//assets/js/bootstrap-dropdown.js"></script>
    <script src="..//assets/js/bootstrap-scrollspy.js"></script>
    <script src="..//assets/js/bootstrap-tab.js"></script>
    <script src="..//assets/js/bootstrap-tooltip.js"></script>
    <script src="..//assets/js/bootstrap-popover.js"></script>
    <script src="..//assets/js/bootstrap-button.js"></script>
    <script src="..//assets/js/bootstrap-collapse.js"></script>
    <script src="..//assets/js/bootstrap-carousel.js"></script>
    <script src="..//assets/js/bootstrap-typeahead.js"></script>
    <script src="..//assets/js/bootstrap-affix.js"></script>
    <script src="..//assets/js/holder/holder.js"></script>
    <script src="..//assets/js/google-code-prettify/prettify.js"></script>
    <script src="..//assets/js/application.js"></script>
</body>
</html>
