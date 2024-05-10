<div class="container profile-container">
   <div class="row">
      <div class="col-lg-6">
         <div class="container-fluid">
            <div class="row">
               <div class="col-2 profile-logo">
                  <h1><?=$aliasName?></h1>
               </div>
               <div class="col-9">
                  <h1 class="userName"><?=$user->firstName.' '.$user->lastName?></h1>
                  <p><?=$user->position?> in <?=$user->department?></p>
                  <hr>
               </div>
               <div class="col-lg-12 profile-wrapper shadow-lg">
                  <i class='bx bx-edit icon-edit enable-edit' id="enable-edit" data-userid="<?=$userId?>" title="Edit information"></i>
                  <h4>General Information</h4>
                  <label for="firstName">FirstName:</label>
                  <br>
                  <input type="text" id="firstName" class="firstName" value="<?=$user->firstName?>" disabled required>
                  <label for="lastName">LastName:</label>
                  <br>
                  <input type="text" id="lastName" value="<?=$user->lastName?>" disabled required>
                  <label for="lastName">Pet:</label>
                  <br>
                  <input type="text" id="pet" value="<?=$user->pet?>" disabled required>
                  <label for="email">Email:</label>
                  <br>
                  <input type="text" id="email" value="<?=$user->email?>" disabled>
                  <label for="department">Department:</label>
                  <br>
                  <input type="text" value="<?=$user->department?>" disabled>
                  <label for="position">Position:</label>
                  <br>
                  <input type="text" value="<?=$user->position?>" disabled>
                  <div class="button-container"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6 p-4 mt-2 container-notification-dash">
            <div class="container-fluid notif-wrapper">
               <div class="row">
                  <div class="col-lg-12">
                     <h4><i class='bx bx-bell icon float-right'></i>Notification</h4>
                     <hr>
                  </div>
                  <div class="col-lg-12">
                     <div class="container-notif">
                        <ul>
                           <li>You password is already changed</li>
                           <li>Admin updated your email address</li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <span class="notif-see-more">See more <span class="right-logo">></span></span>
                  </div>
               </div>
            </div>
      </div>
   </div>
</div>
<!-- Alert -->
<div class="alert alert-success fade" id="myAlert">
   <strong>Success!</strong> Profile updated successfully.
</div>
<script src="<?=base_url('assets/js/profile.js')?>"></script>