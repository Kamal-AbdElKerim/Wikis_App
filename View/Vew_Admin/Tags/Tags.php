<?php
if (isset( $_SESSION["Admin"])) { ?>

<?php 



ob_start(); 
$title = "Tags" ; 
$Tags = "Tags" ; 
?>


         
            <div class="container-fluid pt-4 px-4">
            <form action="index.php?action=CreateTags" method="post">

                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter Tags</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="tag_name" value="<?=  (isset($_GET["tag_name"])) ? $_GET["tag_name"] : "" ; ?>"
                            placeholder="name@example.com">
                        <label for="floatingInput">Tag</label>
                    </div>
                    <?php if (isset($_GET["error"])) {     $error = $_GET["error"] ;   ?>
                        <div class="alert alert-danger" role="alert">
                        <?=  $error ?>
                        </div>
                 <?php } ?>
                 
                    <div class="orm-floating mt-4"> 
                        <button type="submit" class="btn btn-outline-info m-2">Ajouter Tag</button>

    
                    </div>

                </div>
            </form>
                
            </div>



      


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">List Tags</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col" class=" col-lg-5 ">Tags</th>
                                    <th scope="col" class=" col-lg-2 ">Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php foreach ($AllTags as $value) {     ?>
                                   
                             
                                   <tr>
                                       <td><?= $value->getTag_name() ?></td>
                                       <td><a class="btn btn-square btn-outline-success m-1" href="index.php?action=UpdateTags&tag_id=<?= $value->gettag_id()  ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                       <a class="btn btn-square btn-outline-primary m-1 modal-trigger" data-bs-toggle="modal" data-bs-name="<?= $value->getTag_name()  ?>"  data-bs-id="<?= $value->gettag_id() ?>" href=""><i class="fa-solid fa-trash"></i></a>
   
                                           </td>
                                   </tr>
   
                                   <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete Catégories</h1>
      </div>
      <div class="modal-body">
        
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>
      

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
            modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            <a class="btn btn-success mb-2 ms-2" href="index.php?action=deleteTags&tag_id=${id}">delete</a>
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
    include_once "View\layout_Admin.php" ; 


}else {
    header("Location: index.php?action=form_login");

}