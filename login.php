

<?php
session_start();
include("include/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $conn->real_escape_string($_POST['roll_number']);
    $password = $conn->real_escape_string($_POST['password']);

    // Adjust the SQL to also select the 'name' field
    $sql = "SELECT id, password, name FROM users WHERE roll_number = '$roll_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['roll_number'] = $roll_number;
            $_SESSION['user_name'] = $row['name']; // Store the user's name in session
            
            // Set a session variable to indicate login success
            $_SESSION['login_success'] = true;

            header("Location: /");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that roll number";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edule - eLearning Website Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    
    <!-- Google Fonts CSS -->  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/plugins/icofont.min.css">
    <link rel="stylesheet" href="assets/css/plugins/flaticon.css">
    <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/apexcharts.css">
    <link rel="stylesheet" href="assets/css/plugins/jqvmap.min.css">

    <!-- Main Style CSS -->
        <link rel="stylesheet" href="assets/css/style.css">


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

</head>

<body>

    <div class="main-wrapper">

        

        <!-- Overlay Start -->
        <div class="overlay"></div>
        <!-- Overlay End -->
<?php include('include/header.php'); ?>
        <!-- Page Banner Start -->
        <div class="section page-banner">

            <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">

            <img class="shape-2" src="assets/images/shape/shape-23.png" alt="Shape">

            <div class="container">
                <!-- Page Banner Start -->
                <div class="page-banner-content">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                    <h2 class="title">Login <span>Form</span></h2>
                </div>
                <!-- Page Banner End -->
            </div>

            <!-- Shape Icon Box Start -->
            <div class="shape-icon-box">

                <img class="icon-shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

                <div class="box-content">
                    <div class="box-wrapper">
                        <i class="flaticon-badge"></i>
                    </div>
                </div>

                <img class="icon-shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

            </div>
            <!-- Shape Icon Box End -->

            <img class="shape-3" src="assets/images/shape/shape-24.png" alt="Shape">

            <img class="shape-author" src="assets/images/author/author-11.jpg" alt="Shape">

        </div>
        <!-- Page Banner End -->

        <!-- Register & Login Start -->
        <div class="section section-padding">
            <div class="container">
<!-- Toast Notification Container -->
<div id="toastNotification" style="visibility: hidden; min-width: 250px; margin-left: -125px; background-color: green; color: white; text-align: center; border-radius: 2px; padding: 16px; position: fixed; z-index: 1; left: 50%; bottom: 30px; font-size: 17px;">
  Login Successful!
</div>

                <!-- Register & Login Wrapper Start -->
                <div class="register-login-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <!-- Register & Login Images Start -->
                            <div class="register-login-images">
                                <div class="shape-1">
                                    <img src="assets/images/shape/shape-26.png" alt="Shape">
                                </div>


                                <div class="images">
                                    <img src="assets/images/register-login.png" alt="Register Login">
                                </div>
                            </div>
                            <!-- Register & Login Images End -->

                        </div>
                        <div class="col-lg-6">


<!-- Toast Notification -->
<?php if (isset($_SESSION['toast'])): ?>
<div id="toast" style="position: fixed; bottom: 20px; right: 20px; background-color: black; color: white; padding: 16px; border-radius: 8px; display: none;">
    <?php echo $_SESSION['toast']; ?>
</div>
<script>
    window.onload = function() {
        var toastElement = document.getElementById("toast");
        toastElement.style.display = "block";
        setTimeout(function() {
            toastElement.style.display = "none";
        }, 3000); // Show toast for 3 seconds
    };
</script>
<?php
    // Clear the toast message after displaying
    unset($_SESSION['toast']);
endif;
?>
                            <!-- Register & Login Form Start -->
                            <div class="register-login-form">
                                <h3 class="title">Login <span>Now</span></h3>

                                <div class="form-wrapper">
                                    <form action="#" method="post">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input type="text" name="roll_number" placeholder="Roll Number">
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <button class="btn btn-primary btn-hover-dark w-100" type="submit">Login</button>
                                            <!--<a class="btn btn-secondary btn-outline w-100" href="#">Login with Google</a>-->
                                        </div>
                                        <!-- Single Form End -->
                                    </form>
                                </div>
                            </div>
                            <!-- Register & Login Form End -->

                        </div>
                    </div>
                </div>
                <!-- Register & Login Wrapper End -->

            </div>
        </div>
        <!-- Register & Login End -->

        <!-- Download App Start -->
        <div class="section section-padding download-section">

            <div class="app-shape-1"></div>
            <div class="app-shape-2"></div>
            <div class="app-shape-3"></div>
            <div class="app-shape-4"></div>

            <div class="container">

                <!-- Download App Wrapper Start -->
                <div class="download-app-wrapper mt-n6">

                    <!-- Section Title Start -->
                    <div class="section-title section-title-white">
                        <h5 class="sub-title">Ready to start?</h5>
                        <h2 class="main-title">Download our mobile app. for easy to start your course.</h2>
                    </div>
                    <!-- Section Title End -->

                    <img class="shape-1 animation-right" src="assets/images/shape/shape-14.png" alt="Shape">

                    <!-- Download App Button End -->
                    <div class="download-app-btn">
                        <ul class="app-btn">
                            <li><a href="#"><img src="assets/images/google-play.png" alt="Google Play"></a></li>
                            <li><a href="#"><img src="assets/images/app-store.png" alt="App Store"></a></li>
                        </ul>
                    </div>
                    <!-- Download App Button End -->

                </div>
                <!-- Download App Wrapper End -->

            </div>
        </div>
        <!-- Download App End -->

       <?php include('include/footer.php'); ?>

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="icofont-simple-up"></i>
        </a>
        <!--Back To End-->

    </div>






    <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <!-- <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/video-playlist.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/ajax-contact.js"></script> -->

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <script src="assets/js/plugins.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event) { 
    // Check if the login_success session variable is set
    <?php if(isset($_SESSION['login_success']) && $_SESSION['login_success'] === true): ?>
        // Show the toast notification
        var toast = document.getElementById("toastNotification");
        toast.style.visibility = 'visible';
        
        // After 3 seconds, hide the toast
        setTimeout(function(){ toast.style.visibility = 'hidden'; }, 3000);

        // Unset the session variable so it doesn't show again on refresh
        <?php unset($_SESSION['login_success']); ?>
    <?php endif; ?>
});
</script>

</body>

</html>