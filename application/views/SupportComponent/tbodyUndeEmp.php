<?php foreach($usersInDept as $user):?>
      <tr>
        <td scope="row"><?=$user->id?></td>
        <td><?=$user->firstName?></td>
        <td><?=$user->lastName?></td>
        <td><?=$user->position?></td>
        <td>
          <div class="col">
            <div class="row">
              <div class="col edit-under-emp">
                <i class="bi bi-info-square"></i>
              </div>
            </div>
          </div>
        </td>
      </tr>
    <?php endforeach;?>
<script src="<?=base_url('assets/js/employeeUnderManagement.js')?>"></script>