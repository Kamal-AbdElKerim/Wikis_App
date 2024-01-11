<?php

class model_Dashbored extends Database {

    public function getAllwikis(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM wikis w , auteur a  WHERE  w.auteur_id = a.auteur_id order by w.created_at asc ;
        " );
        $consulta->execute();
        $result = $consulta->fetchAll();

     
        return $result;
       

    }
}