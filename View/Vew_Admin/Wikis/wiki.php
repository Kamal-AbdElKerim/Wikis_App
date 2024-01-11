<?php
if (isset( $_SESSION["Admin"])) { ?>

<?php 



ob_start(); 
$title = "wiki" ; 
$wiki = "wiki" ; 
?>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">List wiki</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                <th scope="col" class=" col-lg-2 ">img</th>

                                    <th scope="col" class=" col-lg-2 ">title</th>
                                    <th scope="col" class=" col-lg-12 ">contenu</th>
                                    <th scope="col" class=" col-lg-1 ">catg_name</th>
                                    <th scope="col" class=" col-lg-2 ">action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php foreach ($All_wikis as $value) {     ?>
                                   
                             
                                   <tr>
                                   <td><img src="<?= $value->getImg() ?>" alt=" " width="150px" height="150px"></td>
                                       <td><?= $value->getTitle() ?></td>
                                       <td><?= $value->getContenu() ?></td>
                                    
                                       <td><?= $value->getCatgName() ?></td>
                                       <td >
                                       <button onclick="NoneRequest(<?= $value->getId_wiki() ?>, this)" class="btn btn-<?php if ($value->getIs_Active() === 0) {
                                            echo "primary" ;
                                            }else {
                                            echo "danger" ;
                                            } ?> mb-2 ms-2" type="button" ><div id="result_<?= $value->getId_wiki() ?>"><?php if ($value->getIs_Active() === 1) {
                                            echo "None" ;
                                            }else {
                                            echo "Block" ;
                                            } ?></div></button>   
                                           </td>
                                   </tr>
   
                                   <?php } ?>
                            </tbody>
                          
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


      


      

<script src="View\Vew_Admin\Wikis\ajax_wikis\wikis_ajax.js"></script>
     
     <?php $contant =  ob_get_clean();
    include_once "View\layout_Admin.php" ; 


}else {
    header("Location: index.php?action=form_login");

}