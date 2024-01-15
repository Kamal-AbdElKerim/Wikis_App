<?php

include "Model\Auth_model\DAO_Auth\DAO_admin.php";



class controller_auth_Admin
{

    function login_form()
    {

        include "View\Auth\signin.php" ;  

    }

    function validateLoginData($email, $password)
    {
        // Validation logic...
        // Check for validation errors and return them as an array
        $errors = [];

        // Validate Email
        if (empty($email)) {
            $errors['emailError'] = "Email field is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailError'] = "Invalid email format.";
        }

        // Validate Password
        if (empty($password)) {
            $errors['passwordError'] = "Password field is required.";
        }

        return $errors;
    }

    function controller_check_Admin_auteur()
    {
        extract($_POST);

        $_SESSION["email_login"] = $email ;

        $errors = $this->validateLoginData($email, $password);

        if (empty($errors)) {
        $model_admin = new model_admin();
        $Admin =  $model_admin->getadmin($email , $password);

        $model_auteur = new model_auteur();
        $auteur =  $model_auteur->getauteur($email , $password);
        
        if (empty($email) && empty($password)) {
           
         header("Location: index.php?action=form_login&error=authentication_failed");
        exit();
           
        }
        
        if ($Admin === true) {

            $_SESSION["Admin"] = $email;
            $_SESSION["admin_id"] = $admin_id;

            header("Location: index.php?action=Page_Dashboard");

            exit();

        }  else if ($auteur === true) {

            $model_auteur = new model_auteur();
            $auteur_id =  $model_auteur->getByemailauteur($email);

            $_SESSION["auteur"] = $email;
            $_SESSION["auteur_name"] = $name;
            $_SESSION["auteur_id"] = $auteur_id["auteur_id"];

            header("Location: index.php");

            exit();
        } else {
            header("Location: index.php?action=form_login&error=email or password false");

        }

    } else {
        $errorParams = http_build_query($errors);
        header("Location: index.php?action=form_login&$errorParams");
        exit();
    }
    
    }

    function SignOut()
    {


        session_destroy();
        header("Location: index.php?action=form_login");
    }


}
