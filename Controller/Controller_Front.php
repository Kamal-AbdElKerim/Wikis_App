<?php

class Controller_Front {

    function Page_Home()  {
        $model_Categories = new model_Categories() ; 
        $AllCategories =   $model_Categories->getAllCategories() ; 

        $num_AllCategories = count($AllCategories) ;

        $model_Tags = new model_Tags() ; 
        $AllTags =   $model_Tags->getAllTags() ; 

        $num_AllTags = count($AllTags) ;
       
        $DAO_model_wikis = new DAO_model_wikis() ; 
      $All_wikis =  $DAO_model_wikis->getAllwikis();

      $num_All_wikis = count($All_wikis) ;
      
        $model_auteur = new model_auteur() ; 
      $All_auteur =  $model_auteur->getAllauteur();

      $num_All_auteur = count($All_auteur) ;



        $DAO_model_wikis = new DAO_model_wikis() ; 
      $Troi_wikis =  $DAO_model_wikis->TroiLastWikis();

        $model_Categories = new model_Categories() ; 
      $Last_Troi_Categories =  $model_Categories->Last_Troi_Categories();


    //     echo "<pre>";
    //   print_r( $Troi_wikis);
    //   echo "</pre>";

        include "View\View_front\Home.php" ; 

    }




}