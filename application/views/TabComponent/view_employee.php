<div class="container-fluid employees-container">
   <div id="employees-data" data-employees="<?= htmlspecialchars(json_encode($employees))?>"></div>
   <div class="row">
      <!-- <div class="col-lg-12">
         Administration <span>> Employees</span>
         </div> -->
      <div class="col-lg-12">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <h3 class="title">Employees</h3>
                  <p>All the employees of the compnay are listed here </p>
               </div>
               <div class="col-lg-6">
                  <button class="btn-add addUserBtn" data-toggle="modal" data-target="#userModal"> 
                  <i class='bx bx-plus'></i>
                  Add New Employee
                  </button>
               </div>
               <div class="col-lg-4 input-container">
                  <!-- <input type="text" placeholder="Search" class="search search_employees"> -->
                  <i class='bx bx-search-alt-2 icon'></i>
                  <input type="text" placeholder="Search" class="search_employees">
               </div>
               <div class="col-lg-2 mb-3">
                  <select class="form-select" id="sortUsers" aria-label="Default select example">
                     <option value="all" selected>Sort by</option>
                     <option value="id">Id</option>
                     <option value="firstName">First name</option>
                     <option value="lastName">Last name</option>
                     <option value="pet">Pet</option>
                     <option value="email">Email</option>
                     <option value="department">Department</option>
                     <option value="position">Position</option>
                  </select>
               </div>
               <div class="col-lg-12 p-0">
                  <div class="container-fluid">
                     <div class="row wrapper-employees">
                        <?php foreach($employees as $employee):?>
                        <div class="col-lg-3 p-2 col-md-6" id="<?=$employee->id?>">
                           <div class="container-fluid user-card .show ">
                              <div class="row">
                                 <div class="col-lg-4 col-md-12 avatar d-flex align-items-center">
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
                                    <b>ID:</b> <span class="text-id"><?=$employee->id?><span>
                                 </div>
                                 <div class="col-lg-12 mt-1" style="word-wrap: break-word;">
                                    <b>Email: </b> <span class="text-email"><?=$employee->email?></span>
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
                     </div>
                  </div>
                  <!-- <div class="container-fluid bg-success">
                     <div class="row g-3">
                     <--?php for($i=0;$i<8;$i++):?>
                         <div class="col-lg-3 user-card">
                             <div class="col-lg-12">
                                 <i class='bx bx-trash float-right icon'></i>
                                 <i class='bx bx-edit float-right icon'></i>
                             </div>
                             <div class="col-lg-4 avatar">
                                 <h4>aa</h4>
                             </div>
                             <div class="col-lg-8">
                                 <h5 class="user-name">Leandrei Santos</h5>
                                 <p>Programmer</p>
                             </div>
                             <div class="col-lg-5 mt-4">
                                 <h6 class="department">Pinnacle</h6>
                             </div>
                             <div class="col-lg-5 mt-4">
                                 <h6 class="role">Admin</h6>
                             </div>
                             <div class="col-lg-12 mt-3">
                                 <b>ID:</b> 12
                             </div>
                             <div class="col-lg-12 mt-1">
                                 <b>Email:</b> leandrei@gmail.com
                             </div>
                         </div>
                     <--?php endfor;?>
                     </div>
                     </div>  -->
               </div>
               <!-- <div class="custom-col">
                  <div class="user-card">
                      <div class="row">
                          <div class="col-lg-12">
                              <i class='bx bx-trash float-right icon'></i>
                              <i class='bx bx-edit float-right icon'></i>
                          </div>
                          <div class="col-lg-4 avatar">
                              <h4>aa</h4>
                          </div>
                          <div class="col-lg-8">
                              <h5 class="user-name">Leandrei Santos</h5>
                              <p>Programmer</p>
                          </div>
                          <div class="col-lg-5 mt-4">
                              <h6 class="department">Pinnacle</h6>
                          </div>
                          <div class="col-lg-5 mt-4">
                              <h6 class="role">Admin</h6>
                          </div>
                          <div class="col-lg-12 mt-3">
                              <b>ID:</b> 12
                          </div>
                          <div class="col-lg-12 mt-1">
                              <b>Email:</b> leandrei@gmail.com
                          </div>
                      </div>
                  </div>
                  </div> -->
            </div>
         </div>
      </div>
   </div>
</div>
<!-- <div class="container employees-container">
   <div class="row">
       <div class="col-lg-12 title">
           <h3>All list of employee.</h3>
       </div>
       <div class="col-lg-6 input-wrapper">
           <div class="input-container">
               <i class='bx bx-search-alt-2 icon'></i>
               <input type="text" placeholder="Search first name, last name, pet, email or role" class="search_employees">
           </div>
       </div>
       <div class="col-lg-6 mb-3 select-container">
           <select class="form-select" id="sortUsers" aria-label="Default select example">
               <option value="all" selected>Sort by</option>
               <option value="id">Id</option>
               <option value="firstName">First name</option>
               <option value="lastName">Last name</option>
               <option value="pet">Pet</option>
               <option value="email">Email</option>
               <option value="department">Department</option>
               <option value="position">Position</option>
           </select>
       </div>
       <div class="col-lg-12 bg-dark employees-table-wrapper">
           <div class="table table-responsive-sm table-hover table-dark">
               <table class="table">
               <caption class="ml-3">Total of users: <--?=$employeeTotal?></caption>
                   <thead>
                       <tr>
                           <th scope="col">Id</th>
                           <th scope="col">First Name</th>
                           <th scope="col">Last Name</th>
                           <th scope="col">Pet</th>
                           <th scope="col">Email</th>
                           <th scope="col">Department</th>
                           <th scope="col">Position</th>
                           <th scope="col">Role</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <--?=$employeeTable?>
                   </tbody>
               </table>
           </div>
       </div>
       <div class="col-lg-12">
           <div class="container-btn">
               <button type="button" class="btn btn-success addUserBtn" data-toggle="modal" data-target="#userModal"><i class='bx bx-user-plus icon'></i>Add New User</button>
           </div>
       </div>
   </div>
   </div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= base_url('assets/js/userManagement.js')?>"></script>