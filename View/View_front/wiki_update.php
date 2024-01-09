<?php  ob_start(); 
$title = "update wiki" ; 
?>



<div class="container pt-4 ">
                <div class="row bg-secondary rounded   mx-0">
                    <h1 class="text-start  pt-5 ps-5 ">Add wiki</h1>

                    <?php if (isset($_SESSION["auteur"])) {    ?>
                     
                <form action="index.php?action=addWikis" method="post" enctype="multipart/form-data">
                 <div class="m-5 row">
                    <div class="form-floating mb-4 col-11">
                        <input type="text" class="form-control" id="floatingInput" value="<?=  $allwiki[0]["title"] ?>"
                            placeholder="Title" name="Title">
                        <label for="floatingInput" class="ms-3">Title</label>
                    </div>
                    <div class="form-floating mb-4 col-11">
                        <textarea name="Contenu" class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;"><?=  $allwiki[0]["Contenu"] ?></textarea>
                        <label for="floatingTextarea" class="ms-3">Contenu</label>
                    </div>
                    <div class="mb-4 col-11">
                        <label for="formFile" class="form-label mb-3">Default file input example</label>
                        <input class="form-control bg-dark" type="file" id="formFile" name="image">
                        <img src="<?=   $allwiki[0]["img"] ?>" alt="">
                    </div>
                    <div class="form-floating mb-4 col-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="Categories">
                            <option selected><?=   $allwiki[0]["catg_name"] ?></option>
                            <?php if (isset($AllCategories)) {    ?>
                            <?php foreach ($AllCategories as  $value) {      ?>
                              
                            <option value="<?= $value->getName() ?>"><?= $value->getName() ?></option>
                           
                        <?php }} ?>
                          
                        </select>
                        <label for="floatingSelect"  class="ms-3">Works with selects</label>
                    </div>
                    <div class="form-floating mb-4 col-9 d-flex flex-wrap ">

                    <?php foreach ($allwiki as  $value) {    ?>
                       
                       <button disabled type="button" class="btn btn-warning m-1 mb-2"
                       style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                       <?= $value["tag_name"] ?>
                       </button>
                       <div class="form-check m-2 ">
                              <input class="form-check-input" name="tags[]" type="checkbox" value="<?= $value["tag_id"]?>" id="flexCheckChecked_<?= $value["tag_id"]?>" >
                            <label class="form-check-label" for="flexCheckChecked_<?= $value["tag_name"]?>">
                                <?= $value["tag_name"]?>
                            </label>
                            </div>
                  <?php   } ?>
                     
                   
                        <?php if (isset($AllTags)) {    ?>
                            <?php foreach ($AllTags as  $value) {      ?>
                              
                                <div class="form-check m-2 ">
                              <input class="form-check-input" name="tags[]" type="checkbox" value="<?= $value->gettag_id()?>" id="flexCheckChecked_<?= $value->gettag_id()?>" >
                            <label class="form-check-label" for="flexCheckChecked_<?= $value->gettag_id()?>">
                                <?= $value->getTag_name()?>
                            </label>
                            </div>
                        <?php }} ?>
                          
                   
                     
                    
                    </div>
                    <div class="col-11 d-flex justify-content-center  mt-5 ">
                        <button type="submit" name="submit" class="btn btn-outline-info  m-2"><i class="fa-solid fa-folder-plus me-2"></i>Ajouter Wiki</button>

                    </div>
                 </div>
                 </form>
                 <?php  }   ?>

                    </div>
                </div>


                <?php $contant =  ob_get_clean();
    include_once "View\layout_front.php" ; 