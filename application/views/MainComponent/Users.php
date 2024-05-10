<div class="container rounded" id="table">
    <?php $action="add"?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header table-header"> 
                        <div class="container-btn">
                            <button type="button" class="btn btn-success float-right addUserBtn" 
                            data-toggle="modal" data-target="#userModal">Add New User</button>
                        </div>
                        <div class="text-center">
                            <h5 class="table-title">LIST OF USERS</h5>
                        </div>
                        <!-- Modal for Add User -->
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Pet</th>
                                    <th>Email</th>
                                    <th>Deparment</th>
                                    <th>Position</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="usersTable">
                            <?php foreach($users as $user):?>
                                    <tr id="<?=$user->id;?>" class="fade-in">
                                        <td>
                                            <?= $user->id; ?>
                                        </td>
                                        <td id="<?php echo $user->firstName; ?>">
                                            <?=$user->firstName?>
                                        </td>
                                        <td id="<?php echo $user->lastName; ?>">
                                            <?=$user->lastName?>
                                        </td>
                                        <td id="<?php echo $user->pet; ?>">
                                            <?=$user->pet?>
                                        </td>
                                        <td>
                                            <?=$user->email?>
                                        </td>
                                        <td>
                                            <?php foreach($departments as $department){
                                                if($department->id==$user->department) echo $department->name;
                                            }?>
                                        </td>
                                        <td>
                                        <?php foreach($positions as $position){
                                                if($position->id==$user->position) echo $position->name;
                                            }?>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name=<?="flexRadio".$user->id?> id="userRadio" <?php if($user->role=="user") echo "checked";?> value="user">
                                                <label class="form-check-label" for="userRadio">User</label>    
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name=<?="flexRadio".$user->id?> id="adminRadio" <?php if($user->role=="admin") echo "checked"?> value="admin">
                                                <label class="form-check-label" for="adminRadio">
                                                    Admin
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-outline-primary float-right edit-user" title="Edit User" data-toggle="modal" 
                                                            data-target="#userModal" id="editUserBtn" value="<?= $user->id; ?>"><i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-outline-danger confirm-delete" title="Delete User"
                                                            value="<?= $user->id; ?>"firstNameValue="<?= $user->firstName?>">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>                               
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <!-- <button type="button" class="btn btn-outline-success float-right ml-3 usersBtn">View Users</button> -->
                        <!-- <button type="button" class="btn btn-outline-warning float-right ml-3 postBtn">View Position</button>
                        <button type="button" class="btn btn-outline-info float-right ml-3 deptBtn">View Departments</button>
                        <button type="button" class="btn btn-outline-success float-right userBtn" id="userBtn">View User</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url('assets/js/tableManagement.js')?>"></script>

