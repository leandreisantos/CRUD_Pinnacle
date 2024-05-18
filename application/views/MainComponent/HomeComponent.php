<div class="home-body">
   <nav class="sidebar">
      <header>
         <div class="image-text">
            <div class="logo-container">
               <h4><?=$aliasName?></h4>
            </div>
            <div class="text header-text">
               <span class="name"><?=$user_role?></span>
               <span class="profession"><?=$user_position?></span>
            </div>
            <i class="bx bx-chevron-right toggle"></i>
         </div>
      </header>
      <div class="menu-bar">
         <div class="menu">
            <li class="search-box">
               <i class='bx bx-search-alt-2 icon' ></i>
               <input type="search" placeholder="Search...." id="nav-search">
            </li>
            <ul class="menu-links" id="menu-links">
               <li class="navlink dashboard" title="Dashboard" id="navlink">
                  <a href="#" class="active">
                  <i class='bx bx-home icon'></i>
                  <span class="text nav-text">Dashboard</span>
                  </a>
               </li>
               <li class="navlink view-profile" title="Profile" id="navlink">
                  <a href="" class="profile">
                  <i class='bx bx-user icon'></i>
                  <span class="text nav-text">Profile</span>
                  </a>
               </li>
               <li class="navlink view-notification" title="notification" id="navlink">
                  <a href="" class="notification">
                     <i class='bx bx-bell icon'></i>
                     <span class="text nav-text">
                        Notification
                     </span>
                  </a>
               </li>
               <li class="navlink show-time-logs" title="Time logs">
                  <a href="#">
                  <i class='bx bx-calendar icon'></i>
                  <span class="text nav-text">Time Logs</span>
                  </a>
               </li>
               <?=$showUnderEmpBtn?>
               <br>
               <?=$ManagementSettings?>
            </ul>
         </div>
         <div class="bottom-content">
            <li class="" title="logout" data-bs-toggle="modal" data-bs-target="#logoutModal">
               <a href="#">
               <i class='bx bx-log-out icon'></i>
               <span class="text nav-text">Logout</span>
               </a>
            </li>
         </div>
      </div>
   </nav>
   <!-- Modal -->
   <div class="modal fade logoutModal" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <!-- <div class="modal-header">
               <h5 class="modal-title" id="logoutModalLabel">Are you sure you want to log out?</h5>
               <i class='bx bx-x btn-close' data-bs-dismiss="modal" aria-label="Close"></i>
               </div> -->
            <div class="modal-body">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-2">
                        <i class='bx bx-error icon' style='color:#fb0000'></i>
                     </div>
                     <div class="col-lg-10">
                        <h5>Logging out</h5>
                        <p>Are you sure you want to log out?</p>
                        <button type="button" class="btn btn-outline-danger float-right modal-logout">Logout</button>
                        <button type="button" class="btn float-right modal-cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- <div class="modal-footer">
               <button type="button" class="btn btn-outline-danger">Logout</button>
               </div> -->
         </div>
      </div>
   </div>
   <section class="home">
      <div class="container-fluid home-wrapper">
         <div class="row">
            <div class="col-lg-6">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-12 welcome-container shadow-lg">
                        <div class="container wrapper">
                           <div class="row">
                              <div class="col-lg-6">
                                 <h1>Welcome <span><?=$user_role?><span></h1>
                                 <p class="intro"><?=$user_position?> in <?=$user_department?></p>
                              </div>
                              <div class="col-lg-6 wave-icon">
                                 <span style='font-size:70px;'>&#128075;</span>
                              </div>
                              <div class="col-lg-12 container-logBtn p-0 mt-3">
                                 <?=$ButtonTimeLog?>
                              </div>
                              <div class="col-lg-12">
                                 <div class="container-fluid">
                                    <div class="row">
                                       <div class="col-lg-6"></div>
                                       <div class="col-lg-6">
                                          <p class="time-title">Latest time log:</p>
                                          <p class="time-in"><?=$currentTimeIn?></p>
                                          <p class="time-out"><?=$currentTimeOut?></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- <div class="col-lg-12">
                                 <div class="date-time-formate">
                                 <div class="day-text-formate">TODAY</div>
                                 <div class="date-time-value">
                                   <div class="time-formate">02:51:20</div>
                                   <div class="date-formate">23 - july - 2022</div>
                                 </div>
                                 </div>
                                 </div> -->
                           </div>
                        </div>
                     </div>
                     <div class="col-12 bg-dark mt-2 timelog-table-wrapper wrapper-time-log shadow-lg">
                        <div class="container-fluid p-3">
                           <div class="row">
                              <div class="col-12">
                                 <i class='bx bx-calendar icon float-right'></i>
                                 <h3 class="title">Time Logs</h3>
                              </div>
                           </div>
                        </div>
                        <div class="table table-responsive-sm table-hover table-dark ">
                           <table class="table table-dark">
                              <thead>
                                 <tr>
                                    <th scope="col">Log Id</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time In</th>
                                    <th scope="col">Time Out</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach($timeLogs as $timelog):?>
                                 <tr>
                                    <th scope="row"><?=$timelog->logId?></th>
                                    <td><?= substr($timelog->timeIn,0,10)?></td>
                                    <td><?=substr($timelog->timeIn,10)?></td>
                                    <td>
                                       <?php
                                          if($timelog->timeOut == "0000-00-00 00:00:00")
                                          {
                                            echo "No yet time out";
                                          }
                                          else{
                                            echo substr($timelog->timeOut,10);
                                          }
                                          ?>
                                    </td>
                                 </tr>
                                 <?php endforeach;?>
                              </tbody>
                           </table>
                           <span class="timelogs-see-more">See more<i class='bx bx-chevron-right icon'></i></span>
                        </div>
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-lg-12">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-5 ml-1 date-container">
               <div class="row">
                  <div class="col-12 container-time shadow-lg mt-1">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-5 d-flex align-items-center">
                              <div class="day-text-formate">TODAY</div>
                           </div>
                           <div class="col-6 d-flex align-items-center">
                              <div class="date-time-value">
                                 <div class="time-formate">02:51:20</div>
                                 <div class="date-formate">23 - july - 2022</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 mt-2 announcment-container">
                     <div class="container-fluid p-3 content-wrapper">
                        <div class="row">
                           <div class="col-lg-12 title">
                              <i class='bi bi-megaphone icon float-right'></i>
                              <h4>Announcement</h4>
                              <hr>
                           </div>
                           <div class="col-lg-12">
                              <ul class="list-group list-group-flush list">
                                 <li class="list-group-item">
                                    <i class='bx bx-cake icon'></i>
                                    No Birthday Today
                                 </li>
                                 <li class="list-group-item">
                                    <i class='bx bx-party' ></i>
                                    Pinnacle celebration
                                 </li>
                                 <li class="list-group-item">
                                    <i class='bx bx-briefcase' ></i>
                                    You are working from home
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <!-- <div class="container-btn-announce">
                           <--?=$SetAnnounceMent?>
                           </div> -->
                     </div>
                  </div>
                  <div class="col-lg-12 p-4 mt-2 container-notification-dash">
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
         </div>
      </div>
   </section>
   <div class="alert alert-success fade" id="myAlert">
      <strong>Success!</strong> You are successfully time in.
   </div>
   <div class="alert alert-danger fade" id="timeOut">
      <strong>Success!</strong> You are successfully time out.
   </div>
   <div class="contianer" style="display: none;">
      <div class="calendar shadow-lg">
         <div class="calendar-header">
            <span class="month-picker" id="month-picker"> May </span>
            <div class="year-picker" id="year-picker">
               <span class="year-change" id="pre-year">
                  <pre><</pre>
               </span>
               <span id="year">2020 </span>
               <span class="year-change" id="next-year">
                  <pre>></pre>
               </span>
            </div>
         </div>
         <div class="calendar-body">
            <div class="calendar-week-days">
               <div>Sun</div>
               <div>Mon</div>
               <div>Tue</div>
               <div>Wed</div>
               <div>Thu</div>
               <div>Fri</div>
               <div>Sat</div>
            </div>
            <div class="calendar-days">
            </div>
         </div>
         <div class="month-list"></div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?=base_url('assets/js/home.js')?>"></script>
<script src="<?=base_url('assets/js/tableManagement.js')?>"></script>