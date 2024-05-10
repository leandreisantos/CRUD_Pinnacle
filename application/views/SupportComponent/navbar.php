<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-lg p-3">
  <a class="navbar-brand" href="#">TASK</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarText">
    <ul class="navbar-nav">
      <li class="nav-item m-2">
        <a class="nav-link active" href="<?= base_url('home')?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item sample m-2">
        <a class="nav-link" href="<--?=base_url('showTimeLogs')?>">Show time logs</a>
      </li> -->
      <li class="nav-item show-time-logs m-2">
        <a class="nav-link" href="#">Shows time logs</a>
      </li>
      <li class="nav-item m-2">
        <?=$showTableBtn?>
      </li>
      <li class="nav-item m-2">
        <a href="#" class="nav-link">Show table sample</a>
      </li>
      <li class="nav-item m-2">
        <?=$showUnderEmpBtn?>
      </li>
    </ul>
  </div>
  <button class="btn btn-outline-danger float-right logoutBtn" name="logout-btn" id="logout-btn">
        <a href="<?=base_url('logout')?>"><i class="bi bi-box-arrow-right"></i></a>
  </button>
</nav>  
