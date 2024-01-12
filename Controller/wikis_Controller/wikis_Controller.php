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
   
     function sanitizeInput($input) {
        // Remove HTML and script tags
        $cleanedInput = strip_tags($input);
    
        // Remove leading and trailing whitespaces
        $cleanedInput = trim($cleanedInput);
    
        // Convert special characters to HTML entities
        $sanitizedInput = htmlspecialchars($cleanedInput, ENT_QUOTES, 'UTF-8');
    
        return $sanitizedInput;
    }
    

     if (isset($_POST['submit']) && !empty($_POST["Title"])&& !empty($_POST["Contenu"])&& !empty($_POST["Categories"])&& !empty($_POST["tags"])) {
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

        $model_wiki = new Wikis(null, sanitizeInput($Title) ,  sanitizeInput($Contenu)  , $uploadedFile, $Categories,null,$_SESSION["auteur_id"],1);

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
        function sanitizeInput1($input) {
            // Remove HTML and script tags
            $cleanedInput = strip_tags($input);
        
            // Remove leading and trailing whitespaces
            $cleanedInput = trim($cleanedInput);
        
            // Convert special characters to HTML entities
            $sanitizedInput = htmlspecialchars($cleanedInput, ENT_QUOTES, 'UTF-8');
        
            return $sanitizedInput;
        }
        

        if (isset($_POST['submit']) && !empty($Title) && isset($_POST["Contenu"])&& isset($_POST["Categories"])&& isset($_POST["tags"])) {
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
     
      } 

      $DAO_model_wikis = new DAO_model_wikis() ; 

      $wiki =   $DAO_model_wikis->getAllwikisByID($id_wiki); 

      if ($wiki[0]["is_Active"] === 0) {
        $model_wiki = new Wikis($id_wiki,sanitizeInput1($Title) , sanitizeInput1($Contenu) ,$uploadedFile,$Categories,null,$_SESSION["auteur_id"],0);

      }else {
        $model_wiki = new Wikis($id_wiki,sanitizeInput1($Title) , sanitizeInput1($Contenu) ,$uploadedFile,$Categories,null,$_SESSION["auteur_id"],1);

      }




    //    print_r($model_wiki);

     $DAO_model_wikis->Updatewikis($model_wiki,$tags);
       
 
          header("Location: index.php?action=moredetails&id_wiki=$id_wiki");

      
  }else {
      header("Location: index.php?action=update_form_wikis&id_wiki=$id_wiki&error=all input is required");
  }

    }


    function all_wikis()  {

        $DAO_model_wikis = new DAO_model_wikis() ; 
        $All_wikis =  $DAO_model_wikis->getAllwikis();

        include "View\Vew_Admin\Wikis\wiki.php";
        
    }

}