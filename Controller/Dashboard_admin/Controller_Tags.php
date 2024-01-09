<?php 

include_once "Model\Dashboard_Admin\DAO_Dashboard\DAO_Tags.php";


class controller_Tags {


    function controller_select_Tags()  {
        $model_Tags = new model_Tags() ; 
        $AllTags =   $model_Tags->getAllTags() ; 
     
      
        include_once "View\Vew_Admin\Tags\Tags.php" ;
    }
    
    
    function controller_insert_Tags()  {
        extract($_POST);
      
    
             if (!empty($tag_name)  ) {
            
                $model_Tags = new model_Tags() ; 
                $model_Tags->InsertTags($tag_name) ;
                header("Location: index.php?action=Page_Tags");

              
             }else {
                header("Location: index.php?action=Page_Tags&error=tag_name required&tag_name=$name");

             }

   
     }
    
    function controller_Tags_update()  {
        $tag_id = $_GET['tag_id'];
       


        $model_Tags = new model_Tags() ; 
      

       $Tag =   $model_Tags->getBytag_idTags($tag_id) ; 

    //  print_r($Tag);

          require_once  'View\Vew_Admin\Tags\Update_Tags.php';

       
   
    }

    function controller_delete_Tags()  {
        $tag_id = $_GET['tag_id'];
        $model_Tags = new model_Tags() ; 

             $model_Tags->deleteBytag_idTags($tag_id); 
         
             header("Location: index.php?action=Page_Tags");
       
   
    }
    
    function controller_submet_update_Tags()  {
        extract($_POST);
        // print_r($_POST);

    
       
        if (isset($submit)) {
          
      

             if (!empty($tag_name)  ) {
                $model_Tags = new model_Tags() ; 

                $model_Tags->UpdateTags($tag_id,$tag_name) ; 

                header("Location: index.php?action=Page_Tags");

              
             }else {
                header("Location: index.php?action=UpdateTags&error=tag_name required&tag_name=$name");
    
             }



            } 
          

       
   
    }
}