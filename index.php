<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration Portal | REC</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
    <!-- Custom Styles -->
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            color: white;
        }

        #vanta-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 50px 20px;
        }

        .about-section, .category-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .about-section h3, .content h1, .event-category-title {
            color: #00FFFF;
            font-weight: bold;
        }

        .category-card:hover {
            transform: scale(1.05);
        }

        .category-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .club-card {
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(255, 255, 255, 0.2);
        }

        .club-card:hover {
            transform: scale(1.05);
        }

        .live-updates {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            padding: 10px;
            border-radius: 8px;
            margin-top: 20px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
        }

        marquee {
            white-space: nowrap;
            overflow: hidden;
            display: block;
        }

        .club-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .event-category-title {
            color: white;
        }
    </style>
</head>
<body>
    <div id="vanta-bg"></div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">REC Event Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul>
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="text-white ms-3">Welcome, <?php echo $_SESSION['user']['name']; ?>!</span>
                    <a href="logout.php" class="btn btn-danger ms-2">Logout</a>
                <?php else: ?>
                    <a href="login.html" class="btn btn-danger ms-3">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    
    <header class="content">
        <h1>Welcome to Rajalakshmi Engineering College</h1>
        <p>Explore our Clubs and Register for Events</p>

        <div class="live-updates">
            <marquee behavior="scroll" direction="left">
                🔥 Upcoming Event: Hackathon 2025 - Register Now! | 🎭 Cultural Fest - March 15 | ⚽ Sports Meet - April 10 | 🛠️ Workshops on AI & ML - Register Today!
            </marquee>
        </div>
    </header>

    <!-- About Us Section with Scroll Animation -->
    <section class="container my-5">
        <h2 class="text-center event-category-title mb-4">About Us</h2>
        <div class="about-section" data-aos="fade-up" data-aos-delay="100">
            <h3>Who We Are</h3>
            <p>The Event Registration Portal at Rajalakshmi Engineering College is designed to streamline student participation in various clubs and events.</p>
        </div>
        <div class="about-section" data-aos="fade-up" data-aos-delay="200">
            <h3>Our Mission</h3>
            <p>We aim to provide an intuitive platform where students can discover, register, and participate in exciting academic and extracurricular activities.</p>
        </div>
        <div class="about-section" data-aos="fade-up" data-aos-delay="300">
            <h3>Why Choose Us?</h3>
            <p>With a seamless user experience and real-time event updates, we ensure that students never miss out on opportunities to learn and grow.</p>
        </div>
    </section>

    <!-- Event Categories Section -->
    <section class="container my-5">
        <h2 class="text-center event-category-title mb-4">Select an Event Category</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="club-card" onclick="window.location.href='technical.html'" data-aos="fade-up" data-aos-delay="100">
                    <img src="techclub.webp" alt="Technical Clubs" class="img-fluid mb-3">
                    <h3>Technical Clubs</h3>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="club-card" onclick="window.location.href='non_technical.html'" data-aos="fade-up" data-aos-delay="200">
                    <img src="non tech.jpeg" alt="Non-Technical Clubs" class="img-fluid mb-3">
                    <h3>Non-Technical Clubs</h3>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="club-card" onclick="window.location.href='cultural.html'" data-aos="fade-up" data-aos-delay="300">
                    <img src="cultural.jpg" alt="Cultural Events" class="img-fluid mb-3">
                    <h3>Cultural Events</h3>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="club-card" onclick="window.location.href='sports.html'" data-aos="fade-up" data-aos-delay="100">
                    <img src="sports.jpg" alt="Sports" class="img-fluid mb-3">
                    <h3>Sports</h3>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="club-card" onclick="window.location.href='hackathon.html'" data-aos="fade-up" data-aos-delay="200">
                    <img src="hackathon.png" alt="Hackathon" class="img-fluid mb-3">
                    <h3>Hackathon</h3>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="club-card" onclick="window.location.href='workshops.html'" data-aos="fade-up" data-aos-delay="300">
                    <img src="workshop.png" alt="Workshops" class="img-fluid mb-3">
                    <h3>Workshops</h3>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center bg-dark text-white py-3">
        &copy; 2025 Rajalakshmi Engineering College | Event Registration Portal
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanta/0.5.24/vanta.net.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        VANTA.NET({
            el: "#vanta-bg",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 100.00,
            minWidth: 100.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0x8c3fff,
            backgroundColor: 0x0d0d0d,
            maxDistance: 23.00
        });
        AOS.init();
    </script>
</body>
</html>
