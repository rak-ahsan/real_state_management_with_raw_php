<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
</head>
<div class="container-fluid d-flex justify-content-start gx-0 side rak">
    <div class="col-md-2 vh-100 text-white scrl" >
      <div class="side vh-100" style="background-color: #123456;">
      <?php if($_SESSION['role']==1) {?>
      <a class = " nav-link p-3 aborder" style = "border-top:1px solid white" href="../index/index.php"><i class="fa-solid fa-gauge fa-xl me-3" style="color: #fcfcfc;"></i>
                    Dashboard 
      </a>
      <?php } ?>
      <?php if($_SESSION['role']==1) {?>
      <a class = " nav-link p-3 aborder" id="agent" href="../agent/agentadd.php">
        <i class="fa-regular fa-user fa-xl me-3"></i>
               Add New Agent
      </a>
      <?php } ?>

      <?php if($_SESSION['role']==2) {?>
      <a class = " nav-link p-3 aborder" href="../agent/psagent.php"> 
        <i class="fa-solid fa-gauge fa-xl me-3"></i>Dashboard
      </a>
      <?php } ?>


      <a class = " nav-link p-3 aborder" href="../agent/agent.php"> 
        <i class="fa-solid fa-users-viewfinder fa-xl me-3"></i>View Agents
      </a>

      <a class = " nav-link p-3 aborder" href="#">
      <i class="fa-solid fa-money-bill-trend-up fa-xl me-3" style="color: #ffffff;"></i>
              Total Profit</a>
      <?php if($_SESSION['role']==2) {?>
      <a class = "nav-link p-3 aborder" href="../property/avaiablepro.php">
      <i class="fa-solid fa-warehouse fa-xl me-3" style="color: #ffffff;"></i>
                Avaiable Property
      </a>
      <?php } ?>
      <?php if($_SESSION['role']==2) {?>
      <a class = "nav-link p-3 aborder" href="../booking/adminbook.php">
      <i class="fa-solid fa-angles-right fa-xl me-3" style="color: #ffffff;"></i>
              Booking</a>
      <?php } ?>
      <a class = "nav-link p-3 aborder" href="../project/runningview.php">
      <i class="fa-solid fa-person-digging fa-xl me-3" style="color: #ffffff;"></i>Ongoing Project</a>
      <a class = "nav-link p-3 aborder" href="#">
        <i class="fa-solid fa-arrows-down-to-people fa-xl me-3" style="color: #ffffff;"></i>
            Total Agent
      </a>
      <a class = "nav-link p-3 aborder" href="../../logout.php">
      <i class="fa-solid fa-right-from-bracket fa-xl me-3" style="color: #ffffff;"></i>
      
      Log Out</a>
      </div>
    </div>