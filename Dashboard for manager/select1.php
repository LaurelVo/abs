<?php  
 $connect = mysqli_connect("localhost", "root", "", "system_manager");  
 $output = '';  
 $sql = "SELECT * FROM house_list ORDER BY house_id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="housetable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">House Id</th>  
                     <th width="25%">Owner</th>  
                     <th width="25%">Location</th>  
                     <th width="25%">Status</th>  
                     <th width="10%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM house_list LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["house_id"].'</td>  
                     <td class="owner" data-id1="'.$row["house_id"].'" contenteditable>'.$row["owner"].'</td>  
                     <td class="location" data-id2="'.$row["house_id"].'" contenteditable>'.$row["location"].'</td>  
                     <td class="status" data-id3="'.$row["house_id"].'" contenteditable>'.$row["status"].'</td> 
                     <td><button type="button" name="delete_btn" data-id4="'.$row["house_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="owner" contenteditable></td>  
                <td id="location" contenteditable></td> 
                <td id="status" contenteditable></td>
                <td><button type="button" name="btn_add1" id="btn_add1" class="btn btn-xs btn-success">+</button></td>  
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