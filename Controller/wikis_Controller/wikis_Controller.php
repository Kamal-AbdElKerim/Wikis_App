<?php

include "Model\Front\DAO_Front\DAO_wikis.php";

class wikis_Controller {

  

    public function moredetails_wiki(){

        $model_wikis = new model_wikis() ; 
         
      $allwiki =   $model_wikis->getAllwikisByID($_GET["id_wiki"]);

    //   echo "<pre>";
    //   print_r($allwiki);
    //   echo "</pre>";

   
       
         include "View\View_front\more_details.php" ; 

    }


    function add_wiki()  {
     extract($_POST) ;
   
    //  print_r($_FILES['image']);

     if (isset($_POST['submit'])) {
        // Check if file was uploaded without errors
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public' . DIRECTORY_SEPARATOR . 'img_wikis' . DIRECTORY_SEPARATOR;
            $uploadedFile = $uploadDir . basename($_FILES['image']['name']);
    
            // Move uploaded file to the specified directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
                echo "Image uploaded successfully.";
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Error: Please select an image to upload.";
        }
    }

     $model_wikis = new model_wikis() ; 

     $model_wikis->Insertwikis($Title, $Contenu,$uploadedFile, $Categories, $_SESSION["auteur_id"] , $tags);
      
     header("Location: index.php");
       

    }


    function deleteWikiByid()  {
        
        $id_wiki = $_GET['id_wiki'];
        $model_wikis = new model_wikis() ; 

             $model_wikis->deleteByid_wiki($id_wiki); 
         
             header("Location: index.php");
    }

    function update_form_wikis()  {

        $id_wiki = $_GET['id_wiki'];

        $model_Categories = new model_Categories() ; 
        $AllCategories =   $model_Categories->getAllCategories() ; 

        $model_Tags = new model_Tags() ; 
        $AllTags =   $model_Tags->getAllTags() ; 
        
        $model_wikis = new model_wikis() ; 

      $wiki =   $model_wikis->getAllwikisByID($id_wiki); 

     echo "<pre>";
     print_r($wiki) ;
     echo "</pre>";
         
           include "View\View_front\wiki_update.php";
    }

}