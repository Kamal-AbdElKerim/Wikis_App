<?php

include "Model\Front\DAO_Front\DAO_wikis.php";

class wikis_Controller {

  

    public function moredetails_wiki(){

        $DAO_model_wikis = new DAO_model_wikis() ; 
        $allwiki =   $DAO_model_wikis->getAllwikisByID($_GET["id_wiki"]);

    //   echo "<pre>";
    //   print_r($allwiki);
    //   echo "</pre>";

   
       
         include "View\View_front\more_details.php" ; 

    }


    function add_wiki()  {
     extract($_POST) ;
   
    //  print_r($_FILES['image']);

     if (isset($_POST['submit']) && isset($_POST["Title"])&& isset($_POST["Contenu"])&& isset($_POST["Categories"])&& isset($_POST["tags"])) {
              // Function to generate a unique filename
              function generateUniqueFilename( $filename) {
                $timestamp = time(); // Get current timestamp
                $randomString = bin2hex(random_bytes(8)); // Generate a random string
                
                // Get the file extension
                $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
                
                // Combine timestamp, random string, and original file extension to create a unique filename
                $uniqueFilename = $timestamp . '_' . $randomString . '.' . $fileExtension;
                
                return $uniqueFilename;
            }
        // Check if file was uploaded without errors
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'public' . DIRECTORY_SEPARATOR . 'img_wikis' . DIRECTORY_SEPARATOR;
            $originalFileName = $_FILES['image']['name'];
            
            // Generate a unique filename
            $uniqueFilename = generateUniqueFilename( $originalFileName);
            $uploadedFile = $uploadDir . $uniqueFilename; // Define $uploadedFile here

            
            // Move uploaded file to the specified directory with the unique filename
            if (move_uploaded_file($_FILES['image']['tmp_name'],  $uploadedFile)) {
                echo "Image uploaded successfully.";
            } else {
                echo "Error uploading image.";
            }
        }else {
            $uploadedFile = "public\img\img defaut.jpg";
        }
        
  
        $DAO_model_wikis = new DAO_model_wikis() ; 

        $model_wiki = new Wikis(null,$Title , $Contenu ,$uploadedFile,$Categories,null,$_SESSION["auteur_id"]);

         print_r($model_wiki);

       $DAO_model_wikis->Insertwikis($model_wiki,$tags);
         
         header("Location: index.php");
        
    }else {
        header("Location: index.php?error=all input is required");
    }

       

    }


    function deleteWikiByid()  {
        
        $id_wiki = $_GET['id_wiki'];
        $DAO_model_wikis = new DAO_model_wikis() ; 

             $DAO_model_wikis->deleteByid_wiki($id_wiki); 
         
             header("Location: index.php");
    }

    function update_form_wikis()  {

        $id_wiki = $_GET['id_wiki'];

        $model_Categories = new model_Categories() ; 
        $AllCategories =   $model_Categories->getAllCategories() ; 

        $model_Tags = new model_Tags() ; 
        $AllTags =   $model_Tags->getAllTags() ; 
        
        $DAO_model_wikis = new DAO_model_wikis() ; 

      $wiki =   $DAO_model_wikis->getAllwikisByID($id_wiki); 

    //  echo "<pre>";
    //  print_r($wiki) ;
    //  echo "</pre>";
         
           include "View\View_front\wiki_update.php";
    }

    function update_Wikis()  {
        extract($_POST) ;
        // print_r($_POST);
       

        if (isset($_POST['submit']) && isset($_POST["Title"])&& isset($_POST["Contenu"])&& isset($_POST["Categories"])&& isset($_POST["tags"])) {
            // Function to generate a unique filename
            function generateUniqueFilename( $filename) {
              $timestamp = time(); // Get current timestamp
              $randomString = bin2hex(random_bytes(8)); // Generate a random string
              
              // Get the file extension
              $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
              
              // Combine timestamp, random string, and original file extension to create a unique filename
              $uniqueFilename = $timestamp . '_' . $randomString . '.' . $fileExtension;
              
              return $uniqueFilename;
          }
      // Check if file was uploaded without errors
   
        
    
      if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
          $uploadDir = 'public' . DIRECTORY_SEPARATOR . 'img_wikis' . DIRECTORY_SEPARATOR;
          $originalFileName = $_FILES['image']['name'];
          
          // Generate a unique filename
          $uniqueFilename = generateUniqueFilename( $originalFileName);
          $uploadedFile = $uploadDir . $uniqueFilename; // Define $uploadedFile here

          
          // Move uploaded file to the specified directory with the unique filename
          if (move_uploaded_file($_FILES['image']['tmp_name'],  $uploadedFile)) {
              echo "Image uploaded successfully.";
          } else {
              echo "Error uploading image.";
          }  
      }
      else {
         
        $DAO_model_wikis = new DAO_model_wikis() ; 
         
        $allwiki =   $DAO_model_wikis->getAllwikisByID($id_wiki);

        $uploadedFile = $allwiki[0]['img'];
     
        // print_r($uploadedFile);
        // echo "<pre>";
        // print_r($allwiki);
        // echo "</pre>";
      } 

      $DAO_model_wikis = new DAO_model_wikis() ; 

      $model_wiki = new Wikis($id_wiki,$Title , $Contenu ,$uploadedFile,$Categories,null,$_SESSION["auteur_id"]);

    //    print_r($model_wiki);

     $DAO_model_wikis->Updatewikis($model_wiki,$tags);
       
 
          header("Location: index.php?action=moredetails&id_wiki=$id_wiki");

      
  }else {
      header("Location: index.php?action=update_form_wikis&id_wiki=$id_wiki&error=all input is required");
  }

     

        
    }

}