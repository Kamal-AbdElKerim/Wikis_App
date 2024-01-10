<?php

include "Model\Auth_model\DAO_Auth\DAO_admin.php";



class controller_auth_Admin
{

    function login_form()
    {

        include "View\Auth\signin.php" ;  

    }

    function controller_check_Admin_auteur()
    {
        extract($_POST);

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

            header("Location: index.php?action=Page_Categories");

            exit();

        }  else if ($auteur === true) {

            $model_auteur = new model_auteur();
            $auteur_id =  $model_auteur->getByemailauteur($email);

            $_SESSION["auteur"] = $email;
            $_SESSION["auteur_id"] = $auteur_id["auteur_id"];

            header("Location: index.php");

            exit();
        } else {
            header("Location: index.php?action=form_login&error=email or password false");

        }
    
     




        // Checking user authentication


   
    }

    function SignOut()
    {


        session_destroy();
        header("Location: index.php?action=form_login");
    }
}
