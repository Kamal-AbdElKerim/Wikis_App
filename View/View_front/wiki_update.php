<?php  ob_start(); 
$title = "update wiki" ; 
?>



<div class="container pt-4 ">
                <div class="row  rounded   mx-0">
                    <h1 class="text-start  pt-5 ps-5 ">Update wiki</h1>

                    <?php if (isset($_SESSION["auteur"])) {    ?>
                     
                <form action="index.php?action=updateWikis" method="post" enctype="multipart/form-data">
                 <div class="m-5 row">
                    <div class="form-floating mb-4 col-11">
                        <input type="text" class="form-control" id="floatingInput" value="<?=  $wiki[0]["title"] ?>"
                            placeholder="Title" name="Title">
                        <label for="floatingInput" class="ms-3">Title</label>
                    </div>
                    <div class="form-floating mb-4 col-11" style="display: none;">
                        <input type="text" class="form-control" id="floatingInput" value="<?=  $wiki[0]["id_wiki"] ?>"
                            placeholder="Title" name="id_wiki">
                        <label for="floatingInput" class="ms-3">id_wiki</label>
                    </div>
                    <div class="form-floating mb-4 col-11">
                        <textarea name="Contenu" class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;"><?=  $wiki[0]["contenu"] ?></textarea>
                        <label for="floatingTextarea" class="ms-3">Contenu</label>
                    </div>
                    <div class="mb-4 col-11">
                    <div>
              <div class="mb-4 d-flex justify-content-center">
                  <img id="selectedImage"  src="<?=   $wiki[0]["img"] ?>"
                  alt="example placeholder" style="width: 300px; height: 300px;"  />
              </div>
              <div class="d-flex justify-content-center">
                  <div class="btn btn-primary btn-rounded">
                      <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                      <input name="image" type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                  </div>
              </div>
          </div>
                    </div>
                    <div class="form-floating mb-4 col-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="Categories">
                            <option selected><?=   $wiki[0]["catg_name"] ?></option>
                            <?php if (isset($AllCategories)) {    ?>
                            <?php foreach ($AllCategories as  $value) { 
                                if ($wiki[0]["catg_name"]  === $value->getName()) {
                                    continue;
                                }     ?>
                              
                            <option value="<?= $value->getName() ?>"><?= $value->getName() ?></option>
                           
                        <?php }} ?>
                          
                        </select>
                        <label for="floatingSelect"  class="ms-3">Works with selects</label>
                    </div>
                    <div class="form-floating mb-4 col-9 d-flex flex-wrap ">


                    <?php foreach ($wiki as $valuewiki) { ?>
                        <div class="form-check m-2">
                            <input checked class="form-check-input" name="tags[]" type="checkbox" value="<?= $valuewiki["tag_id"] ?>" id="flexCheckChecked_<?= $valuewiki["tag_id"] ?>">
                            <label class="form-check-label" for="flexCheckChecked_<?= $valuewiki["tag_id"] ?>">
                                <?= $valuewiki["tag_name"] ?>
                            </label>
                        </div>
                    <?php } ?>

                    <?php foreach ($AllTags as $tag) {
                        $tagFound = false;
                        foreach ($wiki as $valuewiki) {
                            if ($tag->getTag_name() === $valuewiki["tag_name"]) {
                                $tagFound = true;
                                break; // Exit the loop once a match is found
                            }
                        }
    
                    if (!$tagFound) { ?>
                        <div class="form-check m-2">
                            <input class="form-check-input" name="tags[]" type="checkbox" value="<?= $tag->getTag_id() ?>" id="flexCheckChecked_<?= $tag->getTag_id() ?>_extra">
                            <label class="form-check-label" for="flexCheckChecked_<?= $tag->getTag_id() ?>_extra">
                                <?= $tag->getTag_name() ?>
                            </label>
                        </div>
                    <?php }
                } ?>



                     
                    
                    </div>
                    <div class="col-11 d-flex justify-content-center  mt-5 ">
                        <button type="submit" name="submit" class="btn btn-outline-info  m-2"><i class="fa-solid fa-folder-plus me-2"></i>update Wiki</button>

                    </div>
                    <?php if (isset($_GET["error"])) {    ?> 

                        <div class="alert alert-danger mt-4" role="alert">
                        <?= $_GET["error"] ?>
                        </div>  

                        <?php } ?>  
                 </div>
                 </form>
                 <?php  }   ?>

                    </div>
                </div>


                <?php $contant =  ob_get_clean();
    include_once "View\layout_front.php" ; 