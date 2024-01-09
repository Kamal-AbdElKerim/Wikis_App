<?php
if (isset( $_SESSION["Admin"])) { ?>

<?php 


ob_start(); 
$title = "Tags" ; 
$Tags = "Tags" ; 
?>


         
            <div class="container-fluid pt-4 px-4">
            <form action="index.php?action=submitUpdateTags" method="post">

                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Update Tags</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="tag_name" value="<?=  (isset($_GET["tag_name"])) ? $_GET["tag_name"] : $Tag[0]->getTag_name() ; ?>"
                            placeholder="name@example.com">
                        <label for="floatingInput">Tag</label>
                    </div>
                    <div class="form-floating mb-3" style="display: none;">
                        <input type="text" class="form-control" id="floatingInput" name="tag_id" value="<?= $Tag[0]->gettag_id() ?>"
                            placeholder="name@example.com">
                        <label for="floatingInput">Tag</label>
                    </div>
                    <?php if (isset($_GET["error"])) {     $error = $_GET["error"] ;   ?>
                        <div class="alert alert-danger" role="alert">
                        <?=  $error ?>
                        </div>
                 <?php } ?>
                 
                    <div class="orm-floating mt-4"> 
                        <button name="submit" type="submit" class="btn btn-outline-info m-2">Update Tag</button>

    
                    </div>

                </div>
            </form>
                
            </div>


     <?php $contant =  ob_get_clean();
    include_once "View\layout_Admin.php" ; 


}else {
    header("Location: index.php?action=form_login");

}