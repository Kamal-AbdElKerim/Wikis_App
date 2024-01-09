<?php 

include_once "Model\Dashboard_Admin\DAO_Dashboard\DAO_Categories.php";


class controller_Categories {


    function controller_select_Categories()  {
        $model_Categories = new model_Categories() ; 
        $AllCategories =   $model_Categories->getAllCategories() ; 
      


        include_once "View\Vew_Admin\Categories\Categories.php" ;
    }
    
    
    function controller_insert_Categories()  {
        extract($_POST);
    
             if (!empty($name) && !empty($Bio) ) {
            
                $model_Categories = new model_Categories() ; 
                $model_Categories->InsertCategories($name, $Bio) ;
                header("Location: index.php?action=Page_Categories");

              
             }else {
                header("Location: index.php?action=Page_Categories&error=name et bio required&name=$name&Bio=$Bio");

             }

   
     }
    
    function controller_Categories_update()  {
        $name = $_GET['name'];
       


        $model_Categories = new model_Categories() ; 
      

       $Categorie =   $model_Categories->getByNameCategories($name) ; 

    

          require_once  'View\Vew_Admin\Categories\Update_Categories.php';

       
   
    }

    function controller_delete_Categorie()  {
        $name = $_GET['name'];
        $model_Categories = new model_Categories() ; 

             $model_Categories->deleteByNameCategories($name); 
         
             header("Location: index.php?action=Page_Categories");
       
   
    }
    
    function controller_submet_update_Categories()  {
        extract($_POST);
        // print_r($_POST);


       
        if (isset($submit)) {
          
      

             if (!empty($name) && !empty($Bio) ) {
                $model_Categories = new model_Categories() ; 

                $model_Categories->UpdateCategories($nameid,$name, $Bio) ; 

                header("Location: index.php?action=Page_Categories");

              
             }



            } 
          

       
   
    }
}