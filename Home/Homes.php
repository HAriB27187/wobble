<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wobble Lab - Drone Technology & Innovation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="Homes.css" rel="stylesheet">        
</head>
<body>
    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="Homes.html">Wobble Lab</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="Homes.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="About/about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Service/service.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Showcase/showcase.html">Showcase</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact/contact.html">Contact</a>
                    </li>

                        <!-- Login/Logout Buttons -->
                    <li class="nav-item" id="authButtons">
                        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle me-1"></i><?php echo $_SESSION['user_name']; ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>My Profile</a></li>
                                    <li><a class="dropdown-item" href="my-courses.php"><i class="fas fa-graduation-cap me-2"></i>My Courses</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <a class="nav-link btn btn-primary btn-sm px-3" href="login.html"><i class="fas fa-sign-in-alt me-1"></i>Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="animate__animated animate__fadeInDown">Welcome to Wobble Lab</h1>
                    <p class="lead animate__animated animate__fadeInUp animate__delay-1s">Pioneering Drone Technology
                        and Innovation Solutions for a Smarter Tomorrow</p>
                    <div class="animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="#services" class="btn btn-primary btn-lg hero-btn">Explore Our Services</a>
                    </div>
                    <div class="floating" data-aos="fade-up" data-aos-delay="1000">
                        <img src="images/1 (2).png" alt="Drone" class="img-fluid mt-5">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Wobble Lab -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>About Wobble Lab</h2>
                    <p class="mb-4">
                        Wobble Lab is a forward-thinking technology company at the forefront of innovation, specializing
                        in drone technology, IoT solutions, and technical education. We transform theoretical knowledge
                        into real-world applications, empowering students, educators, and businesses with cutting-edge
                        tech.
                    </p>
                    <p class="mb-4">
                        Our mission is to spark innovation and drive a technological shift through our expertise in
                        drone systems, artificial intelligence, and the Internet of Things (IoT). Together, we're
                        shaping a smarter, more connected future.
                    </p>
                    <a href="about.php" class="btn btn-primary">Discover Our Story</a>

                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <img src="images/Screenshot 2025-04-07 005002.png" alt="About Wobble Lab" class="img-fluid rounded about-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h2>Our Services</h2>
                <p>Explore our range of innovative solutions and training programs</p>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <i class="fas fa-drone"></i>
                        </div>
                        <h4>Drone Training</h4>
                        <p>Comprehensive drone piloting and technology courses for beginners and professionals.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h4>AI Solutions</h4>
                        <p>Custom artificial intelligence solutions for business automation and optimization.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <h4>IoT Development</h4>
                        <p>Internet of Things solutions for smart connectivity and data-driven insights.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h4>Tech Consulting</h4>
                        <p>Expert guidance for businesses seeking technological transformation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section class="projects-section" id="projects">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h2>Featured Projects</h2>
                <p>Discover our recent innovations and success stories</p>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="project-card">
                        <img src="images/Screenshot 2025-04-07 005529.png" alt="Agriculture Drone" class="img-fluid">
                        <div class="project-info">
                            <h4>Agricultural Mapping Drones</h4>
                            <p>Precision agriculture solution for crop monitoring and analysis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="project-card">
                        <img src="images/3.jpeg" alt="IoT Project" class="img-fluid">
                        <div class="project-info">
                            <h4>Smart Campus IoT Network</h4>
                            <p>Connected campus solution for educational institutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="project-card">
                        <img src="images/4 (4).jpeg" alt="Drone Training" class="img-fluid">
                        <div class="project-info">
                            <h4>Drone Pilot Training Program</h4>
                            <p>Comprehensive certification course for professional drone operators.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Highlights -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h2>Gallery Highlights</h2>
                <p>A glimpse into our training sessions and research work</p>
            </div>
            <div class="row">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-item">
                        <img src="images/4 (5).jpeg" alt="Training Session" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-item">
                        <img src="images/4 (2).jpeg" alt="Drone Workshop" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="gallery-item">
                        <img src="images/3.jpeg" alt="R&D Lab" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="gallery-item">
                        <img src="images/4 (4).jpeg" alt="Field Testing" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="500">
                <a href="gallery.php" class="btn btn-outline-primary">View Full Gallery</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonial-section" id="testimonials">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>What our students and clients say about us</p>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            <i class="fas fa-quote-left"></i>
                            <p>The drone training program at Wobble Lab completely transformed my career. The practical
                                approach and hands-on experience were invaluable.</p>
                        </div>
                        <div class="client-info">
                            <img src="images/generate-a-realistic-ai-avatar-of-a-formal-man-in-fotor.webp" alt="Client" class="img-fluid">
                            <div>
                                <h5>Rahul Sharma</h5>
                                <small>Certified Drone Pilot</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            <i class="fas fa-quote-left"></i>
                            <p>The IoT solutions provided by Wobble Lab have significantly improved our manufacturing
                                efficiency and reduced operational costs.</p>
                        </div>
                        <div class="client-info">
                            <img src="images/generate-a-game-style-ai-avatar-of-a-female-in-fotor.webp" alt="Client" class="img-fluid">
                            <div>
                                <h5>Priya Patel</h5>
                                <small>Operations Manager, TechIndia</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            <i class="fas fa-quote-left"></i>
                            <p>The technical workshops conducted by Wobble Lab for our engineering students were
                                exceptional. The practical knowledge shared was outstanding.</p>
                        </div>
                        <div class="client-info">
                            <img src="images/63ce5755b45e867c12c9b3cb_socials_profile.webp" alt="Client" class="img-fluid">
                            <div>
                                <h5>Dr. Anil Kumar</h5>
                                <small>Professor, Delhi Technical University</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Call to Action (CTA) -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center" data-aos="zoom-in">
                    <h2>Ready to Explore the Future of Technology?</h2>
                    <p class="mb-4">Join our training programs or partner with us for innovative technological solutions</p>
                    <div class="d-flex justify-content-center">
                        <a href="Service/service.html" class="btn btn-primary me-3">Join Training</a>
                        <a href="Contact/contact.html" class="btn btn-outline-light">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Contact Preview -->
    <section class="contact-preview" id="contact">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h2>Get In Touch</h2>
                <p>Have questions? Reach out to us</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5>Our Location</h5>
                            <p>123 Tech Park, Sector 62, Noida, Uttar Pradesh, India</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h5>Email Us</h5>
                            <p>info@wobblelab.com</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h5>Call Us</h5>
                            <p>+91 98765 43210</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="contact.php" class="btn btn-primary">Send Message</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.356956410941!2d81.361055375084!3d21.138188180538688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a29249845000007%3A0xae9660fbcd26d492!2sChhattisgarh%20Swami%20Vivekanand%20Technical%20University!5e0!3m2!1sen!2sin!4v1743882237825!5m2!1sen!2sin" frameborder="0" allowfullscreen="" loading="lazy" title="Office Location"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5>Wobble Lab</h5>
                    <p>Pioneering drone technology and innovative tech solutions for a smarter tomorrow.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="Homes.html">Home</a></li>
                            <li><a href="About/about.html">About Us</a></li>
                            <li><a href="Service/service.html">Services</a></li>
                            <li><a href="Showcase/showcase.html">Showcase</a></li>
                            <li><a href="Contact/contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-links">
                        <h5>Our Services</h5>
                        <ul>
                            <li><a href="Service/service.html">Drone Training</a></li>
                            <li><a href="Service/service.html">AI Solutions</a></li>
                            <li><a href="Service/service.html">IoT Development</a></li>
                            <li><a href="Service/service.html">Tech Consulting</a></li>
                            <li><a href="Service/service.html">Workshops & Seminars</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-links">
                        <h5>Newsletter</h5>
                        <p>Subscribe to our newsletter for the latest updates on technology and training programs.</p>
                        <form class="footer-form">
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>© 2025 Wobble Lab. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="Homes.js"></script>        
</body>
</html>