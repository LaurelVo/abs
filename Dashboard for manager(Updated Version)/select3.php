<?php  
 $connect = mysqli_connect("localhost", "root", "", "assignment2");  
 $output = '';  
 $sql = "SELECT * FROM users ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="usertable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">User Id</th>  
                     <th width="10%">First Name</th>  
                     <th width="10%">Last Name</th>  
                     <th width="10%">Mobile</th>
                     <th width="10%">Email</th>
                     <th width="10%">Password</th>
                     <th width="10%">Access Level</th>
                     <th width="10%">Postal Address</th>
                     <th width="10%">ABN</th>
                     <th width="10%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM users LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>  
                     <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["last_name"].'</td>  
                     <td class="mobile" data-id3="'.$row["id"].'" contenteditable>'.$row["mobile"].'</td> 
                     <td class="email" data-id4="'.$row["id"].'" contenteditable>'.$row["email"].'</td>  
                     <td class="password" data-id5="'.$row["id"].'" contenteditable>'.$row["password"].'</td>  
                     <td class="access_level" data-id6="'.$row["id"].'" contenteditable>'.$row["access_level"].'</td>  
                     <td class="postal_address" data-id7="'.$row["id"].'" contenteditable>'.$row["postal_address"].'</td>  
                     <td class="ABN" data-id8="'.$row["id"].'" contenteditable>'.$row["ABN"].'</td>  
                     <td><button type="button" name="delete_btn" data-id23="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete_user">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="first_name" contenteditable></td>  
                <td id="last_name" contenteditable></td> 
                <td id="mobile" contenteditable></td>
                <td id="email" contenteditable></td>
                <td id="password" contenteditable></td>
                <td id="access_level" contenteditable></td>
                <td id="postal_address" contenteditable></td>
                <td id="ABN" contenteditable></td>
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