<?php
require_once __DIR__ . '/../../../routes/web.php';
require_once '../layouts/header.php';
?>  
<style>
    .content-container {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        margin: 2rem auto;
        padding: 2rem;
    }

    .form-body {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        margin: 1rem 0;
    }

    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 0.1rem;
    }

    .form-control {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .error {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
        min-height: 1.2em;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    .btn-success {
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-top: 1.5rem;
    }
</style>

<section>
    <main class="container content-container">
        <div class="text-center mb-4">
            <h3 class="display-6 mb-3">Add New User</h3>
            <p class="lead text-muted">Fill in the details below to add a new user</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-body">
                <?php
                    // Check for error or success messages
                    $error = isset($_GET['error']) ? $_GET['error'] : '';
                    $success = isset($_GET['success']) ? $_GET['success'] : '';
                    ?>

                    <?php if (!empty($error)) : ?>
                        <div style="color: red; background: #fdd; padding: 10px; border: 1px solid red; margin-bottom: 10px;">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)) : ?>
                        <div style="color: green; background: #dfd; padding: 10px; border: 1px solid green; margin-bottom: 10px;">
                            <?php echo htmlspecialchars($success); ?>
                        </div>
                    <?php endif; ?>

                   <form action="" method="post" enctype="multipart/form-data" id="secureForm">
                       <div class="row g-3">
                            <!-- Product Name -->
                            <div class="col-md-6">
                                <label class="form-label" for="name"> Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name">
                                <span class="error" id="nameError"></span>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email">
                                <span class="error" id="emailError"></span>
                            </div>

                            <!-- Contact -->
                            <div class="col-md-6">
                                <label class="form-label" for="contact">Contact</label>
                                <input class="form-control" type="number" id="contact" name="contact" placeholder="Enter your contact">
                                <span class="error" id="contactError"></span>
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <label class="form-label" for="dob">Date of Birth</label>
                                <input class="form-control" type="date" id="dob" name="dob">
                                <span class="error" id="dobError"></span>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <label class="form-label" for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter your address"></textarea>
                                <span class="error" id="addressError"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="address">About</label>
                                <textarea class="form-control" name="about" id="about" rows="4" placeholder="Enter about yourself"></textarea>
                                <span class="error" id="aboutError"></span>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <span class="error" id="passwordError"></span>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <label class="form-label" for="repassword">Confirm Password</label>
                                <input class="form-control" type="password" id="repassword" name="repassword" placeholder="Confirm password">
                                <span class="error" id="repasswordError"></span>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-12">
                                <label class="form-label" for="images">Images</label>
                                <input class="form-control" type="file" id="images" name="images" accept="image/*">
                                <small class="text-muted d-block mt-1">Upload only JPG, JPEG, PNG (Max: 5MB)</small>
                                <span class="error" id="imagesError"></span>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center">
                                <button class="btn btn-success px-5 py-2" type="submit" name="add-user">
                                    <i class="bi bi-upload me-2"></i>Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</section>

<script>
// Secure Form Validation
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('secureForm');

    function validateField(input, errorElement, regex, errorMessage) {
        const value = input.value.trim();
        if (!regex.test(value)) {
            errorElement.textContent = errorMessage;
            input.classList.add('is-invalid');
            return false;
        }
        errorElement.textContent = '';
        input.classList.remove('is-invalid');
        return true;
    }

    form.addEventListener('submit', function (e) {
        let valid = true;

        valid &= validateField(document.getElementById('name'), document.getElementById('nameError'), /^.{3,}$/, "Name must be at least 3 characters.");
        valid &= validateField(document.getElementById('email'), document.getElementById('emailError'), /^[^\s@]+@[^\s@]+\.[^\s@]+$/, "Enter a valid email.");
        valid &= validateField(document.getElementById('contact'), document.getElementById('contactError'), /^[0-9]{10,15}$/, "Enter a valid phone number.");
        valid &= validateField(document.getElementById('password'), document.getElementById('passwordError'), /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/, "Password must be strong.");
        valid &= document.getElementById('password').value === document.getElementById('repassword').value;
        if (!valid) e.preventDefault();
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    
    const inputs = {
        name: document.getElementById('name'),
        email: document.getElementById('email'),
        contact: document.getElementById('contact'),
        dob: document.getElementById('dob'),
        address: document.getElementById('address'),
        about: document.getElementById('about'),
        password: document.getElementById('password'),
        repassword: document.getElementById('repassword'),
        images: document.getElementById('images'),
    };

    const errors = {
        name: document.getElementById('nameError'),
        email: document.getElementById('emailError'),
        contact: document.getElementById('contactError'),
        dob: document.getElementById('dobError'),
        address: document.getElementById('addressError'),
        about: document.getElementById('aboutError'),
        password: document.getElementById('passwordError'),
        repassword: document.getElementById('repasswordError'),
        images: document.getElementById('imagesError'),
    };

    function sanitizeInput(input) {
        return input.replace(/[<>]/g, '');
    }

    function validateField(name, input) {
        let value = input.type === 'file' ? input.files : sanitizeInput(input.value.trim());
        let errorMsg = '';

        switch (name) {
            case 'name':
                errorMsg = value.length < 3 ? 'Name must be at least 3 characters.' : '';
                break;
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                errorMsg = !emailRegex.test(value) ? 'Enter a valid email address.' : '';
                break;
            case 'contact':
                const phoneRegex = /^[0-9]{10,15}$/;
                errorMsg = !phoneRegex.test(value) ? 'Enter a valid phone number (10-15 digits).' : '';
                break;
            case 'dob':
                errorMsg = value ? '' : 'Date of birth is required.';
                break;
            case 'address':
                errorMsg = value.length < 5 ? 'Address must be at least 5 characters long.' : '';
                break;
            case 'about':
                errorMsg = value.length < 10 ? 'Please provide more details in the About section.' : '';
                break;
            case 'password':
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                errorMsg = !passwordRegex.test(value) 
                    ? 'Password must be at least 8 characters with uppercase, lowercase, number, and special character.' 
                    : '';
                break;
            case 'repassword':
                errorMsg = value !== inputs.password.value ? 'Passwords do not match.' : '';
                break;
            case 'images':
                if (input.files.length > 0) {
                    const file = input.files[0];
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    const maxSize = 5 * 1024 * 1024; // 2MB

                    if (!allowedTypes.includes(file.type)) {
                        errorMsg = 'Only JPG, JPEG, and PNG files are allowed.';
                    } else if (file.size > maxSize) {
                        errorMsg = 'File size must be less than 2MB.';
                    }
                }
                break;
        }

        errors[name].textContent = errorMsg;
        input.classList.toggle('is-invalid', errorMsg !== '');
        return errorMsg === '';
    }

    Object.entries(inputs).forEach(([name, input]) => {
        input.addEventListener('input', () => validateField(name, input));
        input.addEventListener('blur', () => validateField(name, input));
    });

    form.addEventListener('submit', function (e) {
        let isValid = true;
        Object.entries(inputs).forEach(([name, input]) => {
            if (!validateField(name, input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });
});
</script>
<script>
    document.getElementById("togglePassword").addEventListener("click", function () {
        var passwordField = document.getElementById("password");
        var icon = this.querySelector("i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    });
</script>

<!-- Make sure to include Font Awesome in your project -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

