<?php
require_once __DIR__ . '/../../../routes/web.php';
require_once '../layouts/header.php';

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
            <h3 class="display-6 mb-3">Welcome to Home</h3>
            <h4><?php
            
            echo $_SESSION['email']??'';?></h4>
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
                        <div style="color: red; background: #fdd; padding: 10px; border: 1px solid red; margin-bottom: 10px;">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)) : ?>
                        <div style="color: green; background: #dfd; padding: 10px; border: 1px solid green; margin-bottom: 10px;">
                            <?php echo htmlspecialchars($success); ?>
                        </div>
                    <?php endif; ?>

                   
                </div>
            </div>
        </div>
    </main>
</section>




