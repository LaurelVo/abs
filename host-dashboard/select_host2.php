<?php  
 //include the file session.php
 include("./../utils/session.php");
 //include the file db_conn.php
 include("./../utils/db_conn.php");
 $output = '';  
 $sql = "SELECT * FROM bookings ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="bookingtable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Booking Id</th>  
                     <th width="10%">User Id</th>  
                     <th width="10%">Price</th>  
                     <th width="10%">Start Date</th> 
                     <th width="10%">End Date</th>
                     <th width="10%">Created At</th>
                     <th width="10%">Guests</th>
                     <th width="10%">Payment and Accept Status</th>
                     <th width="10%">Reject Reason</th>
                     <th width="10%">Check-out Date</th>
                     <th width="10%">Reject</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM bookings LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="user_id" data-id1="'.$row["id"].'" contenteditable>'.$row["user_id"].'</td>  
                     <td class="price" data-id2="'.$row["id"].'" contenteditable>'.$row["price"].'</td>  
                     <td class="start_date" data-id3="'.$row["id"].'" contenteditable>'.$row["start_date"].'</td>
                     <td class="end_date" data-id4="'.$row["id"].'" contenteditable>'.$row["end_date"].'</td>
                     <td class="created_at" data-id5="'.$row["id"].'" contenteditable>'.$row["created_at"].'</td>
                     <td class="no_guests" data-id6="'.$row["id"].'" contenteditable>'.$row["no_guests"].'</td>
                     <td class="is_accepted" data-id7="'.$row["id"].'" contenteditable>'.$row["is_accepted"].'</td>
                     <td class="rejected_reason" data-id8="'.$row["id"].'" contenteditable>'.$row["rejected_reason"].'</td>
                     <td class="checkout_date" data-id9="'.$row["id"].'" contenteditable>'.$row["checkout_date"].'</td>
                     <td><button type="button" name="cancel_btn" data-id22="'.$row["id"].'" class="btn btn-xs btn-danger btn_cancel">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="user_id" contenteditable></td>  
                <td id="price" contenteditable></td> 
                <td id="start_date" contenteditable></td>
                <td id="end_date" contenteditable></td>
                <td id="created_at" contenteditable></td>
                <td id="no_guests" contenteditable></td>
                <td id="is_accepted" contenteditable></td>
                <td id="rejected_reason" contenteditable></td>
                <td id="checkout_date" contenteditable></td>
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