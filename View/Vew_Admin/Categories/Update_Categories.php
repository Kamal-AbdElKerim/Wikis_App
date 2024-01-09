<?php
if (isset( $_SESSION["Admin"])) { ?>

<?php 


ob_start(); 
$title = "Categories" ; 
$Categories = "Categories" ; 
?>

            <div class="container-fluid pt-4 px-4">
                <form action="index.php?action=submitUpdateCategories" method="post">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Update Categories</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name" value="<?=  (isset($_GET["name"])) ? $_GET["name"] : $Categorie[0]->getName() ; ?>"
                            placeholder="Categories...">
                        <label for="floatingInput">Categories...</label>
                    </div>
                    <div class="form-floating mb-3" style="display: none;">
                        <input type="text" class="form-control" id="floatingInput" name="nameid" value="<?=  $Categorie[0]->getName() ?>"
                            placeholder="Categories...">
                        <label for="floatingInput">Categories...</label>
                    </div>
                 
                
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a Bio here" name="Bio" 
                            id="floatingTextarea" style="height: 150px;"><?=  (isset($_GET["Bio"])) ? $_GET["Bio"] : $Categorie[0]->getBio() ; ?></textarea>
                        <label for="floatingTextarea">Leave a Bio here</label>
                    </div>
                    <?php if (isset($_GET["error"])) {     $error = $_GET["error"] ;   ?>
                        <div class="alert alert-danger" role="alert">
                        <?=  $error ?>
                        </div>
                 <?php } ?>
                    <div class="orm-floating mt-4"> 
                        <button name="submit" type="submit" class="btn btn-outline-info m-2">Update Categories</button>

    
                    </div>

                </div>
                </form>
            </div>



      


     


    <?php $contant =  ob_get_clean();
    include_once "View\layout_Admin.php" ; 


}else {
    header("Location: index.php?action=form_login");

}