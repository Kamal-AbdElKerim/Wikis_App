<?php

include "Model\Auth_model\Class_Auth\class_auth_admin.php";

class model_admin extends Database {



    public function getAlladmin(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  admin" );
        $consulta->execute();
        $result = $consulta->fetchAll();

        $admin = array(); 
        foreach ($result as $B) {
            $admin[] = new admin($B["admin_id"],$B["email"],$B["password"],$B["created_at"]);
        }
        return $admin;
       

    }

    
    public function getByadmin_id($admin_id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM admin  WHERE admin_id = :admin_id");
        $consulta->execute(array(
            "admin_id" => $admin_id
        ));
       
        $result = $consulta->fetch();

        
        $admin = array(); 
       
        $admin[] = new admin($result["admin_id"],$result["email"],$result["password"],$result["created_at"]);
  
        return $admin;
       
    }
    
    public function getadmin($email , $password){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM admin  WHERE email = :email AND password = :password");
        $consulta->execute(array(
            "email" => $email,
            "password" => $password
        ));
       
        $result = $consulta->fetch();

        if ($result) {
            return true ;
        }else {
            return false ;
        }
     
       
    }
    

    
    public function deleteByadmin_idadmin($admin_id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM admin WHERE admin_id = :admin_id");
            $consulta->execute(array(
                "admin_id" => $admin_id
            ));
           
        } catch (Exception $e) {
            echo 'fild (deleteByadmin_id): ' . $e->getMessage();
            return -1;
        }
    }
    



    public function Insertadmin($admin_id, $Bio){ 
        // Prepare the SQL statement with placeholders
        $consulta = $this->getConnection()->prepare("INSERT INTO admin (`admin_id`, `Bio`)
                                                    VALUES (:admin_id, :Bio)");
    
        // Bind parameters to the prepared statement
        $consulta->bindParam(':admin_id', $admin_id);
        $consulta->bindParam(':Bio', $Bio);
      
    
        // Execute the query
        $consulta->execute();
    
    }
    

    public function Updateadmin($idadmin_id,$admin_id, $Bio) {
      
            $consulta = $this->getConnection()->prepare("UPDATE `admin` SET `admin_id`='$admin_id',`Bio`='$Bio' WHERE admin_id = '$idadmin_id' 
              
            ");
    
            $result = $consulta->execute();
    
     
    }
    




}


