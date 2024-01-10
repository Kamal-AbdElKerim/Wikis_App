<?php


include "Model\Front\Class_Front\Class_auteur.php";

class model_auteur extends Database {



    public function getAllauteur(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  auteur" );
        $consulta->execute();
        $result = $consulta->fetchAll();

        $auteur = array(); 
        foreach ($result as $B) {
            $auteur[] = new auteur($B["auteur_id"],$B["email"],$B["auteur_id"],$B["password"],$B["created_at"]);
        }
        return $auteur;
       

    }

    public function getAllauteur_profile($auteur_id){

        $consulta = $this->getConnection()->prepare("SELECT * FROM auteur a JOIN wikis w ON a.auteur_id = w.auteur_id AND a.auteur_id = $auteur_id ORDER BY w.created_at DESC" );
        $consulta->execute();
        $result = $consulta->fetchAll();

     
        return $result;
       

    }

    
    public function getByauteur_idauteur($auteur_id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM auteur  WHERE auteur_id = :auteur_id");
        $consulta->execute(array(
            "auteur_id" => $auteur_id
        ));
       
        $result = $consulta->fetch();

        
        $auteur = array(); 
       
        $auteur[] = new auteur($result["auteur_id"],$result["email"],$result["auteur_id"],$result["password"],$result["created_at"]);
  
        return $auteur;
       
    }
    public function getByemailauteur($email){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM auteur  WHERE email = :email");
        $consulta->execute(array(
            "email" => $email
        ));
       
        $result = $consulta->fetch();

        
       
       
  
        return $result;
       
    }
    public function getauteur($email , $password){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM auteur  WHERE email = :email AND password = :password");
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
    

    
    public function deleteByauteur_idauteur($auteur_id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM auteur WHERE auteur_id = :auteur_id");
            $consulta->execute(array(
                "auteur_id" => $auteur_id
            ));
           
        } catch (Exception $e) {
            echo 'fild (deleteByauteur_id): ' . $e->getMessage();
            return -1;
        }
    }
    

    public function Insertauteur($email, $name, $password) { 
        // Prepare the SQL statement with placeholders
        $consulta = $this->getConnection()->prepare("INSERT INTO auteur (`email`, `name`, `password`)
                                                    VALUES (:email, :name, :password)");
    
        // Bind parameters to the prepared statement
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':name', $name);
        $consulta->bindParam(':password', $password);
    
        // Execute the query
        $result = $consulta->execute();
    
        return $result; // Return the execution result or handle it as needed
    }
    

    public function Updateauteur($auteur_id, $email, $name, $password, $created_at) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE auteur 
                SET 
                email = :email,
                name = :name,
                password = :password,
                created_at = :created_at
                WHERE auteur_id = :auteur_id 
            ");
    
            $result = $consulta->execute(array(
                ":email" => $email,
                ":name" => $name,
                ":password" => $password,
                ":created_at" => $created_at,
                ":auteur_id" => $auteur_id
            ));
    
            return $result;
            
        } catch (PDOException $e) {
            // Handle exceptions or errors here
            return false;
        }
    }
    
    




}


