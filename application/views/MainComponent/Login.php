<div class="container-fluid container-login">
    <div class="row row-login">
        <div class="col-lg-6 col-md-6 intro-login">
            <h1><span>Welcome</span> sign in to website.</h1>
            <p>Welcome to my platform! We're thrilled to have you here. Please enter your credentials below to access your account.</p>
        </div>
        <div class="col-lg-6 col-md-6 login-panel shadow-lg"> 
        <?= validation_errors();?>
               <?= form_open('login/processLogin');?>
                <form>
                <div class="mb-3 mt-3">
                    <i class='bx bx-user-circle icon'></i>
                    <label for="userEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control inputEmail" name="userEmail" id="userEmail" aria-describedby="emailHelp" placeholder="name@sample.com" required>
                    <?= form_error('userEmail')?>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="mb-3">
                    <i class='bx bx-lock-alt icon'></i>
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" class="form-control inputPass" id="userPassword" required>
                </div>
                <a href="">Forgot Password?</a>
                <button type="submit" class="login-btn float-right" id="login-btn">Login</button>
            </form>
            <?= form_close();?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= base_url('assets/js/login.js')?>"></script>