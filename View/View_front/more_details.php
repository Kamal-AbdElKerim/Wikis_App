<?php  ob_start(); 
$title = "more details" ; 
?>


   <!-- //about page about section -->
   <section class="w3l-index2 mt-5" id="about1">
      <div class="midd-w3 py-5">
        <div class=" container  py-lg-5 py-md-4 py-2">
          <div class="row">
            
            <div class="col-lg-3 ">
              <div class="cardd border rounded-2 border-secondary p-5">
 
                <div class="user text-center">
  
                  <div class="profile">
  
                    <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" class="rounded-circle" width="90" height="82">
                    
                  </div>
  
                </div>
  
  
                <div class=" text-center mt-3">
                 
  
                  <h4 class="mb-2"><a href="index.php?action=profile&auteur_id=<?= $allwiki[0]["auteur_id"] ?>"><?= $allwiki[0]["name"] ?></a></h4>
                  <span class="text-muted d-block mb-4">Los Angles</span>

                  <?php if (isset($_SESSION["auteur_id"]) && $_SESSION["auteur"] ===  $allwiki[0]["email"] ) {    ?>
  
                  <a class="btn  btn-success  btn-sm follow" href="index.php?action=profile&auteur_id=<?= $allwiki[0]["auteur_id"] ?>">My Profile</a>

                 
                  <?php }else {     ?>
                   
                    <button class="btn btn-primary btn-sm follow">Follow</button>

                   <?php } ?>
                  <div class="d-flex  justify-content-around  align-items-center mt-4 ">
  
                  
  
  
                    <div class="stats  ">
                      <h6 class="">Projects</h6>
                      <span>142</span>
  
                    </div>

                    <div class="stats ms-3 ">
                      <h6 class="">Followers</h6>
                      <span>8,797</span>
  
                    </div>
  
  
                    <div class="stats ms-3">
                      <h6 class="">Ranks</h6>
                      <span>129</span>
  
                    </div>
                    
                  </div>
                  
                </div>
                 
               </div>
            </div>
        

            <div class="col-lg-7  mt-lg-0 mt-5  align-self">
              
                <div class=" text-center rounded-2 border border-1  p-4">
                <?php if (isset($_SESSION["auteur_id"]) && $_SESSION["auteur"] ===  $allwiki[0]["email"] ) {    ?>

                   <div class=" d-flex  justify-content-end ">
                    <div>
              <a class="btn btn-square btn-outline-success m-1" href="index.php?action=update_form_wikis&id_wiki=<?= $allwiki[0]["id_wiki"] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
              <a class="btn btn-square btn-outline-primary m-1 modal-trigger" data-bs-toggle="modal" data-bs-name="<?= $allwiki[0]["title"] ?>"  data-bs-id="<?= $allwiki[0]["id_wiki"] ?>" href=""><i class="fa-solid fa-trash"></i></a>
                    </div>
                   </div>
                 <?php } ?>
                 <h2 class="text-start  mb-3"><?= $allwiki[0]["title"] ?></h2>         
                  <img src="<?= $allwiki[0]["img"] ?>" class="img-fluid mb-5" alt="...">
                  <p class=" text-start   text-black ">
                  <?= $allwiki[0]["contenu"] ?>
                    </p>
                
            </div>
            </div>


            <div class="col-lg-2 ">
              <div class="cardd border rounded-2 border-secondary ">

                <div class=" text-center mt-3">
               
                        <h4 class=" text-center ">Categories</h4><hr>
                        <!-- <button disabled type="button" class="btn  btn-success  m-1"
                        style="font-size: 15px;">
                       
                        </button> -->
                        <span class="badge  text-bg-success "> <?= $allwiki[0]["catg_name"] ?></span>

                        <div class="  rounded p-3">
                        <h3>tags</h3><hr>
                        <?php foreach ($allwiki as  $value) {   ?>

                          <span class="badge text-bg-primary"> <?= $value["tag_name"] ?></span>


                        <!-- <button disabled type="button" class="btn  btn-primary   m-1 mb-2"
                        style="font-size: 15px;">
                        <?= $value["tag_name"] ?>
                        </button> -->
                    <?php } ?>
                  
                 
                    </div>
                  
                </div>
                 
               </div>
            </div>
        </div>
      </div>
    </section>
    <!-- home page block grids -->
         
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Wiki</h1>
      </div>
      <div class="modal-body">
        
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>
            <!-- Blank End -->

            <script>
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const id = trigger.getAttribute('data-bs-id');
            const nom = trigger.getAttribute('data-bs-name');
            const modal = document.getElementById('exampleModal');
            const body = modal.querySelector('.modal-body');
            const modalTrigger = modal.querySelector('.modal-footer');
            // Use the fetched 'id' to perform further actions or data retrieval
            modalTrigger.innerHTML = `<button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
            
            <a class="btn btn-danger " href="index.php?action=deleteWiki&id_wiki=${id}">delete</a>
`;
            body.innerHTML = `Do you want to delete : ${nom}`;
            // Set the 'data-bs-target' attribute of the modal dynamically
            modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
            // Show the modal
            const myModal = new bootstrap.Modal(modal);
            myModal.show();
        });
    });

</script>

            <?php $contant =  ob_get_clean();
    include_once "View\layout_front.php" ; 







