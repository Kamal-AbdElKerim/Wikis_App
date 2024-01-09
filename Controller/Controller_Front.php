<?php

class Controller_Front {

    function Page_Home()  {
        $model_Categories = new model_Categories() ; 
        $AllCategories =   $model_Categories->getAllCategories() ; 

        $model_Tags = new model_Tags() ; 
        $AllTags =   $model_Tags->getAllTags() ; 
       
        $model_wikis = new model_wikis() ; 
      $Troi_wikis =  $model_wikis->TroiLastWikis();

        $model_Categories = new model_Categories() ; 
      $Last_Troi_Categories =  $model_Categories->Last_Troi_Categories();


    //     echo "<pre>";
    //   print_r( $Troi_wikis);
    //   echo "</pre>";

        include "View\View_front\Home.php" ; 

    }




}