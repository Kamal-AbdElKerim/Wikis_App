<?php

class model_Dashbored extends Database {

    public function getAllwikis(){

        $consulta = $this->getConnection()->prepare("SELECT w.id_wiki ,w.title ,w.created_at , a.name FROM wikis w , auteur a  WHERE  w.auteur_id = a.auteur_id order by w.created_at DESC
        " );
        $consulta->execute();
        $result = $consulta->fetchAll();

     
        return $result;
       

    }
}