    
    <?php
session_start();

?>
    <!-- Header Section Start -->
        <div class="header-section">

            <!-- Header Top Start -->
            <div class="header-top d-none d-lg-block">
                <div class="container">

                    <!-- Header Top Wrapper Start -->
                    <div class="header-top-wrapper">

                        <!-- Header Top Left Start -->
                        <div class="header-top-left">
                            <p>All course 28% off for <a href="#">Liberian people’s.</a></p>
                        </div>
                        <!-- Header Top Left End -->

                        <!-- Header Top Medal Start -->
                        <div class="header-top-medal">
                            <div class="top-info">
                                <p><i class="flaticon-phone-call"></i> <a href="tel:9702621413">(970) 262-1413</a></p>
                                <p><i class="flaticon-email"></i> <a href="mailto:address@gmail.com">address@gmail.com</a></p>
                            </div>
                        </div>
                        <!-- Header Top Medal End -->

                        <!-- Header Top Right Start -->
                        <div class="header-top-right">
                            <ul class="social">
                                <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                                <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                <li><a href="#"><i class="flaticon-skype"></i></a></li>
                                <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- Header Top Right End -->

                    </div>
                    <!-- Header Top Wrapper End -->

                </div>
            </div>
            <!-- Header Top End -->

            <!-- Header Main Start -->
            <div class="header-main">
                <div class="container">

                    <!-- Header Main Start -->
                    <div class="header-main-wrapper">

                        <!-- Header Logo Start -->
                        <div class="header-logo">
                            <a href="index.html"><img src="assets/images/logo.png" alt="Logo"></a>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Menu Start -->
                        <div class="header-menu d-none d-lg-block">
                            <ul class="nav-menu">
                                <li><a href="/">Home</a></li>
                                <li>
                                    <a href="#">All Course</a>
                                    <ul class="sub-menu">
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="courses-details.html">Courses Details</a></li>
                                    </ul>
                                </li>
                                <!--<li>-->
                                <!--    <a href="#">Pages </a>-->
                                <!--    <ul class="sub-menu">-->
                                <!--        <li><a href="about.html">About</a></li>-->
                                <!--        <li><a href="register.php">Register</a></li>-->
                                <!--        <li><a href="login.php">Login</a></li>-->
                                <!--        <li><a href="faq.html">FAQ</a></li>-->
                                <!--        <li><a href="404-error.html">404 Error</a></li>-->
                                <!--        <li><a href="after-enroll.html">After Enroll</a></li>-->
                                <!--        <li><a href="courses-admin.html">Instructor Dashboard (Course List)</a></li>-->
                                <!--        <li><a href="overview.html">Instructor Dashboard (Performance)</a></li>-->
                                <!--        <li><a href="students.html">Students</a></li>-->
                                <!--        <li><a href="reviews.html">Reviews</a></li>-->
                                <!--        <li><a href="engagement.html">Course engagement</a></li>-->
                                <!--        <li><a href="traffic-conversion.html">Traffic & conversion</a></li>-->
                                <!--        <li><a href="messages.html">Messages</a></li>-->
                                <!--    </ul>-->
                                <!--</li>-->
                                <li>
                                   <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
    <!-- Display for logged-in users -->
    <a href="blog-grid.php">Blog</a>
<?php else: ?>
    <!-- Display for guests -->
    <span>Login to create blogs.</span>
    <!--<a href="login.php">Sign In</a>-->
<?php endif; ?>

                                    <!--<ul class="sub-menu">-->
                                    <!--    <li>-->
                                    <!--        <a href="#">Blog</a>-->
                                    <!--        <ul class="sub-menu">-->
                                    <!--            <li><a href="blog-grid.html">Blog</a></li>-->
                                    <!--            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>-->
                                    <!--            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>-->
                                    <!--        </ul>-->
                                    <!--    </li>-->
                                    <!--    <li>-->
                                    <!--        <a href="#">Blog Details</a>-->
                                    <!--        <ul class="sub-menu">-->
                                    <!--            <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>-->
                                    <!--            <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>-->
                                    <!--        </ul>-->
                                    <!--    </li>-->
                                    <!--</ul>-->
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>

                        </div>
                        <!-- Header Menu End -->


                        <!-- Header Sing In & Up Start -->
                        <div class="header-sign-in-up d-none d-lg-block">
                             <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
    <span>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
    <a href="logout.php">Logout</a>

            <?php else: ?>
                <!-- Display for guests -->
                <ul>
                    <li><a class="sign-in" href="login.php">Sign In</a></li>
                    <li><a class="sign-up" href="register.php">Sign Up</a></li>
                </ul>
            <?php endif; ?>
                        </div>
                        <!-- Header Sing In & Up End -->

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <a class="menu-toggle" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <!-- Header Mobile Toggle End -->

                    </div>
                    <!-- Header Main End -->

                </div>
            </div>
            <!-- Header Main End -->

        </div>
        <!-- Header Section End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu">

            <!-- Menu Close Start -->
            <a class="menu-close" href="javascript:void(0)">
                <i class="icofont-close-line"></i>
            </a>
            <!-- Menu Close End -->

            <!-- Mobile Top Medal Start -->
            <div class="mobile-top">
                <p><i class="flaticon-phone-call"></i> <a href="tel:9702621413">(970) 262-1413</a></p>
                <p><i class="flaticon-email"></i> <a href="mailto:address@gmail.com">address@gmail.com</a></p>
            </div>
            <!-- Mobile Top Medal End -->

            <!-- Mobile Sing In & Up Start -->
            <div class="mobile-sign-in-up">
                <ul>
                    <li><a class="sign-in" href="login.php">Sign In</a></li>
                    <li><a class="sign-up" href="register.php">Sign Up</a></li>
                </ul>
            </div>
            <!-- Mobile Sing In & Up End -->

            <!-- Mobile Menu Start -->
            <div class="mobile-menu-items">
                <ul class="nav-menu">
                    <li><a href="/">Home</a></li>
                    <li>
                        <a href="#">All Course</a>
                        <ul class="sub-menu">
                            <li><a href="courses.html">Courses</a></li>
                            <li><a href="courses-details.html">Courses Details</a></li>
                        </ul>
                    </li>
                    <!--<li>-->
                    <!--    <a href="#">Pages </a>-->
                    <!--    <ul class="sub-menu">-->
                    <!--        <li><a href="about.html">About</a></li>-->
                    <!--        <li><a href="register.php">Register</a></li>-->
                    <!--        <li><a href="login.php">Login</a></li>-->
                    <!--        <li><a href="faq.html">FAQ</a></li>-->
                    <!--        <li><a href="404-error.html">404 Error</a></li>-->
                    <!--        <li><a href="after-enroll.html">After Enroll</a></li>-->
                    <!--        <li><a href="courses-admin.html">Instructor Dashboard (Course List)</a></li>-->
                    <!--        <li><a href="overview.html">Instructor Dashboard (Performance)</a></li>-->
                    <!--        <li><a href="students.html">Students</a></li>-->
                    <!--        <li><a href="reviews.html">Reviews</a></li>-->
                    <!--        <li><a href="engagement.html">Course engagement</a></li>-->
                    <!--        <li><a href="traffic-conversion.html">Traffic & conversion</a></li>-->
                    <!--        <li><a href="messages.html">Messages</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li>
                       <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
    <!-- Display for logged-in users -->
    <a href="blog-grid.php">Blog</a>
<?php else: ?>
    <!-- Display for guests -->
    <span>Login to create blogs.</span>
    <!--<a href="login.php">Sign In</a>-->
<?php endif; ?>

                        <!--<ul class="sub-menu">-->
                        <!--    <li>-->
                        <!--        <a href="#">Blog</a>-->
                        <!--        <ul class="sub-menu">-->
                        <!--            <li><a href="blog-grid.html">Blog</a></li>-->
                        <!--            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>-->
                        <!--            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>-->
                        <!--        </ul>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a href="#">Blog Details</a>-->
                        <!--        <ul class="sub-menu">-->
                        <!--            <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>-->
                        <!--            <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>-->
                        <!--        </ul>-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>

            </div>
            <!-- Mobile Menu End -->

            <!-- Mobile Menu End -->
            <div class="mobile-social">
                <ul class="social">
                    <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                    <li><a href="#"><i class="flaticon-skype"></i></a></li>
                    <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                </ul>
            </div>
            <!-- Mobile Menu End -->

        </div>
        <!-- Mobile Menu End -->
