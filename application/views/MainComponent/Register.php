<div class="container form-register-wrapper">
    <div class="row">
        <div class="col">
            <form class="form-register" method="POST">
            <h2 class="mb-3" id="modalActionTitle">Register</h2>
            
            <div class="mb-3">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="idEdit" name="idEdit" value="">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="userFirstName">FirstName</label>
                    <input type="text" class="form-control" name="userFirstName" id="userFirstName" placeholder="Input your First Name" required>
                    <small><?=form_error('userFirstName');?></small>
                </div>
            </div>
            <div class="mb-3">
                <label for="userLastName">LastName</label>
                <input type="text" class="form-control" name="userLastName" id="userLastName" placeholder="Input your Last Name" required>
                <small><?=form_error('userLastName');?></small>
            </div>
            <div class="mb-3">
                <label for="userPet">Pet</label>
                <input type="text" class="form-control" name="userPet" id="userPet" placeholder="Input your Pet" required>
                <small><?=form_error('userPet');?></small>
            </div>
            <div class="mb-3">
                <label for="userEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name = "userEmail" id="userEmail" 
                aria-describedby="emailHelp" placeholder="sample@email.com" required>
                <small><?=form_error('userEmail');?></small>
            </div>
            <div class="mb-3 select-dept">
                <label for="select-dept" class="form-label mr-4">Department</label>
                <select class="form-select" id="select-dept" name="select-dept" aria-label="Default select example">
                    <option value="0">Select Department</option>
                        <?php foreach($departments as $department):?>
                            <option value="<?=$department->id?>"><?=$department->name?></option>
                        <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3 select-post">
                <label for="select-post" class="form-label mr-4">Position</label>
                <select class="form-select" name="select-post" id="select-post" aria-label="Default select example">
                    <option selected value="0">Select Position</option>
                        <?php foreach($positions as $position):?>
                            <option value="<?=$position->id?>"><?=$position->name?></option>
                        <?php endforeach;?>
                </select>
            </div>
            <div class="con-modif-btn">
                <div class="mb-3">
                    <label for="userPassword" class="form-label" id="userPassLabel">Password</label>
                    <input type="password" class="form-control" name="userPassword" id="userPassword" required>
                    <small><?=form_error('userPassword');?></small>
                </div>
                <div class="mb-3">
                    <label for="userConfirmPass" class="form-label" id="userConfLabel">Confirm Password</label>
                    <input type="password" class="form-control" id="userConfirmPass" required>
                    <small><?=form_error('userConfirmPass');?></small>
                </div>
                <button type="submit" class="btn btn-outline-primary float-right registerUserBtn mt-2" id="registerUserBtn">Register</button>          
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/tableManagement.js')?>"></script>
