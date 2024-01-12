<?php

include "../../../Model/conn.php";

class DAO_model_wikis extends Database {
    public function getAllwikis(){
        if (isset($_GET["keyword"]) ) {
            $keyword = $_GET["keyword"];
            $consulta = $this->getConnection()->prepare("SELECT w.id_wiki ,w.title ,w.contenu ,w.img ,w.catg_name , w.created_at , a.name,t.tag_name ,a.auteur_id
            FROM wikis w
            JOIN auteur a ON w.auteur_id = a.auteur_id AND w.is_Active = 1
            LEFT JOIN (
                SELECT wt.wiki_id, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tag_name
                FROM wiki_tags wt
                JOIN tags t ON t.tag_id = wt.tag_id
                GROUP BY wt.wiki_id
            ) t ON w.id_wiki = t.wiki_id
            WHERE w.title LIKE CONCAT('%', :keyword, '%') 
                OR w.catg_name LIKE CONCAT('%', :keyword, '%')
                OR t.tag_name LIKE CONCAT('%', :keyword, '%')
            ORDER BY w.created_at DESC;
            ");

            $consulta->bindParam(':keyword', $keyword); 

            $consulta->execute();
            $result = $consulta->fetchAll();
        } else {
            $consulta = $this->getConnection()->prepare("SELECT w.id_wiki ,w.title ,w.contenu ,w.img ,w.catg_name , w.created_at , a.name ,a.auteur_id FROM wikis w 
            JOIN auteur a ON w.auteur_id = a.auteur_id 
            ORDER BY w.created_at DESC");
            $consulta->execute();
            $result = $consulta->fetchAll();
        }
        
        return $result;
    }
}

$DAO_model_wikis = new DAO_model_wikis;
$wikis = $DAO_model_wikis->getAllwikis();

echo json_encode($wikis);
