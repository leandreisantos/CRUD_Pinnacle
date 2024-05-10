<div class="container employees-container">
    <div class="row">
        <div class="col-lg-12 title">
            <h3>All Department.</h3>
        </div>
        <div class="col-lg-6 input-wrapper">
            <div class="input-container">
                <i class='bx bx-search-alt-2 icon'></i>
                <input type="text" placeholder="Search department" class="search_employees">
            </div>
        </div>
        <div class="col-lg-6 select-container">
            <select class="form-select" id="sortDept" aria-label="Default select example">
                <option value="all" selected>Sort by</option>
                <option value="id">Id</option>
                <option value="name">Department</option>
            </select>
        </div>
        <div class="col-lg-12 bg-dark employees-table-wrapper">
            <div class="table table-responsive-sm table-hover table-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$departmentsTable?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="container-btn">
                <!-- <button type="button" class="btn btn-success addUserBtn" data-toggle="modal" data-target="#userModal"><i class='bx bx-user-plus icon'></i>Add New Department</button> -->

                <button type="button" class="btn btn-success addDeptBtn" data-toggle="modal" data-target="#departmentModal" value=""><i class='bx bx-buildings' ></i>Add New Deparatment</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/deptManagement.js')?>"></script>