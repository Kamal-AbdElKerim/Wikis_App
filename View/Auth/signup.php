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
                        <input type="text" class="form-control" id="floatingText" placeholder="jhondoe" name="name" value="<?= isset( $_SESSION["name"]) ?  $_SESSION["name"] : '' ?>">
                            <label for="floatingText">Username</label>
                            <span style="color: red;"><?php if(isset($_GET['name'])) echo $_GET['name']; ?></span><br>
                            <span id="nameError" style="color: red;"></span><br>


                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?= isset( $_SESSION["email"]) ?  $_SESSION["email"] : '' ?>">
                            <label for="floatingInput">Email address</label>
                            <span style="color: red;"><?php if(isset($_GET['email'])) echo $_GET['email']; ?></span><br>
                            <span id="emailError" style="color: red;"></span><br>


                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" >
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
function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    var nameError = document.getElementById('nameError');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    
    var nameRegex = /^[a-zA-Z-' ]*$/;
    var minLength = 8; // Change as needed
    
    // Name Validation
    if (name === '' || !name.match(nameRegex)) {
        nameError.textContent = "Please enter a valid name.";
        return false;
    } else {
        nameError.textContent = "";
    }
    
    // Email Validation
    if (email === '' || !/^\S+@\S+\.\S+$/.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        return false;
    } else {
        emailError.textContent = "";
    }
    
    // Password Validation
    if (password === '' || password.length < minLength) {
        passwordError.textContent = "Password should be at least " + minLength + " characters long.";
        return false;
    } else {
        passwordError.textContent = "";
    }
    
    return true; // Form submission allowed if all validations pass
}
</script>
        <?php $contant =  ob_get_clean();
    include_once "View\layout_front.php" ; 