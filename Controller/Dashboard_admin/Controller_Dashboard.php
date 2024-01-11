<?php 

include "Model\Dashboard_Admin\model_Dashbored.php" ;

class controller_Dashboard {


    function dateDifference($date) {
        $currentDate = new DateTime();
        $yourDate = new DateTime($date);
    
        $difference = $currentDate->getTimestamp() - $yourDate->getTimestamp();
    
        if ($difference < 60) {
            return "Just now";
        } elseif ($difference < 3600) {
            return floor($difference / 60) . " minutes ago";
        } elseif ($difference < 86400) {
            return floor($difference / 3600) . " hours ago";
        } elseif ($difference < 2592000) {
            return floor($difference / 86400) . " days ago";
        } else {
            return "Just now";
        }
    }
    
    

    

      function Dashboard()  {

        $model_Categories = new model_Categories() ; 
        $AllCategories =   $model_Categories->getAllCategories() ; 
        $Num_AllCategories = count($AllCategories);

        $model_Tags = new model_Tags() ; 
        $AllTags =   $model_Tags->getAllTags() ;
        $Num_AllTags = count($AllTags);

        $model_Dashbored = new model_Dashbored() ; 
        $All_wikis =  $model_Dashbored->getAllwikis();
        $Num_All_wikis = count($All_wikis);

        $model_auteur = new model_auteur() ; 
        $All_auteur =  $model_auteur->getAllauteur();
        $Num_All_auteur = count($All_auteur);

        // echo "<pre>";
        // print_r($All_auteur);
        // echo "</pre>";
      
      
       
       

       include "View\Vew_Admin\Dashboard.php" ; 
      
      }
    
}