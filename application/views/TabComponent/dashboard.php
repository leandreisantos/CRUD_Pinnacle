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
                           <div class="col-4 d-flex align-items-center">
                              <div class="day-text-formate">TODAY</div>
                           </div>
                           <div class="col-5 d-flex align-items-center">
                              <div class="date-time-value">
                                 <div class="time-formate">02:51:20</div>
                                 <div class="date-formate">23 - july - 2022</div>
                              </div>
                           </div>
                           <div class="col-3 d-flex justify-content-end align-items-center show-more-date">
                              <button class="btn btn-primary" title="Show Calendar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class='bx bxs-chevron-right icon'></i></button>
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
