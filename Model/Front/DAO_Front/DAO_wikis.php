<?php

include "Model\Front\Class_Front\Class_wikis.php" ;

class model_wikis extends Database {



    public function getAllwikis(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  wikis" );
        $consulta->execute();
        $result = $consulta->fetchAll();

        $wikis = array(); 
        foreach ($result as $B) {
            $wikis[] = new wikis($B["id_wiki"],$B["title"],$B["contenu"],$B["img"],$B["catg_name"],$B["created_at"],$B["auteur_id"]);
        }
        return $wikis;
       

    }

   

    
    public function getByid_wiki($id_wiki){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM wikis  WHERE id_wiki = :id_wiki");
        $consulta->execute(array(
            "id_wiki" => $id_wiki
        ));
       
        $result = $consulta->fetch();

        
        $wikis = array(); 
       
        $wikis[] = new wikis($result["id_wiki"],$result["title"],$result["contenu"],$result["img"],$result["catg_name"],$result["created_at"],$result["auteur_id"]);
  
        return $wikis;
       
    }
    

    
    public function deleteByid_wiki($id_wiki){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM wikis WHERE id_wiki = :id_wiki");
            $consulta->execute(array(
                "id_wiki" => $id_wiki
            ));
           
        } catch (Exception $e) {
            echo 'fild (deleteBywikis_id): ' . $e->getMessage();
            return -1;
        }
    }
    public function lastInsertId(){

        $consulta = $this->getConnection()->prepare("SELECT id_wiki FROM  wikis order by created_at DESC LIMIT 1" );
        $consulta->execute();
        $result = $consulta->fetch();

    
        return $result;
       

    }
    public function TroiLastWikis(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  wikis order by created_at DESC LIMIT 3" );
        $consulta->execute();
        $result = $consulta->fetchAll();

    
        $wikis = array(); 
        foreach ($result as $B) {
            $wikis[] = new wikis($B["id_wiki"],$B["title"],$B["contenu"],$B["img"],$B["catg_name"],$B["created_at"],$B["auteur_id"]);
        }
        return $wikis;
       

    }

    public function getAllwikisByID($id_wiki){

        $consulta = $this->getConnection()->prepare("SELECT * FROM wikis w , auteur a , wiki_tags wt , tags t WHERE w.id_wiki = $id_wiki AND w.auteur_id = a.auteur_id AND w.id_wiki = wt.wiki_id AND t.tag_id = wt.tag_id;
        " );
        $consulta->execute();
        $result = $consulta->fetchAll();

     
        return $result;
       

    }
    
    public function Insertwikis($title, $contenu,$img , $catg_name, $auteur_id, $tags) { 
       
        $consulta = $this->getConnection()->prepare("INSERT INTO wikis (`title`, `contenu`,`img`, `catg_name`, `auteur_id`)
                                                    VALUES (:title, :contenu,:img, :catg_name, :auteur_id)");
        
        $consulta->bindParam(':title', $title);
        $consulta->bindParam(':contenu', $contenu);
        $consulta->bindParam(':img', $img);
        $consulta->bindParam(':catg_name', $catg_name);
        $consulta->bindParam(':auteur_id', $auteur_id);
        $result = $consulta->execute();
    
        // Get the ID of the last inserted wiki
        $lastWikiId = $this->lastInsertId();


        foreach ($tags as $tag_id) {
            $consulta = $this->getConnection()->prepare("INSERT INTO wiki_tags (`wiki_id`, `tag_id`)
                                                        VALUES (:wiki_id, :tag_id)");
        
            $consulta->bindParam(':wiki_id', $lastWikiId['id_wiki']);
            $consulta->bindParam(':tag_id', $tag_id);
            $result = $consulta->execute();
        }

        
    }
    
  

    public function Updatewikis($id_wiki, $title, $contenu, $catg_name, $auteur_id) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE wikis 
                SET 
                title = :title,
                contenu = :contenu,
                catg_name = :catg_name,
                auteur_id = :auteur_id
                WHERE id_wiki = :id_wiki 
            ");
    
            $result = $consulta->execute(array(
                ":title" => $title,
                ":contenu" => $contenu,
                ":catg_name" => $catg_name,
                ":auteur_id" => $auteur_id,
                ":id_wiki" => $id_wiki
            ));
    
            return $result;
            
        } catch (PDOException $e) {
            return false;
        }
    }
    
    




}


