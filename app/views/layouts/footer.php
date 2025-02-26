<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .footer {
            background:transparent;
            
        }

        .footer a {
            text-decoration: none;
            color:rgb(1, 1, 1);
            transition: 0.3s;
        }

        .footer a:hover {
            color: #f8f9fa; /* Light hover effect */
            text-shadow: 1px 0px 0px rgba(1, 1 ,15, 0.6)
        }

        .footer .social-icons a {
            font-size: 20px;
            margin-right: 15px;
        }

        .footer h6 {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .footer p {
            margin-bottom: 10px;
        }

        .footer .social-icons a:hover {
            color: #d4af37; /* Gold hover effect */
        }

        .footer .bottom-bar {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px 0;
        }
    </style>
</head>
<body>

<!-- Footer -->
<footer class="footer text-center text-lg-start">
  <!-- Social Media Section -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left Empty -->

    <!-- Right: Social Links -->
    <div class="social-icons">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-google"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-linkedin"></i></a>
      <a href="#"><i class="fab fa-github"></i></a>
    </div>
  </section>

  <!-- Main Footer Content -->
  <section class="container text-center text-md-start mt-4">
    <div class="row mt-3">
      <!-- Company Info -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <h6><i class="fas fa-gem me-2"></i>Company Name</h6>
        <p>We provide high-quality products and services to our customers worldwide.</p>
      </div>

      <!-- Products -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6>Products</h6>
        <p><a href="#">Angular</a></p>
        <p><a href="#">React</a></p>
        <p><a href="#">Vue</a></p>
        <p><a href="#">Laravel</a></p>
      </div>

      <!-- Useful Links -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6>Useful Links</h6>
        <p><a href="#">Pricing</a></p>
        <p><a href="#">Settings</a></p>
        <p><a href="#">Orders</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <!-- Contact Info -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <h6>Contact</h6>
        <p><i class="fas fa-home me-2"></i> New York, NY 10012, US</p>
        <p><i class="fas fa-envelope me-2"></i> info@example.com</p>
        <p><i class="fas fa-phone me-2"></i> +01 234 567 88</p>
        <p><i class="fas fa-print me-2"></i> +01 234 567 89</p>
      </div>
    </div>
  </section>

  <!-- Copyright -->
  <div class="text-center bottom-bar">
    © 2025 Copyright:
    <a class="text-reset fw-bold" href="#">YourWebsite.com</a>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
