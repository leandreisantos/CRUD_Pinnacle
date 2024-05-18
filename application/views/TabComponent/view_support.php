<div class="container-fluid dept-container employees-container">
   <div class="row">
      <!-- <div class="col-lg-12">
         Administration <span>> Employees</span>
         </div> -->
      <div class="col-lg-12">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <h3 class="title"><?=$title?></h3>
                  <p><?=$description?></p>
               </div>
               <div class="col-lg-6">
                  <!-- <button class="btn-add addUserBtn" data-toggle="modal" data-target="#userModal"> 
                  <i class='bx bx-plus'></i>
                  Add New Employee
                  </button> -->
                  <?=$buttonAdd?>
               </div>
               <div class="col-lg-4 input-container">
                  <!-- <input type="text" placeholder="Search" class="search search_employees"> -->
                  <i class='bx bx-search-alt-2 icon'></i>
                  <input type="text" placeholder="Search" class="search_employees search_departments">
               </div>
               <div class="col-lg-2 mb-3">
                <select class="form-select" id="sortDept" aria-label="Default select example">
                    <option value="all" selected>Sort by</option>
                    <option value="id">Id</option>
                    <option value="name">Department</option>
                </select>
               </div>
               <div class="col-lg-12 p-0">
                  <div class="container-fluid">
                     <div class="row wrapper-employees">
                        <?=$departmentsTable?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?= base_url('assets/js/deptManagement.js')?>"></script>