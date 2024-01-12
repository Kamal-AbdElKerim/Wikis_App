<?php

include "Model\Dashboard_Admin\Class_Dashboard\Class_tags.php";

class model_Tags extends Database {



    public function getAllTags(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  tags" );
        $consulta->execute();
        $result = $consulta->fetchAll();

        $Tags = array(); 
        foreach ($result as $B) {
            $Tags[] = new Tags($B["tag_id"],$B["tag_name"]);
        }
        return $Tags;
       

    }

    
    public function getBytag_idTags($tag_id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM tags  WHERE tag_id = :tag_id");
        $consulta->execute(array(
            "tag_id" => $tag_id
        ));
       
        $result = $consulta->fetch();

        
        $Tags = array(); 
       
        $Tags[] = new Tags($result["tag_id"],$result["tag_name"]);
  
        return $Tags;
       
    }

    public function getBytag_WikiTags($tag_name){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM tags  WHERE tag_name = :tag_name");
        $consulta->execute(array(
            "tag_name" => $tag_name
        ));
       
        $result = $consulta->fetch();

        if (empty($result)) {
            return false;

        }else {

        
        $Tags = array(); 
       
        $Tags[] = new Tags($result["tag_id"],$result["tag_name"]);
  
        return $Tags; }
       
    }
    

    
    public function deleteBytag_idTags($tag_id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM Tags WHERE tag_id = :tag_id");
            $consulta->execute(array(
                "tag_id" => $tag_id
            ));
           
        } catch (Exception $e) {
            echo 'fild (deleteBytag_id): ' . $e->getMessage();
            return -1;
        }
    }
    



    public function InsertTags( $tag_name){ 
       
        $data =$this->getBytag_WikiTags($tag_name);

        if ($data === false) {

        $consulta = $this->getConnection()->prepare("INSERT INTO Tags ( `tag_name`)
                                                    VALUES ( :tag_name)");
    
        // Bind parameters to the prepared statement
        $consulta->bindParam(':tag_name', $tag_name);
      
    
        // Execute the query
        $result = $consulta->execute();

    }else {
        return false ;
     }
    
    }
    

    public function UpdateTags($tag_id, $tag_name) {
        try {
            $consulta = $this->getConnection()->prepare("UPDATE `tags` SET `tag_name`='$tag_name' WHERE tag_id = '$tag_id'
             
            ");
    
            $result = $consulta->execute();
    
            return $result;
            
        } catch (PDOException $e) {
         
            return false;
        }
    }
    




}


