<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include("include/config.php"); // Adjust this path as needed

    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $user_id = $_SESSION['roll_number']; // Assuming you have user's roll number in session

    $targetDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Prepare an insert statement
            $sql = "INSERT INTO blogs (title, content, image, user_id) VALUES (?, ?, ?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("sssi", $title, $content, $imageName, $user_id);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    echo "New blog created successfully";
                    // Optionally, redirect or set a session message here
                } else {
                    echo "Error: " . $stmt->error;
                }
                // Close statement
                $stmt->close();
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
    // Close connection
    $conn->close();
}
?>


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
<style>
    .btn-secondary {
    height: 52px;
    color: #000000de;
}
/* Popup container - can be the background overlay */
/* Popup container - can be the background overlay */
.popup-container {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    color: black;
    background: rgba(0, 128, 0, 0.4);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
}

/* Popup Form styling */
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        h2 {
            text-align: center;
            color: #336633; /* Darker shade of green for the title */
        }
        label {
            font-weight: bold;
            color: #2a8f2a; /* Green color for labels */
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #a4d3a2; /* Light green border */
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        button[type="submit"], button[type="button"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px; /* Adds spacing between buttons if they are next to each other */
        }
        button[type="submit"] {
            background-color: #4CAF50; /* Primary green color for submit */
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        button[type="button"] {
            background-color: #8bc34a; /* Lighter green for a distinct close button */
            color: white;
        }
        button[type="button"]:hover {
            background-color: #7cb342; /* Slightly darker green on hover */
        }
    </style>

<!--/* Close button specific styling */-->
<!--#closePopupBtn {-->
<!--    background-color: #f44336; /* Red button for closing to distinguish action */-->
<!--}-->


<!--/* Popup Form styling */-->
<!--form {-->
<!--    background: white;-->
<!--    padding: 20px;-->
<!--    border-radius: 8px;-->
<!--    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);-->
<!--}-->

</style>

</head>

<body>

    <div class="main-wrapper">

        <!-- Header Section Start -->
        

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
                        <li class="active">Blog</li>
                    </ul>
                    <h2 class="title">Our <span>Blog</span></h2>
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
        
<div id="popupForm" class="popup-container" style="display:none;">
    <form method="POST" enctype="multipart/form-data">
    <h2>Form Title</h2>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br><br>
    <label for="content">Content:</label>
    <textarea id="content" name="content"></textarea><br><br>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image"><br><br>
    <button type="submit">Submit</button>
    <button type="button" id="closePopupBtn">Close</button>
</form>

</div>

        <!-- Page Banner End -->
       <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
    <!-- Display for logged-in users -->
    <a> <!-- Assuming 'create-blog.php' is your blog creation page -->
        <button class="btn-secondary" id="openPopupBtn">
            Click Here To Create Your Own Blog
        </button>
    </a>
<?php else: ?>
    <!-- Display for guests -->
    <span>Login to create blogs.</span>
    <!-- Consider adding a link to your login page here -->
<?php endif; ?>

        <!-- Blog Start -->
        <div class="section section-padding mt-n10">
            <div class="container">

                <!-- Blog Wrapper Start -->
               <div class="blog-wrapper">
    <div class="row">
        <?php
        session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Include database connection
include("include/config.php");

$user_id = isset($_SESSION['roll_number']) ? $_SESSION['roll_number'] : null;
if (!$user_id) {
    die("User ID not set or user not logged in.");
}

        // Assuming $conn is your database connection and $user_id is set to the current user's ID
        $sql = "SELECT * FROM blogs WHERE user_id = '$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-4 col-md-6">
                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-image">
                            <!-- Assuming 'blog_image' is the column name for the blog images in your database -->
                            <a href="blog-details-left-sidebar.php?blog_id=<?php echo $row['id']; ?>"><img src="uploads/<?php echo $row['image']; ?>" alt="Blog"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-author">
                                <div class="author">
                                    <div class="author-thumb">
                                        <!-- Placeholder for Author Image -->
                                        <a href="#"><img src="uploads/<?php echo $row['image']; ?>" alt="Blog"></a>
                                    </div>
                                    <div class="author-name" hidden>
                                        <!-- Assuming you'll add author's name or use the user's name related to the blog -->
                                        <a class="name" href="#">Author Name</a>
                                    </div>
                                </div>
                                <div class="tag" hidden>
                                    <!-- Placeholder for Blog Tag -->
                                    <a href="#">Tag Name</a>
                                </div>
                            </div>

                            <h4 class="title"><a href="blog-details-left-sidebar.php?blog_id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>

                            <div class="blog-meta">
                                <span> <i class="icofont-calendar"></i> <?php echo date('d M, Y', strtotime($row['date'])); ?></span>
                                <!-- Placeholder for Likes or any other meta data -->
                                <span> <i class="icofont-heart"></i> Likes Placeholder </span>
                            </div>

                            <a href="blog-details-left-sidebar.php?blog_id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-hover-primary">Read More</a>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <?php
            }
        } else {
            echo "No blogs found";
        }
        ?>
    </div>
</div>

                <!-- Blog Wrapper End -->

                <!-- Page Pagination End -->
                <div class="page-pagination">
                    <ul class="pagination justify-content-center">
                        <li><a href="#"><i class="icofont-rounded-left"></i></a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                    </ul>
                </div>
                <!-- Page Pagination End -->

            </div>
        </div>
        <!-- Blog End -->

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

        <!-- Footer Start  -->
        <?php include('include/footer.php'); ?>
        <!-- Footer End -->

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
    $(document).ready(function(){
    $("#openFormButton").click(function(){
        $("#myForm").show();
    });
});

</script>
<script>document.getElementById("openPopupBtn").addEventListener("click", function() {
    document.getElementById("popupForm").style.display = "flex";
});

document.getElementById("closePopupBtn").addEventListener("click", function() {
    document.getElementById("popupForm").style.display = "none";
});
</script>
</body>

</html>