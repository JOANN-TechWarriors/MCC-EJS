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
        const videoElement = document.getElementById('liveStream');
        const servers = null; // Use default STUN/TURN servers
        let peerConnection = new RTCPeerConnection(servers);

        peerConnection.ontrack = (event) => {
            videoElement.srcObject = event.streams[0];
        };

        peerConnection.onicecandidate = (event) => {
            if (event.candidate) {
                // Send ICE candidates to the admin side
                console.log('New ICE candidate:', event.candidate);
            }
        };

        async function receiveOffer(offer) {
            await peerConnection.setRemoteDescription(new RTCSessionDescription(offer));
            const answer = await peerConnection.createAnswer();
            await peerConnection.setLocalDescription(answer);

            // Send the answer back to the admin side
            console.log('Answer created:', answer);
        }

        // Handle receiving the offer and answer from the admin side
        // This can be done via a WebSocket or other signaling mechanism
        // Example: receiveOffer(offer);
    </script>
</body>
</html>
