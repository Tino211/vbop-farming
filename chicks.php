<!DOCTYPE html>
<html lang="en">
<body>
 <div class="container">
   <div class="card mt-2 mb-2">
      <div class="card-body">
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;" >
<thead>
  
		<tr>
      
			<th width="8%"> Date</th>
			<th width="7%"> Age_in_days</th>
			<th width="7%"> Day_mortality </th>
			<th width="7%">Night_mortality</th>
			<th width="7%"> Total_mortality </th>
      <th width="7%"> Cummulative_mortality_% </th>
      <th width="7%"> Standard_mortality_% </th>
      <th width="7%"> Sales </th>
      <th width="7%"> No_remaining </th>
      <th width="7%"> Target_weight</th>
      <th width="7%"> Actual_weight </th>
      <th width="7%"> Av_Daily_Gain </th>
      <th width="7%"> Feed_Used </th>
         
  </tr>
  
	</thead>

	
  <tbody>
	
  <?php      
             include 'config.php';
             $sql = "SELECT * FROM `report` ORDER BY date DESC";
             $res = mysqli_query($link, $sql);
             if (mysqli_num_rows($res) > 0){
              $i = 1;
              while ($row= mysqli_fetch_array($res)){
              
              
  ?>

		
                  <td> <?php echo $row['date']; ?>   </td>
                  <td>  <?php echo $row['age_in_days']; ?>  </td>
                  <td> <?php echo $row['day_mortality']; ?>   </td>
                  <td> <?php echo $row['night_mortality']; ?>   </td>
                  <td> <?php echo $row['total_mortality']; ?>   </td>
                  <td> <?php echo $row['cummulative_mortality_%']; ?>   </td>
                  <td> <?php echo $row['standard_mortality_%']; ?>   </td>
                  <td> <?php echo $row['sales']; ?>   </td>
                  <td> <?php echo $row['no_remaining']; ?>   </td>
                  <td> <?php echo $row['target_weight']; ?>   </td>
                  <td> <?php echo $row['actual_weight']; ?>   </td>
                  <td> <?php echo $row['av_daily_gain']; ?>   </td>
                  <td> <?php echo $row['feed_used']; ?>   </td>


                  <?php 
                  
                  
                         
              }

             }
             else{

              echo 'no data found';
             }
             ?>
    
              

            
                  
</tbody>

</table>

<div class="clearfix"></div>             


</div>
   </div>
 </div>



</body>
</html>





