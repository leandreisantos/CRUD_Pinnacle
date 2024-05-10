

<?php foreach($employees as $employee):?>
                                <div class="col-lg-3 p-2 col-md-6" id="<?=$employee->id?>">
                                    <div class="container-fluid user-card .show">
                                        <div class="row">
                                    <div class="col-lg-4 avatar">
                                        <h4><?=$employee->aliasName?></h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="user-name"><?=$employee->firstName." ".$employee->lastName?></h5>
                                        <p><?=$employee->position?></p>
                                        <hr>
                                    </div>
                                    <div class="col-lg-5 mt-4">
                                        <h6 class="department"><?=$employee->department?></h6>
                                    </div>
                                    <div class="col-lg-5 mt-4">
                                        <h6 class="role"><?=$employee->role?></h6>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <b>ID: </b><?=$employee->id?>
                                    </div>
                                    <div class="col-lg-12 mt-1" style="word-wrap: break-word;">
                                        <b>Email: </b><?=$employee->email?>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <!-- <i class='bx bx-trash float-right icon'></i> -->
                                        <button type="button" class="btn confirm-delete" title="Remove Employee" value="<?= $employee->id;?>"firstNameValue="<?= $employee->firstName?>"><i class="bi bi-trash"></i></button>
                                        <button type="button" class="btn float-right edit-user" title="Edit Employee" data-toggle="modal" data-target="#userModal" id="editUserBtn" value="<?= $employee->id; ?>"><i class="bi bi-pencil-square"></i>
                                        </button>
                                        <!-- <i class='bx bx-edit float-right icon edit-user' title="Edit User" data-toggle="modal" data-target="#userModal" id="editUserBtn" value="<--?= $employee->id; ?>"></i> -->

                                        <!-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                        Link with href
                                        </a> -->


                                    </div>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach;?>
<script src="<?= base_url('assets/js/userManagement.js')?>"></script>