<?php foreach($departments as $department):?>
    <div class="col-lg-3 p-2 col-md-6" id="<?=$department->id?>">
        <div class="container-fluid user-card .show ">
            <div class="row">
                <div class="col-lg-4 col-md-12 d-flex align-items-center">
                    <h4><?=$department->name?></h4>
                </div>
                <div class="col-lg-12 mt-1" style="word-wrap: break-word;">
                                    Head: <span class="text-email">leandrei santos</span>
                                 </div>
                <div class="col-lg-12 mt-3">
                <!-- <i class='bx bx-trash float-right icon'></i> -->
                <button type="button" class="btn confirm-delete delete-dept" title="Delete department" data-value1="<?=$department->id?>" data-value2="<?=$department->name?>"><i class="bi bi-trash"></i></button>
                <button type="button" class="btn float-right edit-user edit-dept" title="Edit department" data-toggle="modal" data-target="#departmentModal" id="editUserBtn" data-value1="<?=$department->id?>" data-value2="<?=$department->name?>"><i class="bi bi-pencil-square"></i>
                </button>
                <!-- <i class='bx bx-edit float-right icon edit-user' title="Edit User" data-toggle="modal" data-target="#userModal" id="editUserBtn" value="<--?= $employee->id; ?>"></i> -->
                <!-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    Link with href
                    </a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <tr id="<--?=$department->id?>"> 
        <td>
            <--?=$department->id?>
        </td>
        <td id="deptNameTd">
            <--?=$department->name?>
        </td>
        <td>
            <div class="container-fluid">
                <div class="row">

                    <div class="col">
                        <button type="button" class="btn btn-outline-primary edit-dept" title="Edit department" data-toggle="modal" data-target="#departmentModal" id="editUserBtn" data-value1="<--?=$department->id?>" data-value2="<--?=$department->name?>"><i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger delete-dept" title="Delete department" data-value1="<--?=$department->id?>" data-value2="<--?=$department->name?>"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>                                   
        </td>
    </tr> -->
<?php endforeach;?>
<script src="<?= base_url('assets/js/deptManagement.js')?>"></script>