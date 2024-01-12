<?php

include "Model\Dashboard_Admin\Class_Dashboard\Class_Categories.php";

class model_Categories extends Database {



    public function getAllCategories(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  categories" );
        $consulta->execute();
        $result = $consulta->fetchAll();

        $Categories = array(); 
        foreach ($result as $B) {
            $Categories[] = new Categories($B["name"],$B["Bio"],$B["created_at"]);
        }
        return $Categories;
       

    }

    public function Last_Troi_Categories(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  categories order by created_at DESC LIMIT 3" );
        $consulta->execute();
        $result = $consulta->fetchAll();

        $Categories = array(); 
        foreach ($result as $B) {
            $Categories[] = new Categories($B["name"],$B["Bio"],$B["created_at"]);
        }
        return $Categories;
       

    }

    
    public function getByNameCategories($name){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM categories  WHERE name = :name");
        $consulta->execute(array(
            "name" => $name
        ));
       
        $result = $consulta->fetch();

        if (empty($result)) {
            return false;

        }else {
              
        $Categories = array(); 
       
        $Categories[] = new Categories($result["name"],$result["Bio"],$result["created_at"]);
  
        return $Categories;
        }

     
       
    }
    

    
    public function deleteByNameCategories($name){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM categories WHERE name = :name");
            $consulta->execute(array(
                "name" => $name
            ));
           
        } catch (Exception $e) {
            echo 'fild (deleteByname): ' . $e->getMessage();
            return -1;
        }
    }
    



    public function InsertCategories($name, $Bio){ 

        $data =$this->getByNameCategories($name);


        if ($data === false) {

        // Prepare the SQL statement with placeholders
        $consulta = $this->getConnection()->prepare("INSERT INTO categories (`name`, `Bio`)
                                                    VALUES (:name, :Bio)");
    
        // Bind parameters to the prepared statement
        $consulta->bindParam(':name', $name);
        $consulta->bindParam(':Bio', $Bio);
      

        // Execute the query
        $consulta->execute();   
     }else {
           return false ;
        }
    
    }
    

    public function UpdateCategories($idname,$name, $Bio) {
            $sql = "UPDATE `categories` SET `name`='$name',`Bio`='$Bio' WHERE name = '$idname';";
            echo "<br>".$sql."<br>";
            $consulta = $this->getConnection()->prepare($sql);
    
            $result = $consulta->execute();
    
     
    }
    




}


