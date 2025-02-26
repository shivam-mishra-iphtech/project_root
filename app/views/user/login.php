<?php
require_once __DIR__ . '/../../../routes/web.php';
require_once '../layouts/header.php';
// require_once __DIR__ . '/../../../app/middleware/AuthMiddleware.php'; // Include middleware


?>  
<style>
.content-container {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
    padding: 2rem;
    max-width: 800px;
    width: 90%;
    text-align: center;
    color: white;
}

.form-body {
    background: rgba(241, 238, 238, 0.2);
    backdrop-filter: blur(20px);
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    margin: 1rem auto;
    max-width: 600px;
    color: white;
}

.form-label {
    font-weight: 500;
    color: white;
    margin-bottom: 0.1rem;
}

.form-control {
    border: 1px solid rgba(255, 255, 255, 0.4);
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #86b7fe;
    background: rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 10px rgba(13, 110, 253, 0.3);
    outline: none;
}

/* Style for error messages */
.error {
    color: #ff4d4d;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: block;
}

/* Red border for invalid fields */
.is-invalid {
    border-color: #ff4d4d !important;
}

/* Login button styles */
.btn-success {
    background: rgba(40, 167, 69, 0.8);
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
    color: white;
}

/* Button hover effect */
.btn-success:hover {
    background: rgba(40, 167, 69, 1);
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.5);
}

/* Password toggle button */
.input-group .btn {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.4);
    color: white;
}

.input-group .btn:hover {
    background: rgba(255, 255, 255, 0.3);
}

/* Style for the headings */
h3 {
    font-size: 1.8rem;
    font-weight: 600;
    color: white;
}

p.lead {
    color: rgba(255, 255, 255, 0.8);
}

</style>

<section>
    <main class="container content-container">
        <div class="text-center mb-4">
            <h3 class="display-6 mb-3">Sign up Now</h3>
            <p class="lead text-muted">Fill in the details below to Login now</p>
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
                        <div style="color: red; background: #fdd; padding: 10px; border: 1px solid red; border-radius:5px; margin-bottom: 10px;">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)) : ?>
                        <div style="color: green; background: #dfd; padding: 10px; border: 1px solid green; border-radius:5px; margin-bottom: 10px;">
                            <?php echo htmlspecialchars($success); ?>
                        </div>
                    <?php endif; ?>

                   <form action="" method="POST" id="secureForm">
                       <div class="row g-3">

                            <div class="col-md-12">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email">
                                <span class="error" id="emailError"></span>
                            </div>

                           <div class="col-md-12">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <span class="error" id="passwordError"></span>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-success px-5 py-2" type="submit" name="login-user">Login </button>
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

        valid &= validateField(document.getElementById('email'), document.getElementById('emailError'), /^[^\s@]+@[^\s@]+\.[^\s@]+$/, "Enter a valid email.");
        valid &= validateField(document.getElementById('password'), document.getElementById('passwordError'), /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/, "Password must be strong.");
        if (!valid) e.preventDefault();
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    
    const inputs = {
       
        email: document.getElementById('email'),
        password: document.getElementById('password'),
       
      
    };

    const errors = {
     
        email: document.getElementById('emailError'),
       
        password: document.getElementById('passwordError'),
       
    };

    function sanitizeInput(input) {
        return input.replace(/[<>]/g, '');
    }

    function validateField(name, input) {
        let value = input.type === 'file' ? input.files : sanitizeInput(input.value.trim());
        let errorMsg = '';

        switch (name) {
           
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                errorMsg = !emailRegex.test(value) ? 'Enter a valid email address.' : '';
                break;
            case 'password':
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                errorMsg = !passwordRegex.test(value) 
                    ? 'Password must be at least 8 characters with uppercase, lowercase, number, and special character.' 
                    : '';
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

