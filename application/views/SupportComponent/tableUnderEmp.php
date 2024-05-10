<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Employee Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="container-fluid p-3">
            <div class="row">
              <div class="col">
                  <h3 class="name">Leandrei Santos</h3>
                  <hr>
                  <i class='bx bx-envelope'></i>
                  <p class="email">leandrei@gmail.com</p>
                  <i class='bx bx-briefcase' ></i>
                  <p class="position">Programmer</p>
                  <i class='bx bxs-dog' ></i>
                  <p class="pet">Dog</p>
                  <i class='bx bx-buildings' ></i>
                  <p class="department">Pinnacle</p>
                  <i class='bx bx-id-card'></i>
                  <p class="role">admin</p>
              </div>
            </div>
        </div>
      </div>
      </div>

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
                    <i class="bi bi-info-square" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" data-value="<?=$user->firstName?>"
                    data-last-name="<?=$user->lastName?>"
                    data-email="<?=$user->email?>"
                    data-position="<?=$user->position?>"
                    data-department="<?=$user->department?>"
                    data-role="<?=$user->role?>"></i>
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