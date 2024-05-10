<?php foreach($departments as $department):?>
    <tr id="<?=$department->id?>"> 
        <td>
            <?=$department->id?>
        </td>
        <td id="deptNameTd">
            <?=$department->name?>
        </td>
        <td>
            <div class="container-fluid">
                <div class="row">

                    <div class="col">
                        <button type="button" class="btn btn-outline-primary edit-dept" title="Edit department" data-toggle="modal" data-target="#departmentModal" id="editUserBtn" data-value1="<?=$department->id?>" data-value2="<?=$department->name?>"><i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger delete-dept" title="Delete department" data-value1="<?=$department->id?>" data-value2="<?=$department->name?>"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>                                   
        </td>
    </tr>
<?php endforeach;?>
<script src="<?= base_url('assets/js/deptManagement.js')?>"></script>