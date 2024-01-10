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




    // this function for get inputs from auteur to create account for him
    function controller_Register_auteur()
    {
        extract($_POST);
       

        //call model
        $model_auteur = new model_auteur();

     



        // if auteur register successfully
        if (!empty($email) && !empty($name) && !empty($password) ) {

            $auteur =  $model_auteur->Insertauteur($email, $name , $password);

            header("Location: index.php?action=form_login&successful=createdSuccessfully");

            exit();
        } else {
            // if there is a erro send it with query url
            header("Location: index.php?action=form_registre&error=authentication_failed");
            exit();
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
