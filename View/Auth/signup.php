<?php  ob_start(); 
$title = "Sign Up" ; 
?>


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-body rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Wikis</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <form id="registrationForm" action="index.php?action=registre" method="post" onsubmit="return validateForm()">
                        <div class="form-floating mb-2">
                        <input type="text" class="form-control mb-2" id="floatingText" placeholder="jhondoe" name="name" value="<?= isset( $_SESSION["name"]) ?  $_SESSION["name"] : '' ?>" onkeyup="validateName()">
                            <label for="floatingText">Username</label>
                            <span style="color: red;"><?php if(isset($_GET['name'])) echo $_GET['name']; ?></span>
                            <span id="nameError" class="error" style="color: red;"></span>


                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com" name="email" value="<?= isset( $_SESSION["email"]) ?  $_SESSION["email"] : '' ?>" onkeyup="validateEmail()">
                            <label for="floatingInput">Email address</label>
                            <span style="color: red;"><?php if(isset($_GET['email'])) echo $_GET['email']; ?></span>
                            <span id="emailError" class="error" style="color: red;"></span>


                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" onkeyup="validatePassword()">
                            <label for="floatingPassword">Password</label>
                            <span style="color: red;"><?php if(isset($_GET['password'])) echo $_GET['password']; ?></span><br>
                            <span id="passwordError" style="color: red;"></span><br>


                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <?php if (isset($_GET["error"])) {   ?>
                        <div class="alert alert-danger" role="alert">
                        <?=   $error = $_GET["error"] ; ?>
                        </div>
                        <?php }  ?>
                        </form>
                        
                        <p class="text-center mb-0">Already have an Account? <a href="index.php?action=form_login">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->


        <script>
        function validateName() {
            var name = document.getElementById('floatingText').value;
            var nameError = document.getElementById('nameError');

            if (name.trim() === '') {
                nameError.innerText = 'Name is required';
            } else {
                nameError.innerText = '';
            }
        }

        function validateEmail() {
            var email = document.getElementById('floatingInput').value;
            var emailError = document.getElementById('emailError');
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                emailError.innerText = 'Invalid email address';
            } else {
                emailError.innerText = '';
            }
        }
        function validatePassword() {
    var password = document.getElementById('floatingPassword').value;
    var passwordError = document.getElementById('passwordError');


    if (password.length < 8) {
        passwordError.innerText = 'Password must be at least 8 characters';
    } else {
        passwordError.innerText = '';
    }
}


    
    </script>
        <?php $contant =  ob_get_clean();
    include_once "View\layout_front.php" ; 