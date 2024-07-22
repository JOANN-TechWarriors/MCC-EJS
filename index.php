<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Judging System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            <li><a href="#" style="color: #1153D0;">Home</a></li>
            <li style="margin-right:20px"><a href="#ongoing">Ongoing</a></li>
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
    <div class="container">
      <div class="div_zindex" style="text-align: center;">
        <h1 style="color: white;"> Welcome to MCC Event Judging System</h1>
        <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
      </div>
    </div>
  </section>
</section>

<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
<section id="room" >
<div class="p-3" id="candidates">
    <h1 class="text-center" style="color: #1153D0; font-family: impact;">MISS IT 2023 CANDIDATES</h1><br>
    <div class="row g-2" >
        <div class="col-lg-3 col-12 mb-3" style="z-index:-1000;">
            <div class="card shadow bg-dark text-light p-2">
                <img src="img/mcc1.jpg">
                <center>
                    <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
                        <a href="#" style="color:#eca62d; text-decoration: none;">Rona Liza Fernandez</a>
                    </h1>
                    <h4>3-East</h4>
                    <p style="font-size:10px">
                        <i class="bi bi-check-circle-fill" style="color: #cda45e;"></i> Ratings<br>
                    </p>
                </center>
            </div>
        </div>
        <div class="col-lg-3 col-12 mb-3" style="z-index:-1000;">
            <div class="card shadow bg-dark text-light p-2">
                <img src="img/mcc2.jpg">
                <center>
                    <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
                        <a href="#" style="color:#eca62d; text-decoration: none;">Jasmine Carascal</a>
                    </h1>
                    <h4>3-North</h4>
                    <p style="font-size:10px">
                        <i class="bi bi-check-circle-fill" style="color: #cda45e;"></i> Ratings<br>
                    </p>
                </center>
            </div>
        </div>
        <div class="col-lg-3 col-12 mb-3" style="z-index:-1000;">
            <div class="card shadow bg-dark text-light p-2">
                <img src="img/mcc3.jpg">
                <center>
                    <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
                        <a href="#" style="color:#eca62d; text-decoration: none;">Khrisna Mae Sacnahon</a>
                    </h1>
                    <h4>1-West</h4>
                    <p style="font-size:10px">
                        <i class="bi bi-check-circle-fill" style="color: #cda45e;"></i> Ratings<br>
                    </p>
                </center>
            </div>
        </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc4.jpg">
           <center>   <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Jhanna Joy Durias</a>
            </h1>
         
           <h4>1-Southwest</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center> 

           </div>
           
   </div>
    <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc5.jpg">
           <center>   <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Jimelyn Capuras</a>
            </h1>
                     
           <h4>2-East</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
 
           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc6.jpg">
            <center>  <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Marjanny Alob</a>
            </h1>
           <h4>2-North</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
        

           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc7.jpg">
            <center>  <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Renalyn Caracena</a>
            </h1> 
         
           <h4>1-Northeast</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>    

           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc8.jpg">
           <center>  <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Mercy Marie Diongson</a>
            </h1> 
         
           <h4>1-Northwest</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
            

           </div>
           
   </div>
                                      
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc9.jpg">
           <center>  <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Jessamen Ilustrisimo</a>
            </h1> 
         
           <h4>2-West</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
 
           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc10.jpg">
            <center>  <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Kristine Mae Manggiran</a>
            </h1> 
         
           <h4>1-North</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
        

           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc11.jpg">
            <center>    <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Yvonne Crystal Vismanos</a>
            </h1> 
         
           <h4>3-West</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>    

           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc12.jpg">
           <center>  
           <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Lyca Chavez</a>
            </h1> 
         
           <h4>1-Southeast</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc13.jpg">
            <center>   <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Shanine Zaspa</a>
            </h1> 
         
           <h4>3-South</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
        

           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc14.jpg">
            <center>  <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Riza Ybanez Salinas</a>
            </h1> 
         
           <h4>1-South</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>    

           </div>
           
   </div>
   <div class="col-lg-3 col-12  mb-3" style="z-index:-1000;">
       <div class="card shadow bg-dark text-light p-2">
           <img src="img/mcc15.jpg">
           <center>  <h1 class="card-title room-type" style="color:#eca62d; font-size: 150%;">
            <a href="#" style="color:#eca62d; text-decoration: none;">Rose Ann Forosuelo</a>
            </h1> 
         
           <h4>1-East</h4>
       
           <p style="font-size:10px"><i class="bi bi-check-circle-fill" style="color:  #cda45e;"></i> Ratings<br>
         
               </p></center>
            

           </div>
           
   </div>
   <section>
   </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<div class="container-fluid " style="background-color:#12100e ;">
	<div class="row">
		 <div class="col-md-12 p-5" id="about">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/Community-College-Madridejos.jpeg" class="w-100">
                </div>

                <div class="col-md-6">
                    <h3  style="color:  #1153D0;">About</h3>
         
             <p class="text-light" style="font-size: 13px;">
The MCC Event Judging System . It caters all events that .
                </div>

              
                       
            </div>
        </div>
</section>


</div>
</section>
<script src="./javascript/script.js"></script>
<section id="gallery">
			<div class="container" id="gallery">
    <div class="row">
    
        <div class="col-lg-3">
            <img src="img/mcc.jpg" class="w-100">
        </div>
        <div class="col-lg-3">
            <img src="img/updates.jpg" class="w-100">
        </div>
        <div class="col-lg-3">
            <img src="img/mcc.jpg" class="w-100">
        </div>
        <div class="col-lg-3">
            <img src="img/updates.jpg" class="w-100">
        </div>

    </div>  

</div>
		</section>
<section>
    <br>
			 <iframe  style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3912.9695262114656!2d123.72098687257221!3d11.263650350022909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a88140310a21a9%3A0xc5b9b94e9c2702db!2sMadridejos%20Community%20College!5e0!3m2!1sen!2sph!4v1720744766843!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</section>
<section>
				 <footer class="border border-top-1 border-light p-3 bg-dark" id="contact">
            <div class="row">
                    <div class="col-md-6 ">
                         <p class="ms-5 text-light"><i class="fa fa-pin" style="color:#eca62d;"></i> <span style="color:#eca62d;">Location:</span> @Crossing Bunakan, Madridejos, Cebu, Philiphines</p>
                    </div>
                    <div class="col-md-6">
                         <p class="ms-5 text-light"><i class="fa fa-clock" style="color:#eca62d;"></i> <span style="color:#eca62d;">Open Hours:</span>  Monday-Saturday: 08:00 AM - 19:00 PM</p>
                    </div>
                    <div class="col-md-6">
                         <p class="ms-5 text-light"><i class="fa fa-envelope" style="color:#eca62d;"></i> <span style="color:#eca62d;">Contact Email:</span> @joannrebamonte@gmail.com</p>
                    </div>
                    <div class="col-md-6">
                         <p class="ms-5 text-light"><i class="fa fa-phone" style="color:#eca62d;"></i> <span style="color:#eca62d;">Contact Number: </span>   09662314910</p>
                    </div>
            </div>




    </footer>
			</section>		
</body>
</html>