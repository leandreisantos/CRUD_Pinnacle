<div class="container-fluid container-time-logs">
  <div class="row">
    <div class="col-lg-12 time-log-left">
      <h2>Welcome to your <span>Time logs</span>.</h2>
      <p>Your time logs provide detailed records of your start time and end time. </p>
    </div>
    <div class="col-lg-6 table-wrapper">
      <table class="table table-hover table-time-logs">
        <thead>
          <tr>
            <th scope="col">Log Id</th>
            <th scope="col">Date</th>
            <th scope="col">Time In</th>
            <th scope="col">Time Out</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($timelogs as $timelog): ?>
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
    </div>
    
  </div>
</div>
