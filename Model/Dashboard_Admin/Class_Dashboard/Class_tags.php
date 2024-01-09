<?php 

class Tags {
   
    private $tag_id;
    private $tag_name;

    public function __construct($tag_id , $tag_name ) {
        $this->tag_name = $tag_name;
        $this->tag_id = $tag_id;
       
    }

    // Getter methods
 
    public function getTag_name()  {
        return $this->tag_name;
    }
    public function gettag_id()  {
        return $this->tag_id;
    }

}
