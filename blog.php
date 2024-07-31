<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Broadcast - Viewer</title>
</head>
<body>
    <h1>Live Broadcast Viewer</h1>
    <div id="videoContainer">
        <video id="liveStream" controls autoplay style="width: 100%; max-width: 800px;">
            Your browser does not support the video tag.
        </video>
    </div>

    <script>
        const streamUrl = 'https://mcceventsjudging.com/admin/live.php'; // URL to fetch the video stream
        const videoElement = document.getElementById('liveStream');
        videoElement.src = streamUrl;

        videoElement.addEventListener('error', function() {
            console.error('Error loading the stream. Please check if the broadcast is active.');
            alert('Error loading the stream. Please check if the broadcast is active.');
        });
    </script>
</body>
</html>
