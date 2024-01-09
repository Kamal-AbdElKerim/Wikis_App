<?php 

class admin {
   
    private $admin_id;
    private $email;
    private $password;
    private $created_at;

    public function __construct($admin_id, $email, $password, $created_at) {
        $this->admin_id = $admin_id;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
    }

    // Getter methods
    public function getAdminId() {
        return $this->admin_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
}

