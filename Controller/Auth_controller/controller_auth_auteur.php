<?php

include "Model\Front\DAO_Front\DAO_auteur.php";

class controller_auth_auteur
{


    function registre_form()
    {

        include "View\Auth\signup.php" ;  

    }


    function   affiche_form_auteur_register()
    {
        if (!empty($_SESSION["emailauteur"])) {
            header("Location: index.php?action=auteurPanel");
        } else {
            include_once "View\auth/register_auteur.php";
        }
    }

    function getemail($email) {
        
        $model_auteur = new model_auteur();
        $auteur =  $model_auteur->getByemailauteur($email);
        return  $auteur ;
    }


    function validateUserData($name, $email, $password) {
        $errors = [];
    
        // Validate Name
        if (empty($name)) {
            $errors['name'] = "Name field is required.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $errors['name'] = "Only letters, spaces, hyphens, and apostrophes allowed in the name.";
        }
    
        // Validate Email
        if (empty($email)) {
            $errors['email'] = "Email field is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        } elseif (!empty($this->getemail($email))) {
            $errors['email'] = "email already exists.";
        }
    
        // Validate Password
        $minLength = 8; // Change as needed
        if (empty($password)) {
            $errors['password'] = "Password field is required.";
        } elseif (strlen($password) < $minLength) {
            $errors['password'] = "Password should be at least $minLength characters long.";
        }
    
        return $errors;
    }
    

    function controller_Register_auteur()
    {
        // Validate and process the form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
         $_SESSION["name"] =   $name = $_POST['name'];
         $_SESSION["email"] =  $email = $_POST['email'];
         $_SESSION["password"] =   $password = $_POST['password'];

            // Backend validation for name, email, and password (similar to the previous PHP validation function)
            $errors = $this->validateUserData($name, $email, $password);

            if (empty($errors)) {
                // All inputs are valid, proceed with registration
                $model_auteur = new model_auteur();
                $auteur =  $model_auteur->Insertauteur($email, $name, $password);
                header("Location: index.php?action=form_login&successful=createdSuccessfully");
                exit();
            } else {
                // Errors occurred, redirect back to the registration form with errors
                $errorParams = http_build_query($errors);
                header("Location: index.php?action=form_registre&$errorParams");
                exit();
            }
        }
    }

    function profile_auteur()  {
        $model_auteur = new model_auteur();
     $profile = $model_auteur->getAllauteur_profile($_GET["auteur_id"]) ;
    //  echo "<pre>";
    //  print_r($profile);
    //  echo "</pre>";
        
        include "View\View_front\profile.php" ;
    }





 

   
}
