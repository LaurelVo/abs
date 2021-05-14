<?php  
 //include the file session.php
 include("./../utils/session.php");
 //include the file db_conn.php
 include("./../utils/db_conn.php");
 $output = '';  
 $sql = "SELECT * FROM accommodations ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="housetable">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">House Id</th>  
                     <th width="5%">Type</th>  
                     <th width="5%">Description</th>  
                     <th width="5%">Max Guests</th>
                     <th width="5%">Total Rooms</th>
                     <th width="5%">Total Bathrooms</th>
                     <th width="5%">Address</th>
                     <th width="5%">Published At</th>
                     <th width="5%">Price Per Night</th>
                     <th width="5%">Created By</th>
                     <th width="5%">Updated At</th>
                     <th width="5%">House Name</th>
                     <th width="5%">City</th>
                     <th width="5%">Garage</th>
                     <th width="5%">Internet</th>
                     <th width="5%">Pet</th>
                     <th width="5%">Smoke</th>
                     <th width="5%">Owner Id</th>
                     <th width="5%">Image</th>
                     <th width="5%">Available from</th>
                     <th width="5%">Available to</th>
                     <th width="5%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM accommodations LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="type" data-id1="'.$row["id"].'" contenteditable>'.$row["type"].'</td>  
                     <td class="description" data-id2="'.$row["id"].'" contenteditable>'.$row["description"].'</td>  
                     <td class="max_guests" data-id3="'.$row["id"].'" contenteditable>'.$row["max_guests"].'</td> 
                     <td class="total_rooms" data-id4="'.$row["id"].'" contenteditable>'.$row["total_rooms"].'</td>  
                     <td class="total_bathrooms" data-id5="'.$row["id"].'" contenteditable>'.$row["total_bathrooms"].'</td>  
                     <td class="address" data-id6="'.$row["id"].'" contenteditable>'.$row["address"].'</td>  
                     <td class="published_at" data-id7="'.$row["id"].'" contenteditable>'.$row["published_at"].'</td>  
                     <td class="price_per_night" data-id8="'.$row["id"].'" contenteditable>'.$row["price_per_night"].'</td>  
                     <td class="created_at" data-id9="'.$row["id"].'" contenteditable>'.$row["created_at"].'</td>  
                     <td class="updated_at" data-id10="'.$row["id"].'" contenteditable>'.$row["updated_at"].'</td>  
                     <td class="house_name" data-id11="'.$row["id"].'" contenteditable>'.$row["house_name"].'</td>  
                     <td class="city" data-id12="'.$row["id"].'" contenteditable>'.$row["city"].'</td>  
                     <td class="has_garage" data-id13="'.$row["id"].'" contenteditable>'.$row["has_garage"].'</td>  
                     <td class="has_internet" data-id14="'.$row["id"].'" contenteditable>'.$row["has_internet"].'</td>  
                     <td class="allow_pet" data-id15="'.$row["id"].'" contenteditable>'.$row["allow_pet"].'</td>  
                     <td class="allow_smoke" data-id16="'.$row["id"].'" contenteditable>'.$row["allow_smoke"].'</td>  
                     <td class="owner_id" data-id17="'.$row["id"].'" contenteditable>'.$row["owner_id"].'</td>  
                     <td class="image_url" data-id18="'.$row["id"].'" contenteditable>'.$row["image_url"].'</td>  
                     <td class="available_from" data-id19="'.$row["id"].'" contenteditable>'.$row["available_from"].'</td>  
                     <td class="available_to" data-id20="'.$row["id"].'" contenteditable>'.$row["available_to"].'</td>  
                     <td><button type="button" name="delete_btn" data-id21="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete_accommodations">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="type" contenteditable></td>  
                <td id="description" contenteditable></td> 
                <td id="max_guests" contenteditable></td>
                <td id="total_rooms" contenteditable></td>  
                <td id="total_bathrooms" contenteditable></td>  
                <td id="address" contenteditable></td>  
                <td id="published_at" contenteditable></td>  
                <td id="price_per_night" contenteditable></td>  
                <td id="created_at" contenteditable></td>  
                <td id="updated_at" contenteditable></td>  
                <td id="house_name" contenteditable></td>  
                <td id="city" contenteditable></td>  
                <td id="has_garage" contenteditable></td>  
                <td id="has_internet" contenteditable></td>  
                <td id="allow_pet" contenteditable></td>  
                <td id="allow_smoke" contenteditable></td>  
                <td id="owner_id" contenteditable></td>  
                <td id="image_url" contenteditable></td>  
                <td id="available_from" contenteditable></td>  
                <td id="available_to" contenteditable></td>  
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