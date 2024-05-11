<div class="modal fade department-modal" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h3 id="title-edit-modal">Add New Department</h3>
                <button type="button" class="close" id="closeModalDept" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="title-edit-modal">
                                Add New Department
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <i class='bx bx-x icon' id="closeModalDept" data-dismiss="modal" aria-label="Close"></i>
                        </div>
                        <div class="col-md-12">
                        <form>
                                    <div class="mb-3">
                                        <div class="form-group mt-3">
                                            <label for="departmentName">Department</label>
                                            <input type="text" class="form-control departmentName mb-4" name="departmentName" id="departmentName" placeholder="Input department name" required>
                                            <small><?=form_error('departmentName');?></small></input>
                                        </div>
                                        <div class="mb-3 select-head">
                                            <label for="select-head" class="form-label mr-4">Head Department</label>
                                            <select class="form-select" name="select-head" id="select-head" aria-label="Default select example">
                                                <option selected value="0">Select Head Department</option>
                                                    <?php foreach($users as $user):?>
                                                        <option value="<?=$user->id?>"><?=$user->firstName." ".$user->lastName?></option>
                                                    <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="container-edit-btn">
                                            <button type="submit" class="btn btn-outline-info float-right departmentBtn mt-4" id="departmentBtn">Add Department</button>
                                        </div>
                                    </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>