<?php  
 //include the file session.php
 include("./../utils/session.php");
 //include the file db_conn.php
 include("./../utils/db_conn.php");
 $output = '';  
 $sql = "SELECT * FROM reviews ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="reviewtable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Review Id</th>  
                     <th width="25%">Booking Id</th>  
                     <th width="25%">Rating</th>  
                     <th width="25%">Comment</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM reviews LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="booking_id" data-id1="'.$row["id"].'" contenteditable>'.$row["booking_id"].'</td>  
                     <td class="rating" data-id2="'.$row["id"].'" contenteditable>'.$row["rating"].'</td>  
                     <td class="comment" data-id3="'.$row["id"].'" contenteditable>'.$row["comment"].'</td> 
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="booking_id" contenteditable></td>  
                <td id="rating" contenteditable></td> 
                <td id="comment" contenteditable></td>
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