<?php 

include "../../../../Model/conn.php" ;

$co = new Database ;

$conn = $co->getConnection();



$id = $_GET["id"] ;

 $stmt = $conn->prepare("SELECT * FROM `wikis` WHERE id_wiki = ?");
 $stmt->execute([$id]);
 $categorieData = $stmt->fetch(PDO::FETCH_ASSOC);

 if ($categorieData) {
     if ($categorieData["is_Active"] === 1) {
         // Update the 'deleted_at' field with the current timestamp
         $stmt = $conn->prepare("UPDATE `wikis` SET `is_Active` = ? WHERE id_wiki = ?");
         $stmt->execute([0, $id]);

     
     } else {
         // Set the 'deleted_at' field to NULL 
         $stmt = $conn->prepare("UPDATE `wikis` SET `is_Active` = 1 WHERE id_wiki = ?");
         $stmt->execute([$id]);
        
         
     }
 }

