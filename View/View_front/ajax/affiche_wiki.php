<?php

include "../../../Model/conn.php" ;

class model_wikis extends Database {



    public function getAllwikis(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM wikis w , auteur a WHERE w.auteur_id= a.auteur_id ORDER BY w.created_at DESC" );
        $consulta->execute();
        $result = $consulta->fetchAll();

     
        return $result;
       

    }

}

$model_wikis = new model_wikis ;
$wikis = $model_wikis->getAllwikis() ; 


echo json_encode($wikis);


