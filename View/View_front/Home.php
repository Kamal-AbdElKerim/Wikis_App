<?php  ob_start(); 
$title = "Home" ; 
?>


  <!-- main-slider -->
  <section class="w3l-main-slider" id="home">
    <div class="companies20-content">
      <div class="owl-one owl-carousel owl-theme">
    
       <?php foreach ($Troi_wikis as  $value) {    ?>

        <div class="item">
          <li>
            <div class="slider-info banner-view banner-top3 bg bg2">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg">
                    <h5><?= $value->getTitle() ?></h5>
                    <p class="mt-md-4 mt-3 max-lines-3"><?= $value->getContenu() ?>
                    </p>
                   
                    <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="index.php?action=moredetails&id_wiki=<?= $value->getId_wiki() ?>">
                      Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>

        <?php } ?>

      </div>
    </div>
  </section>
  <!-- /main-slider -->
  <!-- home page block1 -->
  <section id="about" class="home-services pt-lg-0 mb-5">
    <div class="container">
      <div class="row">

      <?php foreach ($Last_Troi_Categories as  $value) {    ?>

    
        <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
          <div class="box-wrap">
            <div class="box-wrap-grid">
              <div class="icon">
                <span class="fa fa-globe"></span>
              </div>
              <div class="info">
                <p>Categories</p>
                <h4><?= $value->getName() ?></h4>

              </div>
            </div>
            <p class="mt-3"><?= $value->getBio() ?>.</p>
          </div>
        </div>

        <?php } ?>
      </div>
    </div>
  </section>

    <!-- about page about section -->
    <section class="w3l-index3" id="about">

    
    <div class="midd-w3 py-5">
    <div class=" container mt-3 ms-3 row  justify-content-between ">
   
      <div class="col-sm-5 ms-5 ps-5">
        <input type="search" class="form-control" id="keywordInput" placeholder="search blog">
      </div>
  
  
            <div class=" col-1 ">
            <select  id="mySelect" class="form-select" aria-label="Default select example">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
      </select>
            </div>            
       </div>
       
      <div class="container py-lg-4 " id="data" >

   
 
      </div>
      <nav aria-label="..." class=" d-flex  justify-content-center mt-4  w-100 ">
                  <ul class="pagination " id="paginate">
            
                  
                  </ul>
                </nav>
    </div>
  </section>


  <!-- //home page block grids -->
  <!-- //home page block1 -->
   <!-- stats -->
   <section class="w3l-stats py-5 mt-5" id="stats">
    <div class="gallery-inner container py-sm-5">
      <div class="row stats-con py-md-5">
        <div class="col-md-4 col-6 stats_info counter_grid">
          <p class="counter"><?= $num_All_wikis ?> </p>
          <span class="plus">+</span><br>
          <h3>Acres Of wikis</h3>
          <p class="para-counter">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo Semper.</p>
        </div>
        <div class="col-md-4 col-6 stats_info counter_grid mt-md-0 mt-0">
          <p class="counter"><?= $num_All_auteur ?></p>
          <span class="plus">+</span><br>
          <h3>Acres Of auteur</h3>
          <p class="para-counter">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo Semper.</p>
        </div>
        <div class="col-md-4 col-6 stats_info counter_grid2 mt-md-0 mt-4">
          <p class="counter"><?= $num_AllCategories ?></p>
          <span class="plus">+</span><br>
          <h3>Thousand Categories</h3>
          <p class="para-counter">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo Semper.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- //stats -->
   <!-- /contact-section -->

   
<section class="w3l-contact-2 py-5" id="contact">
  <div class="container py-lg-5 py-md-4 py-2">
    <span class="title-subhny mb-2 text-center">wiki a wikis</span>
    <h3 class="title-w3l mb-5 text-center">Add wiki</h3>
    <?php if (isset($_SESSION["auteur"]) || isset($_SESSION["Admin"])) {    ?>

      <div class="contact-grids d-grid">
        <div class="contact-right">
        <form action="index.php?action=addWikis" method="post" enctype="multipart/form-data">
              <div class="form-input">

                  <input type="text"  placeholder="Title" name="Title" id="w3lName"  class="contact-input"
                       />
      
              </div>
              <div class="form-input">
                  <textarea name="Contenu" id="w3lMessage" placeholder="Type your Contenu here*"
                      ></textarea>
              </div>
         
              <select required class="form-select form-select-lg mb-3" id="floatingSelect"
                            aria-label="Large select example" name="Categories">
                            <option selected>Categories</option>
                            <?php if (isset($AllCategories)) {    ?>
                            <?php foreach ($AllCategories as  $value) {      ?>
                              
                            <option value="<?= $value->getName() ?>"><?= $value->getName() ?></option>
                           
                        <?php }} ?>
                          
                        </select>
              <div class="btn-group d-flex flex-wrap " role="group" aria-label="Basic checkbox toggle button group">
              <?php if (isset($AllTags)) {    ?>
                            <?php foreach ($AllTags as  $value) {      ?>
              <div>
              <input  type="checkbox" name="tags[]" value="<?= $value->gettag_id()?>" class="btn-check" id="flexCheckChecked_<?= $value->gettag_id()?>" autocomplete="off">
                <label class="btn btn-outline-primary ms-2" for="flexCheckChecked_<?= $value->gettag_id()?>"><?= $value->getTag_name()?></label>
              </div>

                <?php }} ?>
              </div>
           
         
      </div>
          <div class="contact-left-img">
            <div>
              <div class="mb-4 d-flex justify-content-center">
                  <img id="selectedImage" src="public\img\img defaut.jpg"
                  alt="example placeholder" style="width: 300px; height: 300px;" />
              </div>
              <div class="d-flex justify-content-center">
                  <div class="btn btn-primary btn-rounded">
                      <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                      <input name="image" type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                  </div>
              </div>
          </div> 
          <div class="form-buttonhny text-lg-right mt-5 pt-4">
            <button type="submit" name="submit" class="btn btn-style btn-primary">Add wiki</button>
        </div>  
       
         </div>
         
        </form>
      </div>
                    <?php if (isset($_GET["error"])) {    ?> 

              <div class="alert alert-danger mt-4" role="alert">
              <?= $_GET["error"] ?>
              </div>  

              <?php } ?>  
                    <?php  }else {    ?>

                <div class="border rounded p-4 pb-0 mb-4">
                              <figure class="text-center">
                                  <blockquote class="blockquote">
                                      <p>you have log in.</p>
                                  </blockquote>
                                  <figcaption class="blockquote-footer">
                                      Someone famous in <cite title="Source Title">Source Title</cite>

                                  </figcaption>
                                  <figcaption class="blockquote">
                                
                                  
                                  <a class="btn  btn-outline-info  m-2" href="index.php?action=form_login"><i class="fa fa-home me-2"></i>Log in</a>

                                  </figcaption>
                              </figure>
                  </div>

                <?php } ?>
    
     
    </div>
</section>

<!-- //contact-section -->

 


 
  <script src="View\View_front\ajax\affiche_wikis.js"></script>



    <?php $contant =  ob_get_clean();
    include_once "View\layout_front.php" ; 