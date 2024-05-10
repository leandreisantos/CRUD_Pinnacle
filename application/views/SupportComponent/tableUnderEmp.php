<div class="container tableUnder-con">
  <div class="row">
    <div class="col-lg-4 handled-dept">
      <h3>Your handled <span>department</span>.</h3>
      <select class="form-select" id="deptList" aria-label="Default select example">
          <option value="0" selected>All Departments</option>
            <?php foreach($DeptNames as $key=>$value):?>
              <option value=<?=$key?>><?=$value?></option>
            <?php endforeach; ?>
      </select>
      <select class="form-select" id="deptList" aria-label="Default select example">
          <option value="0" selected>Sort by</option>
          <option value="">Id</option>
          <option value="">First name</option>
          <option value="">Last name</option>
          <option value="">Position</option>
      </select>
    </div>
    <div class="col-lg-8 handled-dept-table">
    <input type="text" class="search" placeholder="Search employee">
    <table class="table table-dark rounded-table table-under-emp">
      <thead>
      <caption>
        <p class="float-right">Employee under the department.</p>
      <!-- <select class="form-select" id="deptList" aria-label="Default select example">
          <option value="0" selected>All Departments</option>
            <--?php foreach($DeptNames as $key=>$value):?>
              <option value=<--?=$key?>><--?=$value?></option>
            <--?php endforeach; ?>
      </select> -->
      </caption>
        <tr>
          <th>Id</th>
          <th>First</th>
          <th scope="col">Last</th>
          <th scope="col">Position</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="tbodyUnder">
        <?php foreach($usersInDept as $user):?>
          <tr>
            <th scope="row"><?=$user->id?></th>
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
      </tbody>
    </table>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?=base_url('assets/js/employeeUnderManagement.js')?>"></script>
<script src="<?=base_url('assets/js/employeeTimeLog.js')?>"></script>