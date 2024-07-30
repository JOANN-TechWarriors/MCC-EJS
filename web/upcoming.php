<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Judging System</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
      rel="stylesheet"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.4s;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }
        .container{
            margin-left: 5%;
            margin-right: 5%;
        }
        .nav{
            width: 100%;
            height: 65px;
            position: fixed;
            line-height: 65px;
            text-align: center;
            background-color: rgba(6, 6, 7, 0.8);
        }
        .nav div.logo{
            width: 180px;
            height: 10px;
            position: absolute;
        }
        .nav div.logo a{
            text-decoration: none;
            color: #fff;
            font-size: 25px;
            text-transform: uppercase;
        }
        .nav div.logo a:hover {
            color: #c0c0c0;
        }
        .nav div.main_list{
            width: 600px;
            height: 65px;
            float: right;
        }
        .nav div.main_list ul{
            width:100%;
            height: 65px;
            display: flex;
            list-style: none;
        }
        .nav div.main_list ul li{
            width: 120px;
            height: 65px;
        }
        .nav div.main_list ul li a{
            text-decoration: none;
            color: #fff;
            line-height: 65px;
            text-transform: uppercase;
        }
        .nav div.main_list ul li a:hover{
            color: #c0c0c0;
        }
        .nav div.media_button {
            width: 40px;
            height: 40px;
            background-color: transparent;
            position: absolute;
            right: 15px;
            top: 12px;
            display: none;
        }
        .nav div.media_button button.main_media_button {
            width: 100%;
            height: 100%;
            background-color: transparent;;
            outline: 0;
            border: none;
            cursor: pointer;
        }
        .nav div.media_button button.main_media_button span{
            width: 98%;
            height: 1px;
            display: block;
            background-color: #fff;
            margin-top: 9px;
            margin-bottom: 10px;
        }
        .nav div.media_button button.main_media_button:hover span:nth-of-type(1){
            transform: rotateY(180deg);
            transition: all 0.5s;
            background-color: #c0c0c0;
        }
        .nav div.media_button button.main_media_button:hover span:nth-of-type(2){
            transform: rotateY(180deg);
            transition: all 0.4s;
            background-color: #c0c0c0;
        }
        .nav div.media_button button.main_media_button:hover span:nth-of-type(3){
            transform: rotateY(180deg);
            transition: all 0.3s;
            background-color: #c0c0c0;
        }
        .nav div.media_button button.active span:nth-of-type(1) {
            transform: rotate3d(0, 0, 1, 45deg);
            position: absolute;
            margin: 0;
        }
        .nav div.media_button button.active span:nth-of-type(2) {
            display: none;
        }
        .nav div.media_button button.active span:nth-of-type(3) {
            transform: rotate3d(0, 0, 1, -45deg);
            position: absolute;
            margin: 0;
        }
        .nav div.media_button button.active:hover span:nth-of-type(1) {
            transform: rotate3d(0, 0, 1, 20deg);
        }
        .nav div.media_button button.active:hover span:nth-of-type(3) {
            transform: rotate3d(0, 0, 1, -20deg);
        }
        .fa {
            padding: 10px;
            font-size: 10px;
            width: 8px;
            text-align: center;
            text-decoration: none;
            margin: 5px 5px;
            border-radius: 30%;
        }
        .fa:hover {
            opacity: 0.5;
        }
        .fa-facebook {
            background: #3B5998;
            color: white;
        }
        .fa-twitter {
            background: #55ACEE;
            color: white;
        }
        .fa-youtube {
            background: #bb0000;
            color: white;
        }
        .fa-instagram {
            background: orange;
            color: white;
        }
        .home{
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        @media screen and (min-width: 768px) and (max-width: 1024px) {
            .container{
                margin: 0;
            }
        }
        @media screen and (max-width:768px) {
            .container{
                margin: 0;
            }
            .nav div.logo{
                margin-left: 15px;
            }
            .nav div.main_list{
                width: 100%;
                margin-top: 65px;
                height: 0px;
                overflow: hidden;
            }
            .nav div.show_list{
                height: 200px;
            }
            .nav div.main_list ul{
                flex-direction: column;
                width: 100%;
                height: 200px;
                top: 80px;
                right: 0;
                left: 0;
            }
            .nav div.main_list ul li{
                width: 100%;
                height: 40px;
                background-color:rgba(6, 6, 7, 0.8);
            }
            .nav div.main_list ul li a{
                text-align: center;
                line-height: 40px;
                width: 100%;
                height: 40px;
                display: table;
            }
            .nav div.media_button{
                display: block;
            }
        }
        .main_list ul {
            list-style-type: none;
            padding: 0;
        }

        .main_list ul li {
            display: inline-block;
            position: relative;
        }

        .main_list ul li a {
            text-decoration: none;
            padding: 10px;
            color: #000;
        }

        .main_list ul li:hover .dropdown {
            display: block;
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: black;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #333;
            color:red;
        }
        .carousel-control-prev,
.carousel-control-next {
  width: 30%;
  color:white !important; /* Adjust width as needed */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 50px; /* Adjust height as needed */
  width: 50px; /* Adjust width as needed */
  background-size: 100%, 100%;
  color:white !important; 
}

.carousel-caption {
  bottom: 10px; /* Adjust bottom positioning as needed */
}

    </style>
</head>
<body>
<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="#" style="font-family: impact; color: #1153D0;">
                <img src="assets/img/mcc_logo.png" style="height: 40px;  vertical-align: middle;"> MCC Event
            </a>
             <span class="text-light"MCC>
        </div>
        <div class="main_list" id="mainListDiv">
        <ul>
            <li><a href="index.php" >Home</a></li>
            <li style="margin-right:20px" ><a href="ongoing.php" >Ongoing</a></li>
            <li><a href="#upcoming" style="color: #1153D0;">Upcoming</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#live">Live</a></li>
            <li>
                <a href="#login">Login</a>
                <div class="dropdown">
                    <a href="admin/index.php">Organizer Login</a>
                    <a href="tabulator/index.php">Tabulator Login</a>
                    <a href="judge/welcome.php">Judge Login</a>
                    <a href="student/student_login.php">Student Login</a>
                </div>
            </li>
        </ul>
    </div>
        <div class="media_button">
            <button class="main_media_button" id="mediaButton">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>



<section class="home" style="background-image: linear-gradient(45deg, rgba(0,0,0,0.3), rgba(0, 0, 0 ,0.3)), url(img/Community-College-Madridejos.jpeg); height: 100vh; display: flex; justify-content: center; align-items: center;">
  <section id="banner" class="banner-section" style="width: 100%;">
    <div class="container p-5 mt-5 h-100" >
      
    <!-- start code  -->
    <?php
// Database connection using PDO
$conn = new PDO('mysql:host=localhost;dbname=judging', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$currentDate = date('Y-m-d');

$sql = "SELECT mainevent_id, event_name, date_start, date_end, place, banner 
FROM main_event WHERE :currentDate BETWEEN date_start AND date_end";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':currentDate', $currentDate);
$stmt->execute();

$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <?php if (count($events) > 0) : ?>
      <?php foreach ($events as $index => $event) : ?>
        <button
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide-to="<?= $index ?>"
          class="<?= $index === 0 ? 'active' : '' ?>"
          aria-current="true"
          aria-label="Slide <?= $index + 1 ?>"
        ></button>
      <?php endforeach; ?>
    <?php else : ?>
      <button
        type="button"
        data-bs-target="#carouselExampleDark"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      ></button>
    <?php endif; ?>
  </div>
  <div class="carousel-inner">
    <?php if (count($events) > 0) : ?>
      <?php foreach ($events as $index => $event) : ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="10000">
          <img src="img/<?= htmlspecialchars($event['banner']) ?>" class="d-block"
           style="display:flex; margin:auto;width:700px; height:400px;" alt="<?= htmlspecialchars($event['event_name']) ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5 style="color:white !important;"><?= htmlspecialchars($event['event_name']) ?></h5>
            <p style="color:white !important;"><?= htmlspecialchars(date("F j, Y", strtotime($event['date_start']))) ?> - <?= htmlspecialchars(date("F j, Y", strtotime($event['date_end']))) ?><br>Location: <?= htmlspecialchars($event['place']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="carousel-item active" data-bs-interval="10000">
        <svg
          class="bd-placeholder-img bd-placeholder-img-lg d-block w-100"
          width="800"
          height="400"
          xmlns="http://www.w3.org/2000/svg"
          role="img"
          aria-label="Placeholder: No ongoing events"
          preserveAspectRatio="xMidYMid slice"
          focusable="false"
        >
          <title>No ongoing events</title>
          <rect width="100%" height="100%" fill="#f5f5f5"></rect>
          <text x="50%" y="50%" fill="#aaa" dy=".3em">No ongoing events</text>
        </svg>
        <div class="carousel-caption d-none d-md-block">
          <h5>No ongoing events</h5>
          <p style="color:white !important;">There are no ongoing events at the moment.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <button
    class="carousel-control-prev"
    type="button"
    data-bs-target="#carouselExampleDark"
    data-bs-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-bs-target="#carouselExampleDark"
    data-bs-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- end code  -->

      </div>
    </div>
  </section>
</section>

<br>



</div>
</section>
<script src="./javascript/script.js"></script>
		
</body>
</html>