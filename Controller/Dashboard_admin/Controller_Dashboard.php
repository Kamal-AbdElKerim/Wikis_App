<?php 

include "Model\Dashboard_Admin\model_Dashbored.php" ;

class controller_Dashboard {



    function dateDifference($date) {
        $currentDate = new DateTime();
    
        $yourDate = new DateTime($date);
    
        $difference = $currentDate->getTimestamp() - $yourDate->getTimestamp();
    
        $daysDifference = floor($difference / (60 * 60 * 24));
        $hoursDifference = floor(($difference % (60 * 60 * 24)) / (60 * 60));
        $minutesDifference = floor(($difference % (60 * 60)) / 60);
        $secondsDifference = $difference % 60;
    
        if ($difference < 1000) {
            return "Just now";
        } elseif ($daysDifference > 0) {
            return $daysDifference . " days ago";
        } elseif ($hoursDifference > 0) {
            return $hoursDifference . " hours ago";
        } elseif ($minutesDifference > 0) {
            return $minutesDifference . " minutes ago";
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


      
     

        include "View\Vew_Admin\Dashboard.php" ; 
      
      }
    
}