<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kenlinks Solutions</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

 
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:info@kenlinksolutions.com">info@kenlinksolutions.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+254701922922</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="https://twitter.com/KenlinksOffice" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/KenlinksOfficial/" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/kenlinks_solutions/" class="instagram"><i class="bi bi-instagram"></i></a>
                <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <a href="index.php"><img src="assets/img/logo.png" alt="" class="logo"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a <?php (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : '';  ?> href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li class="dropdown"><a href="#">Products & Services<i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="services.php"><span>Emergency Response</span></a>
                                <!-- <ul>
                                    <li><a href="verticals.php">Solution Verticals</a></li>
                                </ul> -->
                            </li>
                            <li><a href="coming-soon-vi.php">Video Intelligence</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="demo-center.php">Demo Center</a></li> -->
                    <li><a href="verticals.php">Solution Verticals</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>