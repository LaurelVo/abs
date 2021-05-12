<?php  
 $connect = mysqli_connect("localhost", "root", "", "system_manager");  
 $output = '';  
 $sql = "SELECT * FROM booking_list ORDER BY booking_id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="bookingtable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Booking Id</th>  
                     <th width="25%">Stay Period</th>  
                     <th width="25%">Payment Status</th>  
                     <th width="25%">Contact Info</th>  
                     <th width="10%">Cancel</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM booking_list LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["booking_id"].'</td>  
                     <td class="stay_period" data-id1="'.$row["booking_id"].'" contenteditable>'.$row["stay_period"].'</td>  
                     <td class="payment" data-id2="'.$row["booking_id"].'" contenteditable>'.$row["payment"].'</td>  
                     <td class="contact" data-id3="'.$row["booking_id"].'" contenteditable>'.$row["contact"].'</td> 
                     <td><button type="button" name="cancel_btn" data-id5="'.$row["booking_id"].'" class="btn btn-xs btn-danger btn_cancel">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="stay_period" contenteditable></td>  
                <td id="payment" contenteditable></td> 
                <td id="contact" contenteditable></td>
                <td><button type="button" name="btn_add2" id="btn_add2" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>