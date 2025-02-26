<?php
// ob_start();
include_once __DIR__.'/../../../routes/web.php';
?>
<style>
    .button a{
        text-align:center;
        text-decoration:none;
        font-size:24px;
        font-weight:400;
        color:black;
        padding: 5px 10px 5px 10px;
        border: 0px solid black;
        border-radius:10px;
        box-shadow:1px 1px 15px rgba(1, 1, 1, 0.4)
    }
    .button a:hover{
        background-color:rgba(1, 1, 1, 0.1);
        box-shadow:1px 1px 10px rgba(1, 1, 1, 1);
    }
    .content-container{
        background:transparent;
        box-shadow:1px 0px 15px rgba(10,10,10,0.5);
    }
    .feature{
        background:transparent;
        box-shadow:1px 0px 15px rgba(10,10,10,0.5);
    }
        

</style>
<?php include_once '../layouts/header.php';?>
<section>
<main class="container content-container">
        <div class="text-center mb-4">
            <h1 class="display-4">Welcome to Our Site</h1>
            <p class="lead">A responsive and modern web experience</p>
        </div>
        <div class="row">
            <div class=" col-md-4 mb-4">
                <div class="feature card h-100">
                    <div class="card-body">
                        <h5 class="card-title"> 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class=" col-md-4 mb-4">
                <div class="feature card h-100">
                    <div class="card-body">
                        <h5 class="card-title"> 2</h5>
                        <p class="card-text">Sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    </div>
                </div>
            </div>
            <div class=" col-md-4 mb-4">
                <div class="feature card h-100">
                    <div class="card-body">
                        <h5 class="card-title"> 3</h5>
                        <p class="card-text">Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
<section>
    <div class="container">
    <div class="text-center m-5 " style="background:transparent;">
        <div class="crowsel">

        </div>
       <div class="button">
        <a href="index.php?action=login">signIn</a>
        <a href="index.php?action=create">signUp</a>
       </div>

    </div>

    </div>
    
</section>
<?php include_once '../layouts/footer.php' ?>
