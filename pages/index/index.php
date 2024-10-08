<?php include('../../includes/conf.php');
  get_header();
  get_side();
  agent();
?>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="../../dist/css/cus.css">
<div class="col-md-10 ">
        <div class="container bg-light d-flex rak">
            <div class="col-md-6">
            <i class="fa-solid fa-bounce fa-xl m-3" style="color: #2471A3 ;">
            <?php echo "welcome ".$_SESSION['username']?>
                    </i>
                
                <div class="p-3 d-flex flex-column">
                    <span>
                    <i class="fa-solid fa-chart-pie fa-bounce fa-2xl m-3" style="color: #ff8000;">
                        <span>50000</span>
                    </i>
                    </span>
                        <h4 class="pad ">Total Investment</h4>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end rak">
                <div class="p-3 d-flex flex-column">
                    <span>
                        <i class="fa-solid fa-dollar-sign fa-2xl m-3" style="color: #ff8000;"> <span>50124</span></i>
                    </span>
                    <h4 class="pad text-center">Total sales</h4>
                </div>
                <div class="p-3  d-flex flex-column">
                    <span>
                        <i class="fa-solid fa-arrow-trend-up fa-2xl m-3" style="color: #ff8000;">
                            <span style="color: #ff8000;">50124</span>
                        </i>
                    </span>
                    <h4 class="pad text-center">Total Profit</h4>
                </div>
                <div class="p-3 d-flex flex-column">
                    <span>
                        <i class="fa-solid fa-arrow-trend-down fa-2xl m-3" style="color: #ff8000;">
                            <span>50124</span>
                        </i>
                    </span>
                    <h4 class="pad text-center">Total loss</h4>
                </div>
            </div>
        </div>
        <div class="container d-flex bg-light rak">
            <div class="col-md-6 vh-80 p-3 table-responsive">
            <?php 
                $sql = "SELECT * FROM booking 
                natural JOIN booking_type 
                JOIN property ON property.property_id = booking.property_id
                JOIN payment ON payment.pay_id = booking.payment 
                ORDER BY date DESC
                limit 5
                
                "; 
                
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                ?>
                <table class="table text-center">
                    <thead>
                        <h3 class="text-center">Booking Lists</h3>
                        <th>Customar Name</th>
                        <th>Property Name</th>
                        <th>Booking Date</th>
                        <th>Payment</th>
                    </thead>
                    <tbody>
                <?php while ($row = $result->fetch_assoc()) {?>
                    
                        <tr>
                            <td><?=$row['bkng_name']?></td>
                            <td><?=$row['property_name']?></td>
                            <td><?=$row['date']?></td>
                            <td><?=$row['payname']?></td>
                        </tr>
                    </tbody>
                    <?php }?>
                </table>
                <?php }?>
            </div>
            <div class="col-md-6 d-flex mt-3  bg-light rak">
                <div class=" col-md-6  text-center p-3">
                    <div class="d1 bg-success con1">
                        <i class="fa-solid fa-users fa-xl m-3 text-light"></i>
                    </div>
                    <div class="d2">
                        <?php 
                            $sql = "SELECT COUNT(*) as total_rows FROM land_agent";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <h6>Total Agents: <?= $row['total_rows']?></h6>
                        <h6>Total Sold:</h6>
                    </div>
                    <div class="d1 bg-success con1">
                        <i class="fa-solid fa-users fa-xl m-3 text-light"></i>
                    </div>
                    <?php 
                            $sql = "SELECT COUNT(*) as total_rows FROM p_contactor";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                    ?>
                    <div class="d2">
                        <h6>Total Developer:<?= $row['total_rows']?></h6>
                        <h6>Under Construction:</h6>
                    </div>
                </div>
                <div class=" col-md-6  text-center p-3">
                    <div class="d1 bg-success con1">
                    <i class="fa-solid fa-person-digging fa-xl m-3" style="color: #ffffff;"></i>
                    </div>
                    <?php 
                            $sql = "SELECT COUNT(*) as total_rows FROM project where ps_id =1 ";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();

                            $sqls="SELECT COUNT(*) as total_rowss FROM project where ps_id =3 ";
                            $results = $conn->query($sqls);
                            $rows = $results->fetch_assoc();
                    ?>
                    <div class="d2">
                        <h6>Ongoing Project: <?=$row['total_rows']?></h6>
                        <h6>Compeleted Project: <?=$rows['total_rowss']?> </h6>
                    </div>
                    <div class="d1 bg-success con1">
                    <i class="fa-solid fa-building fa-xl m-3" style="color: #ffffff;"></i>
                    </div>
                    <div class="d2">
                        <h6>Total Developer:</h6>
                        <h6>Total Developer:</h6>
                    </div>
                </div>
            </div>
            
        </div> 
        <div class="container bg-light">
            <div class="row p-3">
            <div class="col-md-6 vh-50">
                
                <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Running',     <?php echo "55"?>],
                        ['Onhold',      <?php echo "66"?>],
                        ['Compelete',  2],
                        ]);

                        var options = {
                        title: 'Ongoing Project Status',
                        is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                </script>
                <h3 class="text-center">Ongoing Project Status</h3>
                    <div id="piechart_3d" class="p-3 vh-25" ></div>
            </div>
                <div class="col-md-6 vh-80 p-3 table-responsive">
                        <?php 
                            $sql = "SELECT *, DATEDIFF(CURDATE(), project.date_column) AS days_gone,
                            PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM CURDATE()), EXTRACT(YEAR_MONTH FROM project.date_column)) AS months_gone,
                            FLOOR(DATEDIFF(CURDATE(), project.date_column) / 365) AS years_gone
                            FROM project
                            JOIN project_status ON project.ps_id = project_status.ps_id
                            JOIN p_contactor ON project.pc_id = p_contactor.land_agent_id
                            JOIN area ON project.project_location = area.area_id
                            WHERE project_status.ps_id = 1
                            limit 5
                            ";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        ?>
                            <table class='table table-light align-middle text-center table-bordered'>
                                <thead>
                                <h3 class="text-center">Ongoing Projects</h3>
                                    <tr> 
                                        <th> Name</th> 
                                        <!-- <th> Location</th>
                                        <th> Buget</th> -->
                                        <th> Spend</th>
                                        <th>Contactor</th>
                                        <th>Status</th>
                                        <th>Running Time</th>
                                    </tr>
                                </thead>
                        <?php while ($row = $result->fetch_assoc()) {?>
                                <tbody>
                                <tr>
                                    <td><?=$row['project_name']?></td>
                                    <!-- <td><?=$row['area_name']?></td>
                                    <td><?=$row['project_price']?></td> -->
                                    <td><?=$row['spened']?></td>
                                    <td><?=$row['land_agent_name']?></td>
                                    <td><?=$row['p_status']?></td>
                                    <td><?=$row['days_gone']?> Days /
                                        <?=$row['months_gone']?> Months/
                                        <?=$row['years_gone']?> Years 
                                    </td>
                                <tr>        
                                </tbody>
                                <?php }?>
                            </table>
                            <?php } ?>
                        </div>
                        </div>
            </div>
        </div>
    
