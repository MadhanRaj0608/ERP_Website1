<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>

    <style>
        /* Background container for Vanta.js */
        #vanta-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
        }

        /* Styling for text */
        body {
            color: white; /* Set text to white */
            font-family: Arial, sans-serif; /* Improve font readability */
            text-align: center; /* Center align text */
            margin-top: 20vh; /* Move text down slightly */
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div id="vanta-bg"></div>

    <h1>Registration Successful!</h1>
    <p>Thank you for registering for the event.</p>

    <script>
        // Apply Vanta.js to the background div
        VANTA.NET({
            el: "#vanta-bg",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 100.00,
            minWidth: 100.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0x8c3fff, /* Purple lines */
            backgroundColor: 0x0d0d0d, /* Dark background */
            maxDistance: 23.00
        });
    </script>
</body>
</html>
