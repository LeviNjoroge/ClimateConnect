<?php 
session_start(); // Add session start

// Add authentication check
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Climate Connect Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h4 class="text-primary"><i class="fa fa-leaf me-2 text-success"></i>ClimateConnect</h4>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?php echo htmlspecialchars($_SESSION['username']); ?></h6>
                <span>User</span>
            </div>
            
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link active"><i class="fa fa-home me-2 text-primary"></i>Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-book me-2 text-warning"></i>Learning</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="edu/0.0 index.html" class="dropdown-item">Learning Modules</a>
                </div>
            </div>
            <a href="climate-data.html" class="nav-item nav-link"><i class="fa fa-industry me-2 text-danger"></i> Industrial Data</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-globe me-2 text-info"></i>Climate Data</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="emissions.html" class="dropdown-item">Deforestation</a>
                    <a href="analytics.html" class="dropdown-item">Carbon Emissions</a>
                    <a href="analytics.html" class="dropdown-item">Weather Patterns</a>
                </div>
            </div>
            <a href="discussion.html" class="nav-item nav-link"><i class="fa fa-comments me-2 text-success"></i> Social Connect</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-chart-line me-2 text-secondary"></i>Real-Time Data</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="emissions.html" class="dropdown-item">Predictive Analytics</a>
                    <a href="analytics.html" class="dropdown-item">Real-Time Emissions</a>
                </div>
            </div>
            <a href="pledge.html" class="nav-item nav-link"><i class="fa fa-handshake me-2 text-primary"></i>Insights & Stats</a>
            <a href="run-ai.php" class="nav-item nav-link"><i class="fa fa-robot me-2 text-danger"></i>AI Chatbot</a>
            <div class="nav-item dropdown">
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div> -->
            </nav>
            <!-- Navbar End -->

<!-- hero -->
<div class="text-center mb-4 container-fluid px-0">
    <h1 class="text-primary fw-bold">Welcome to Climate Connect</h1>
    <p class="lead text-secondary">Protect our Planet, Preserve our Future</p>
</div>

<div class="container-fluid px-0">
    <div id="salesCarousel" class="carousel slide shadow-lg" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#salesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#salesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#salesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner overflow-hidden">
            <div class="carousel-item active" data-bs-interval="2000">
                <div class="overlay-container">
                    <img src="img/climate4.jpg" class="d-block w-100" 
                        style="height: 600px; object-fit: cover;" 
                        alt="Climate Impact">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
                        <h5>Climate Action Matters</h5>
                        <p>Join the movement to protect our planet's future</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <div class="overlay-container">
                    <img src="img/climate3.jpg" class="d-block w-100" 
                        style="height: 600px; object-fit: cover;" 
                        alt="Sustainable Solutions">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
                        <h5>Sustainable Solutions</h5>
                        <p>Discover innovative approaches to environmental challenges</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <div class="overlay-container">
                    <img src="img/climate2.jpg" class="d-block w-100" 
                        style="height: 600px; object-fit: cover;" 
                        alt="Global Collaboration">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
                        <h5>Global Collaboration</h5>
                        <p>Working together for a sustainable future</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#salesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#salesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- content start -->
<div class="container-fluid px-4 py-5">
    <div class="bg-light p-4 shadow-sm">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">About ClimateConnect</h2>
            <div class="d-inline-block border-bottom border-primary border-2 mb-3" style="width: 100px;"></div>
            <p class="lead mx-auto" style="max-width: 900px;">
                ClimateConnect is an AI-powered educational and social platform addressing climate change. 
                Our goal is to increase public awareness, hold industries accountable, and encourage meaningful action. 
                We provide real-time climate data, emissions tracking, and interactive learning tools to empower individuals and organizations.
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="fa fa-exclamation-triangle text-danger fa-2x"></i>
                        </div>
                        <h3 class="text-danger fw-bold h4">The Problem</h3>
                        <p>
                            Climate change remains a critical issue, yet public awareness is limited. Existing platforms lack real-time data and interactive engagement.
                            Industries, major contributors to carbon emissions, often lack transparency.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="fa fa-lightbulb text-primary fa-2x"></i>
                        </div>
                        <h3 class="text-primary fw-bold h4">Our Solution</h3>
                        <ul class="list-unstyled text-start">
                            <li><i class="fa fa-check-circle text-success me-2"></i>AI-driven learning modules</li>
                            <li><i class="fa fa-check-circle text-success me-2"></i>Real-time climate data</li>
                            <li><i class="fa fa-check-circle text-success me-2"></i>Industry emissions monitoring</li>
                            <li><i class="fa fa-check-circle text-success me-2"></i>Interactive discussions</li>
                            <li><i class="fa fa-check-circle text-success me-2"></i>AI chatbot assistance</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="rounded-circle bg-success bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="fa fa-globe text-success fa-2x"></i>
                        </div>
                        <h3 class="text-success fw-bold h4">UN SDG Alignment</h3>
                        <ul class="list-unstyled text-start">
                            <li><i class="fa fa-leaf text-success me-2"></i>SDG 13: Climate Action</li>
                            <li><i class="fa fa-recycle text-success me-2"></i>SDG 12: Responsible Consumption</li>
                            <li><i class="fa fa-bolt text-success me-2"></i>SDG 7: Clean Energy</li>
                            <li><i class="fa fa-city text-success me-2"></i>SDG 11: Sustainable Cities</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <p class="lead fw-bold text-primary">
                By leveraging AI, real-time data, and community engagement, ClimateConnect empowers individuals, industries, and policymakers 
                to take informed actions against climate change.
            </p>
            <a href="#" class="btn btn-primary btn-lg mt-3 px-4 rounded-pill">Join The Movement</a>
        </div>
    </div>
</div>
<!-- content end -->

<style>

/* Custom CSS for the carousel */
.carousel-item img {
    transition: transform 0.5s ease;
}

.carousel:hover .carousel-item img {
    transform: scale(1.03);
}

.overlay-container {
    position: relative;
    overflow: hidden;
}

.carousel-caption {
    backdrop-filter: blur(3px);
    transition: all 0.3s ease;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 0.5rem;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

/* Full width adjustments */
.container-fluid {
    max-width: 100%;
    padding-left: 0;
    padding-right: 0;
}

.content {
    padding-left: 0;
    padding-right: 0;
}
</style></style>            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy;<a href="#">ClimateConnect</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>