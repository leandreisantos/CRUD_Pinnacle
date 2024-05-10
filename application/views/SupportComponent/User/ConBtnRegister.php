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
<button type="submit" class="btn btn-outline-primary float-right registerUserBtn mt-4" id="registerUserBtn">Register</button>

<script src="<?= base_url('assets/js/userManagement.js')?>"></script>