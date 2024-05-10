<div class="modal fade add-modal userModal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <!-- <div class="modal-header">
                <button type="button" class="close" id="closeModalUser" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <i class='bx bx-x icon' id="closeModalUser" data-dismiss="modal" aria-label="Close"></i>
                        </div>
                        <div class="col-md-12">
                            <!-- <div class="card"> -->
                                <!-- <div class="card-body"> -->
                                    <?php 
                                    $this->load->view("MainComponent/Register.php",
                                    array(
                                        'departments'=>$departments,
                                        'positions'=> $positions
                                    ));
                                    ?>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>