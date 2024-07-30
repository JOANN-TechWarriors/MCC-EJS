<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Meta Information -->
    <link rel="shortcut icon" href="../img/logo.png"/>
    <title>Event Judging System</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS Links -->
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <link rel="icon" href="images/fevicon.png" type="image/gif">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css1/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/bootstrap.min11.css">
    <link rel="stylesheet" href="css/templatemo-festava-live.css">

    <!-- Custom CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.4s;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        .container {
            margin: 0 5%;
        }

        .nav {
            width: 100%;
            height: 65px;
            position: fixed;
            line-height: 65px;
            text-align: center;
            background-color: rgba(6, 6, 7, 0.8);
            z-index: 1000;
        }

        .nav .logo {
            width: 180px;
            position: absolute;
        }

        .nav .logo a {
            text-decoration: none;
            color: #fff;
            font-size: 25px;
            text-transform: uppercase;
        }

        .nav .logo a:hover {
            color: #c0c0c0;
        }

        .nav .main_list {
            width: 600px;
            float: right;
        }

        .nav .main_list ul {
            width: 100%;
            height: 65px;
            display: flex;
            list-style: none;
        }

        .nav .main_list ul li {
            width: 120px;
            height: 65px;
        }

        .nav .main_list ul li a {
            text-decoration: none;
            color: #fff;
            line-height: 65px;
            text-transform: uppercase;
        }

        .nav .main_list ul li a:hover {
            color: #c0c0c0;
        }

        .nav .media_button {
            width: 40px;
            height: 40px;
            background-color: transparent;
            position: absolute;
            right: 15px;
            top: 12px;
            display: none;
        }

        .nav .media_button button.main_media_button {
            width: 100%;
            height: 100%;
            background-color: transparent;
            outline: 0;
            border: none;
            cursor: pointer;
        }

        .nav .media_button button.main_media_button span {
            width: 98%;
            height: 1px;
            display: block;
            background-color: #fff;
            margin: 9px 0;
        }

        .nav .media_button button.main_media_button:hover span:nth-of-type(1),
        .nav .media_button button.main_media_button:hover span:nth-of-type(2),
        .nav .media_button button.main_media_button:hover span:nth-of-type(3) {
            transform: rotateY(180deg);
            transition: all 0.4s;
            background-color: #c0c0c0;
        }

        .nav .media_button button.active span:nth-of-type(1) {
            transform: rotate3d(0, 0, 1, 45deg);
        }

        .nav .media_button button.active span:nth-of-type(2) {
            display: none;
        }

        .nav .media_button button.active span:nth-of-type(3) {
            transform: rotate3d(0, 0, 1, -45deg);
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
            color: red;
        }

        video {
            width: 100%;
            height: auto;
            max-height: 80vh;
            object-fit: cover;
            background-color: #000;
        }

        button {
            margin: 5px;
        }

        @media screen and (min-width: 768px) and (max-width: 1024px) {
            .container {
                margin: 0;
            }
        }

        @media screen and (max-width: 768px) {
            .container {
                margin: 0;
            }

            .nav .logo {
                margin-left: 15px;
            }

            .nav .main_list {
                width: 100%;
                margin-top: 65px;
                height: 0;
                overflow: hidden;
            }

            .nav .main_list.show_list {
                height: 200px;
            }

            .nav .main_list ul {
                flex-direction: column;
                width: 100%;
                height: 200px;
                top: 80px;
                right: 0;
                left: 0;
            }

            .nav .main_list ul li {
                width: 100%;
                height: 40px;
                background-color: rgba(6, 6, 7, 0.8);
            }

            .nav .main_list ul li a {
                text-align: center;
                line-height: 40px;
                width: 100%;
                height: 40px;
                display: table;
            }

            .nav .media_button {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="#" style="font-family: impact; color: #1153D0;">
                    <img src="../img/logo.png" style="height: 40px; vertical-align: middle;"> MCC Event
                </a>
            </div>
            <div class="main_list" id="mainListDiv">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="ongoing.php">Ongoing</a></li>
                    <li><a href="upcoming.php">Upcoming</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="blog.php">Live</a></li>
                    <li>
                        <a href="#login">Login</a>
                        <div class="dropdown">
                            <a href="admin/index.php">Organizer Login</a>
                            <a href="tabulator/index.php">Tabulator Login</a>
                            <a href="judge/index.php">Judge Login</a>
                            <a href="student/index.php">Student Login</a>
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

    <!-- Main Content -->
    <section>
        <video id="video" autoplay></video>
        <button id="startButton">Start Streaming</button>
        <button id="stopButton">Stop Streaming</button>
        <a id="downloadButton" href="#" download="recording.webm" disabled>Download Recording</a>
    </section>

    <!-- Footer -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="ms-5 text-light"><i class="fa fa-pin" style="color:#eca62d;"></i> <span style="color:#ffffff;">Location: Cebu, Philippines</span></p>
                    <p class="ms-5 text-light"><i class="fa fa-phone" style="color:#eca62d;"></i> <span style="color:#ffffff;">Call us: +123-456-7890</span></p>
                </div>
                <div class="col-md-6">
                    <p class="text-light text-end"><i class="fa fa-envelope" style="color:#eca62d;"></i> <span style="color:#ffffff;">Email: info@domain.com</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/adapter/20.0.1/adapter.min.js"></script>
    <script>
        const video = document.getElementById('video');
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const downloadButton = document.getElementById('downloadButton');
        let mediaRecorder;
        let recordedChunks = [];

        async function startStreaming() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                video.srcObject = stream;
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.ondataavailable = (event) => {
                    if (event.data.size > 0) {
                        recordedChunks.push(event.data);
                    }
                };
                mediaRecorder.onstop = () => {
                    const blob = new Blob(recordedChunks, { type: 'video/webm' });
                    const url = URL.createObjectURL(blob);
                    downloadButton.href = url;
                    downloadButton.disabled = false;
                    recordedChunks = [];
                };
                mediaRecorder.start();
                startButton.disabled = true;
                stopButton.disabled = false;
            } catch (err) {
                console.error('Error starting the stream:', err);
            }
        }

        function stopStreaming() {
            if (mediaRecorder) {
                mediaRecorder.stop();
                const stream = video.srcObject;
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                }
                startButton.disabled = false;
                stopButton.disabled = true;
            }
        }

        startButton.addEventListener('click', startStreaming);
        stopButton.addEventListener('click', stopStreaming);
    </script>
</body>
</html>
