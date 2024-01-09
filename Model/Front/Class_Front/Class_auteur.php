<?php 

class auteur {
    private $auteur_id;
    private $email;
    private $name;
    private $password;
    private $created_at;

    public function __construct($auteur_id, $email, $name, $password, $created_at) {
        $this->auteur_id = $auteur_id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->created_at = $created_at;
    }

    // Getter methods for properties
    public function getAuteurId() {
        return $this->auteur_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }


}

