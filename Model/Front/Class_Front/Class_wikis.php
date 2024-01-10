<?php 

class Wikis {
    private $id_wiki;
    private $title;
    private $contenu;
    private $img;
    private $catg_name;
    private $created_at;
    private $auteur_id;

    public function __construct($id_wiki, $title, $contenu,  $img,$catg_name, $created_at, $auteur_id) {
        $this->id_wiki = $id_wiki;
        $this->title = $title;
        $this->contenu = $contenu;
        $this->img = $img;
        $this->catg_name = $catg_name;
        $this->created_at = $created_at;
        $this->auteur_id = $auteur_id;
    }

    // Getter methods for properties
    public function getId_wiki() {
        return $this->id_wiki;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContenu() {
        return $this->contenu;
    }

      public function getImg()
    {
        return $this->img;
    }

    public function getCatgName() {
        return $this->catg_name;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getWikiId() {
        return $this->auteur_id;
    }



  
}

