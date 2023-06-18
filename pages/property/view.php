<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>
<div class="col-md-10 table-responsive p-3">
<?php 
    $sql = "SELECT * FROM land_agent_property_view
    JOIN area ON land_agent_property_view.property_location = area.area_id "; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class='table table-light align-middle text-center table-bordered'>
            <thead>
                <tr> 
                    <th>Apartment Name</th> 
                    <th>Apartment Location</th>
                    <th>Apartment Cost</th>
                    <th>Assaingend Agent</th>
                    <th>Agent Contact</th>
                </tr>
            </thead>
       <?php while ($row = $result->fetch_assoc()) {?>
            <tbody>
            <tr>
                <td><?=$row['property_name']?></td>
                <td><?=$row['area_name']?></td>
                <td><?=$row['property_cost']?></td>
                <td><?=$row['land_agent_name']?></td>
                <td><?=$row['land_agent_contact']?></td>    
            <tr>
            
            
            </tbody>
            <?php }?>
        </table>
        <?php }
                
        ?>