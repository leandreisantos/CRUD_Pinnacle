<div class="container-fluid p-3">
            <div class="row">
              <div class="col">
                <h6 class="month_year"><?=$currentMonth." ".$currentYear ?></h6>
              </div>
              <div class="col">          
                  <i class='bx bx-caret-up-circle calendar-icon float-end'></i>     
                  <i class='bx bx-caret-down-circle calendar-icon float-end'></i>
              </div>
            </div>
          </div>
          <div class="container-fluid p-3">
             <div class="row">
              <div class="col">
                Su
              </div>
              <div class="col">
                Mo
              </div>
              <div class="col">
                Tu
              </div>
              <div class="col">
                Wed
              </div>
              <div class="col">
                Th
              </div>
              <div class="col">
                Fri
              </div>
              <div class="col">
                Sa
              </div>
             </div>
             <div class="row">
             <?php
                foreach($dayInMonth as $day){
                    echo (($currentDay == $day) ? "<div class='col col-wrap current-day'>$day</div>": "<div class='col col-wrap'>$day</div>");
                }
             ?>
             </div>
          </div>
          <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-2">
                    <h2>TODO</h2>
                </div>
                <div class="col-12">
                    <div class="todo-table table-responsive p-3">
                        <table class="table">
                            <tr>
                                <td>Birthday</td>
                            </tr>
                            <tr>
                                <td>Event</td>
                            </tr>
                            <tr>
                                <td>Onsite</td>
                            </tr>
                            <tr>
                                <td>Work From Home</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 add-todo-con">
                <i class='bx bx-plus-circle add-todo float-end'></i>
                </div>
            </div>
          </div>