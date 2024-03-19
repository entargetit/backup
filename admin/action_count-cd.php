<?php
@session_start();
$constant_url = $_SERVER['DOCUMENT_ROOT'] . "/functions/constants.php";
include_once($constant_url);

include(DATABASE_URL);
$db=new Database();


if(!empty($_POST['x_data']))
{
$m_data=$_POST['x_data'];
if($m_data==1)
{
$taday_mx=date('Y-m-d');
 $query_spe="SELECT emp_name,SUM(request) as rqt,SUM(served) as ser,SUM(submitable) as subtbl,SUM(end_client) as endclt,SUM(user_interview) as userintw,SUM(joining) as joiner FROM new_report where emp_name <> '' Group By emp_name";
        $run_spe=$db->select($query_spe);
        while($row_spe=$run_spe->fetch_assoc())
        {
            ?>
        <tr>
        <td><div><?php echo $row_spe['emp_name']?></div></td>
        <td><div class="new-class btn"><?php echo $row_spe['rqt']?></div></td>
         <td><div class="new-class btn"><?php echo $row_spe['ser']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['ser']/$row_spe['rqt'])*100,2); }else{ echo 0; } ?> %</div></td>
       
        <td><div class="new-class btn"><?php echo $row_spe['subtbl']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['subtbl']/$row_spe['rqt'])*100,2); }else{ echo 0; }?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['endclt']?></div><div class="new-class1 btn"><?php if($row_spe['subtbl']!=0) { echo number_format(($row_spe['endclt']/$row_spe['subtbl'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['userintw']?></div><div class="new-class1 btn"><?php if($row_spe['endclt']!=0) { echo number_format(($row_spe['userintw']/$row_spe['endclt'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['joiner']?></div><div class="new-class1 btn"><?php if($row_spe['userintw']!=0) { echo number_format(($row_spe['joiner']/$row_spe['userintw'])*100,2);  }else{ echo 0; }?> %</div></td>
        
      </tr>
        <?php    
        }

} 
else if($m_data==2)
{
$taday_mx=date('Y-m-d');
$query_spe="SELECT emp_name,SUM(request) as rqt,SUM(served) as ser,SUM(submitable) as subtbl,SUM(end_client) as endclt,SUM(user_interview) as userintw,SUM(joining) as joiner FROM new_report where emp_name <> '' AND created_date LIKE '%".$taday_mx."%' Group By emp_name";
        $run_spe=$db->select($query_spe);
        while($row_spe=$run_spe->fetch_assoc())
        {
            ?>
       <tr>
        <td><div><?php echo $row_spe['emp_name']?></div></td>
        <td><div class="new-class btn"><?php echo $row_spe['rqt']?></div></td>
         <td><div class="new-class btn"><?php echo $row_spe['ser']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['ser']/$row_spe['rqt'])*100,2); }else{ echo 0; } ?> %</div></td>
       
        <td><div class="new-class btn"><?php echo $row_spe['subtbl']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['subtbl']/$row_spe['rqt'])*100,2); }else{ echo 0; }?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['endclt']?></div><div class="new-class1 btn"><?php if($row_spe['subtbl']!=0) { echo number_format(($row_spe['endclt']/$row_spe['subtbl'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['userintw']?></div><div class="new-class1 btn"><?php if($row_spe['endclt']!=0) { echo number_format(($row_spe['userintw']/$row_spe['endclt'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['joiner']?></div><div class="new-class1 btn"><?php if($row_spe['userintw']!=0) { echo number_format(($row_spe['joiner']/$row_spe['userintw'])*100,2);  }else{ echo 0; }?> %</div></td>
        
      </tr>
        <?php    
        }
 

} 
else if($m_data==3)
{
$taday_mx=date('Y-m-d');
$query_spe="SELECT emp_name,SUM(request) as rqt,SUM(served) as ser,SUM(submitable) as subtbl,SUM(end_client) as endclt,SUM(user_interview) as userintw,SUM(joining) as joiner FROM new_report where emp_name <> '' AND created_date between date_sub(now(),INTERVAL 7 DAY) and now() Group By emp_name";
        $run_spe=$db->select($query_spe);
        while($row_spe=$run_spe->fetch_assoc())
        {
            ?>
         <tr>
        <td><div><?php echo $row_spe['emp_name']?></div></td>
        <td><div class="new-class btn"><?php echo $row_spe['rqt']?></div></td>
         <td><div class="new-class btn"><?php echo $row_spe['ser']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['ser']/$row_spe['rqt'])*100,2); }else{ echo 0; } ?> %</div></td>
       
        <td><div class="new-class btn"><?php echo $row_spe['subtbl']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['subtbl']/$row_spe['rqt'])*100,2); }else{ echo 0; }?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['endclt']?></div><div class="new-class1 btn"><?php if($row_spe['subtbl']!=0) { echo number_format(($row_spe['endclt']/$row_spe['subtbl'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['userintw']?></div><div class="new-class1 btn"><?php if($row_spe['endclt']!=0) { echo number_format(($row_spe['userintw']/$row_spe['endclt'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['joiner']?></div><div class="new-class1 btn"><?php if($row_spe['userintw']!=0) { echo number_format(($row_spe['joiner']/$row_spe['userintw'])*100,2);  }else{ echo 0; }?> %</div></td>
        
      </tr>
        <?php    
        }
 

} 
else if($m_data==4)
{
 $query_spe="SELECT emp_name,SUM(request) as rqt,SUM(served) as ser,SUM(submitable) as subtbl,SUM(end_client) as endclt,SUM(user_interview) as userintw,SUM(joining) as joiner FROM new_report where emp_name <> '' AND created_date between date_sub(now(),INTERVAL 30 DAY) and now() Group By emp_name";
        $run_spe=$db->select($query_spe);
        while($row_spe=$run_spe->fetch_assoc())
        {
            ?>
       <tr>
        <td><div><?php echo $row_spe['emp_name']?></div></td>
        <td><div class="new-class btn"><?php echo $row_spe['rqt']?></div></td>
        <td><div class="new-class btn"><?php echo $row_spe['ser']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['ser']/$row_spe['rqt'])*100,2); }else{ echo 0; } ?> %</div></td>
        
        <td><div class="new-class btn"><?php echo $row_spe['subtbl']?></div><div class="new-class1 btn"><?php if($row_spe['rqt']!=0) { echo number_format(($row_spe['subtbl']/$row_spe['rqt'])*100,2); }else{ echo 0; }?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['endclt']?></div><div class="new-class1 btn"><?php if($row_spe['subtbl']!=0) { echo number_format(($row_spe['endclt']/$row_spe['subtbl'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['userintw']?></div><div class="new-class1 btn"><?php if($row_spe['endclt']!=0) { echo number_format(($row_spe['userintw']/$row_spe['endclt'])*100,2); }else{ echo 0; } ?> %</div></td>
        <td><div class="new-class btn"><?php echo $row_spe['joiner']?></div><div class="new-class1 btn"><?php if($row_spe['userintw']!=0) { echo number_format(($row_spe['joiner']/$row_spe['userintw'])*100,2);  }else{ echo 0; }?> %</div></td>
        
      </tr>
        <?php    
        }

} 


}





?>