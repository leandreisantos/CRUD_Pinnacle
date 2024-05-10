<?php foreach($positions as $position):?>
    <tr id="<?=$position->id?>"> 
        <td>
            <?=$position->id;?>
        </td>
        <td id="deptNameTd">
            <?=$position->name;?>
        </td>
        <td>
            <div class="container-fluid">
                <div class="row">

                    <div class="col">
                        <button type="button" class="btn btn-outline-primary edit-post" title="Edit position" data-toggle="modal" data-target="#positionModal" id="editPositionBtn" data-value1="<?=$position->id?>" data-value2="<?=$position->name?>"><i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger delete-post" title="Delete position" data-value1="<?=$position->id?>" data-value2="<?=$position->name?>"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
                                                
        </td>
    </tr>
<?php endforeach;?>
<script src="<?= base_url('assets/js/postManagement.js')?>"></script>