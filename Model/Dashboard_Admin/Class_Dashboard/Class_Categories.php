<?php 

class Categories {
   
    private $name;
    private $Bio;
    private $created_at;
  

    public function __construct($name , $Bio ,$created_at) {
        $this->name = $name;
        $this->Bio = $Bio;
        $this->created_at = $created_at;
       
    }

    // Getter methods
 
    public function getName()  {
        return $this->name;
    }
    public function getBio()  {
        return $this->Bio;
    }


    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }
}
