<?php
if (isset( $_SESSION["Admin"])) { ?>



<?php  ob_start(); 
$title = "Dashboard" ; 
$Dashboard = "Dashboard" ; 
?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
         
                    <div class="col-sm-6 col-xl-5">
                        <div class="bg-secondary mb-4 rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Wikis</p>
                            </div>
                            <h6 class="mb-0"><?= $Num_All_wikis?></h6>

                        </div>
                
                        <div class="bg-secondary mb-4 rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Categories</p>
                            </div>
                            <h6 class="mb-0"><?= $Num_AllCategories?></h6>

                        </div>
                
                        <div class="bg-secondary mb-4 rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                   <p class="mb-2">Tags</p>
                            </div>
                            <h6 class="mb-0"><?= $Num_AllTags?></h6>

                        </div>
                   
                        <div class="bg-secondary mb-4  rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Auteur</p>
                            </div>
                            <h6 class="mb-0"><?= $Num_All_auteur?></h6>

                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 ">
                        </div>
                    <div class="col-sm-6 col-xl-5 ">
                        <div class="h-100 bg-secondary rounded p-4 overflow-auto " style="max-height: 470px;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-3">Notification</h6>
                            </div>

                            <?php foreach ($All_wikis as  $value) {   ?>
                              
                           <?php      
                           
                           
                           
                           
                           $date_wiki = $this->dateDifference( $value["created_at"]) ;
                           
 ?>

                        <a class="icon-link icon-link-hover"  href="index.php?action=moredetails&id_wiki=<?= $value["id_wiki"] ?>">
                        <div class="d-flex align-items-center border-bottom py-1">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3 text-truncate">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?= $value["name"] ?></h6>
                                        <small class=" text-light  "><?= $date_wiki ?></small>
                                    </div>
                                    <span class=" text-light  "><?= $value["title"] ?></span>
                                </div>
                            </div>
                        </a><hr>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


       


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Auteur</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Date</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                 
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($All_auteur as $value) {    ?>
                                  
                              
                                <tr>
                                    <td><?= $value->getCreatedAt() ?></td>
                                    <td><?= $value->getName() ?></td>
                                    <td><?= $value->getEmail() ?></td>
                                  
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                          <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->



     

    
    <?php $contant =  ob_get_clean();
    include_once "View\layout_Admin.php" ; 

}else {
    header("Location: index.php?action=form_login");

}