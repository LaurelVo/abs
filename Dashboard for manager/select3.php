<?php  
 $connect = mysqli_connect("localhost", "root", "", "system_manager");  
 $output = '';  
 $sql = "SELECT * FROM user_list ORDER BY user_id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="usertable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">User Id</th>  
                     <th width="25%">Name</th>  
                     <th width="25%">Access Level</th>  
                     <th width="25%">Personal Info</th>  
                     <th width="10%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM user_list LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["user_id"].'</td>  
                     <td class="name" data-id1="'.$row["user_id"].'" contenteditable>'.$row["name"].'</td>  
                     <td class="access" data-id2="'.$row["user_id"].'" contenteditable>'.$row["access"].'</td>  
                     <td class="info" data-id3="'.$row["user_id"].'" contenteditable>'.$row["info"].'</td> 
                     <td><button type="button" name="delete_btn" data-id6="'.$row["user_id"].'" class="btn btn-xs btn-danger btn_delete_user">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="name" contenteditable></td>  
                <td id="access" contenteditable></td> 
                <td id="info" contenteditable></td>
                <td><button type="button" name="btn_add3" id="btn_add3" class="btn btn-xs btn-success">+</button></td>  
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