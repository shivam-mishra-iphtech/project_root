<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Improved Design</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
    <style>
        body {
            min-height: 100vh;
            padding-top: 70px; /* Space for fixed navbar */
            background: 
                linear-gradient(135deg, #86afc9cc, #c99dd2cc, #271c45cc),
                url('https://www.transparenttextures.com/patterns/cubes.png'),
                url('https://www.transparenttextures.com/patterns/asfalt-light.png'),
                url('https://www.transparenttextures.com/patterns/hexellence.png');
            background-blend-mode: overlay, multiply, multiply, multiply;
            background-size: cover, 50px, 50px, 250px;
            background-attachment: fixed;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .content-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 20px auto;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 56px;
                background-size: cover, 30px, 30px, 150px;
            }
            .content-container {
                margin: 10px;
                padding: 1rem;
            }
        }
        #navbarNav{
            text-align:center;
        }
        .user-icon{
            font-size:20px;
            color:black;
        }
        .user-icon {
            text-decoration: none;
            color: #333;
            font-size: 20px;
            cursor: pointer;
        }

        .dropdown-menu {
            /* position: absolute; */
             top: 40px;
            right:  0; 
            background: white;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: none; /* Initially hidden */
            /* width: 150px; */
            padding: 8px 0;
            z-index: 1000;
        }

        .dropdown-item {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .dropdown-item:hover {
            background: #f1f1f1;
        }

    </style>
</head>
<body>
    <!-- Fixed Navigation Bar -->
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Services
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Service 1</a>
                                <a class="dropdown-item" href="#">Service 2</a>
                                <a class="dropdown-item" href="#">Service 3</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex position-relative">
                        <a class="user-icon" id="userIcon" href="javascript:void(0);">
                            <i class="fa-solid fa-circle-user fa-2x"></i>
                        </a>
                        <div class="dropdown-menu shadow" id="userDropdown">
                            <?php if(isset($_SESSION['user_id'])){
                                    echo "<a class='dropdown-item' href='?action=logout'><i class='fa-solid fa-right-from-bracket'></i> Logout</a>";
                                  }else{
                                    echo"<a class='dropdown-item' href='login.php'><i class='fa-solid fa-right-to-bracket'></i> Login</a>";
                                    echo"<a class='dropdown-item' href='?action=create'><i class='fa-solid fa-user-plus'></i> Sign Up</a>";
                                 }
                                ?>      
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Include Bootstrap JS and FontAwesome (if not already included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userIcon = document.getElementById("userIcon");
            const userDropdown = document.getElementById("userDropdown");

            userIcon.addEventListener("click", function (event) {
                event.stopPropagation(); // Prevent click from closing immediately
                userDropdown.style.display = (userDropdown.style.display === "block") ? "none" : "block";
            });

            // Hide dropdown when clicking outside
            document.addEventListener("click", function (event) {
                if (!userIcon.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.style.display = "none";
                }
            });
        });

    </script>
</body>
</html>