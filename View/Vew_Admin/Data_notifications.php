<?php


include "../../Model/conn.php";
include "../../Model/Dashboard_Admin/model_Dashbored.php";




$model_Dashbored = new model_Dashbored() ; 
$All_wikis =  $model_Dashbored->getAllwikis();


echo json_encode($All_wikis) ;