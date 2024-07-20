<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../ejs_logo.png"/>
    <title>POLL VOTE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .pic {
            height: 400px;
            object-fit: cover;
        }
        .card-title {
            font-size: 18px;
            margin-bottom: -2px;
            height: 70px;
            font-size: 17px;
        }
        .votebtn {
            display: block;
            margin-top: 10px;
        }
        .fa-heart {
            color: white;
        }
        .btn.voted .fa-heart {
            color: red;
        }
    </style>
</head>
<body>

<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=judging';
$username = 'root';
$password = '';
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<?php 
$event = $_GET['event'];

if (isset($_POST['resetcookies'])) {
    $cookiePath = "/";
    setcookie($event, "", time() - 3600, $cookiePath);
    unset($_COOKIE[$event]);
    echo "success";
}

if (isset($_POST['vote'])) {
    $contestant_id = $_POST['contestant_id'];
    $contestant_name = $_POST['contestant_name'];
    $cookiePath = "/";
    if (!isset($_COOKIE[$event])) {
        echo "<script>alert('Successfully Voted for " . $contestant_name . "');</script>";
        setcookie($event, '1', time() + 60 * 60 * 24 * 30, $cookiePath); // 30 days
        $stmt = $conn->prepare("UPDATE contestants SET txtPollScore = txtPollScore + 1 WHERE contestant_id = :contestant_id");
        $stmt->execute([':contestant_id' => $contestant_id]);
    } else {
        echo "<script>alert('already voted');</script>";
    }
}
?>

<!-- <form action="" method="POST"><button type="submit" name="resetcookies">RESET</button></form> -->

<div class="container">
<?php 
$stmt = $conn->prepare("SELECT * FROM sub_event WHERE subevent_id = :event");
$stmt->execute([':event' => $event]);
$rowinfo = $stmt->fetch(PDO::FETCH_ASSOC);
$eventname = $rowinfo['event_name'];
?>
<br />
<h1 class="text-center" style="font-size: 20px;"><?php echo htmlspecialchars($eventname); ?></h1>
<h5 class="text-center text-muted">ONLINE VOTE POLL</h5>
<br />

<div class="row">
<?php
$stmt = $conn->prepare("SELECT * FROM contestants WHERE subevent_id = :event");
$stmt->execute([':event' => $event]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

<div class="col-md-3 col-6">
<div class="card">
  <img class="card-img-top pic" height="300" src="../img/<?php echo htmlspecialchars($row['Picture']); ?>" alt="Contestant Profile">
  <div class="card-body">
    <h5 class="card-title"><?php echo htmlspecialchars($row['fullname']); ?><p class="text-muted"><?php echo htmlspecialchars($row['AddOn']); ?></p></h5>
    
    <form action="" method="POST">
        <input type="hidden" name="contestant_id" value="<?php echo htmlspecialchars($row['contestant_id']); ?>">
        <input type="hidden" name="contestant_name" value="<?php echo htmlspecialchars($row['fullname']); ?>">
        <?php if (!isset($_COOKIE[$event])) { ?>
        <button type="submit" name="vote" class="btn btn-primary votebtn" style="background-color: white; color:black; border-color: white;"><span id="loading"></span><i class="fa fa-heart" aria-hidden="true"></i> VOTE</button>
        <?php } else { ?>
        <button type="submit" name="vote" class="btn btn-primary votebtn voted" style="background-color: white; color:black; border-color: white;" disabled><span id="loading"></span><i class="fa fa-heart" aria-hidden="true"></i> VOTED</button>
        <?php } ?>
    </form>
    
  </div>
</div>
<br />
</div>

<?php } ?>
</div>
</div>

</body>
</html>
