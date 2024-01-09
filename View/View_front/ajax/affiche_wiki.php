<?php

include "../../../Model/conn.php" ;

class DAO_model_wikis extends Database {



    public function getAllwikis(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM wikis w , auteur a WHERE w.auteur_id= a.auteur_id ORDER BY w.created_at DESC" );
        $consulta->execute();
        $result = $consulta->fetchAll();

     
        return $result;
       

    }

}

$DAO_model_wikis = new DAO_model_wikis ;
$wikis = $DAO_model_wikis->getAllwikis() ; 


echo json_encode($wikis);


