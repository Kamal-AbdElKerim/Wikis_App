<?php session_start();
  include_once "Model\conn.php" ;

  include_once "Controller\Dashboard_admin\Controller_Categories.php" ;
  include_once "Controller\Dashboard_admin\Controller_Tags.php" ;
  include_once "Controller\Auth_controller\controller_auth_Admin.php" ;
  include_once "Controller\Auth_controller\controller_auth_auteur.php" ;
  include_once "Controller\Controller_Front.php" ;
  include_once "Controller\wikis_Controller\wikis_Controller.php" ;




   $controller_Categories = new controller_Categories() ; 
   $controller_Tags = new controller_Tags() ; 
   $controller_auth_Admin = new controller_auth_Admin() ; 
   $controller_auth_auteur = new controller_auth_auteur() ; 
   $Controller_Front = new Controller_Front() ; 
   $wikis_Controller = new wikis_Controller() ; 

      if (isset($_GET["action"])) {
       $action = $_GET["action"] ; 
 
       switch ($action) {
    
        /* Categories Action */

        case "Page_Categories":
            $controller_Categories->controller_select_Categories() ; 
            break;
        case "deleteCategorie":
            $controller_Categories->controller_delete_Categorie() ; 
            break;
        case "CreateCategories":
            $controller_Categories->controller_insert_Categories() ; 
            break;
        case "UpdateCategorie":
            $controller_Categories->controller_Categories_update() ; 
            break;
        case "submitUpdateCategories":
            $controller_Categories->controller_submet_update_Categories() ; 
            break;

        /* end Categories Action */

        /* Tags Action */

        case "Page_Tags":
            $controller_Tags->controller_select_Tags() ; 
            break;
        case "deleteTags":
            $controller_Tags->controller_delete_Tags() ; 
            break;
        case "CreateTags":
            $controller_Tags->controller_insert_Tags() ; 
            break;
        case "UpdateTags":
            $controller_Tags->controller_Tags_update() ; 
            break;
        case "submitUpdateTags":
            $controller_Tags->controller_submet_update_Tags() ; 
            break;

        /* end Tags Action */

        /* login and registre */

        case "form_login":
            $controller_auth_Admin->login_form() ; 
            break;
        case "form_registre":
            $controller_auth_auteur->registre_form() ; 
            break;
        case "Signin":
            $controller_auth_Admin->controller_check_Admin_auteur() ; 
            break;
        case "registre":
            $controller_auth_auteur->controller_Register_auteur() ; 
            break;
        case "LogOut":
            $controller_auth_Admin->SignOut() ; 
            break;

        /* end login and registre */

        case "addWikis":
            $wikis_Controller->add_wiki() ; 
            break;
        case "deleteWiki":
            $wikis_Controller->deleteWikiByid() ; 
            break;
        case "update_form_wikis":
            $wikis_Controller->update_form_wikis() ; 
            break;
        case "updateWikis":
            $wikis_Controller->update_Wikis() ; 
            break;
        case "moredetails":
            $wikis_Controller->moredetails_wiki() ; 
            break;




        case "profile":
            $controller_auth_auteur->profile_auteur() ; 
            break;


        default:
       
            break; }
        }else{

            $Controller_Front->Page_Home() ; 
        }

         

         
      
   

   
