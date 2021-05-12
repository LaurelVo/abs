<?php  
 $connect = mysqli_connect("localhost", "root", "", "system_manager");  
 $output = '';  
 $sql = "SELECT * FROM review_list ORDER BY review_id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="reviewtable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Review Id</th>  
                     <th width="25%">Reviewer</th>  
                     <th width="25%">Review</th>  
                     <th width="25%">Rating</th>  
                     <th width="10%">Remove review</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM review_list LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["review_id"].'</td>  
                     <td class="reviewer" data-id1="'.$row["review_id"].'" contenteditable>'.$row["reviewer"].'</td>  
                     <td class="review" data-id2="'.$row["review_id"].'" contenteditable>'.$row["review"].'</td>  
                     <td class="rating" data-id3="'.$row["review_id"].'" contenteditable>'.$row["rating"].'</td> 
                     <td><button type="button" name="delete_btn" data-id7="'.$row["review_id"].'" class="btn btn-xs btn-danger btn_delete_review">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="name" contenteditable></td>  
                <td id="access" contenteditable></td> 
                <td id="info" contenteditable></td>
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