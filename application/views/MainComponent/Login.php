<div class="container-fluid container-login">
    <div class="row row-login">
        <div class="col-lg-6 col-md-6 intro-login">
            <h1><span>Welcome</span> sign in to website.</h1>
            <p>Welcome to my platform! We're thrilled to have you here. Please enter your credentials below to access your account.</p>
        </div>
        <div class="col-lg-6 col-md-6 login-panel shadow-lg"> 
        <?=validation_errors();?>
               <?= form_open('login/processLogin');?>
                <form>
                <div class="mb-3 mt-3">
                    <i class='bx bx-user-circle icon'></i>
                    <label for="userEmail" class="form-label">Email address</label>
                    <div class="input-container">
                        <input type="email" class="form-control inputEmail" name="userEmail" id="userEmail" aria-describedby="emailHelp" required>
                        <i class='bx bx-error email-icon-error visually-hidden'></i>
                        <p class="error-message-email p-1 visually-hidden">Please enter valid email</p>
                    </div>
                </div>
                <div class="mb-3">
                    <i class='bx bx-lock-alt icon'></i>
                    <label for="userPassword" class="form-label">Password</label>
                    <div class="input-container">
                        <input type="password" class="form-control inputPass" id="userPassword" required>
                        <i class='bx bx-error pass-icon-error visually-hidden'></i>
                        <p class="error-message-pass p-1 visually-hidden">Password not match</p>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="">Forgot Password?</a>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button type="submit" class="login-btn float-right" id="login-btn" title="Login your credential">Login</button>
                        </div>
                    </div>
                </div>
            </form>
            <?= form_close();?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= base_url('assets/js/login.js')?>"></script>