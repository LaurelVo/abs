<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="system_manager.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script type="text/javascript" src="manage-table.js"></script>
    <title>Dashboard for System Manager</title>

</head>

<body>
    <div class="topbar">
        <a class="accommodation" a href="../index.php">Home</a>
        <!-- <a href="#user">Users</a>
        <a href="review">Reviews</a> -->
        <i class="fas fa-user-circle fa-2x"></i>
    </div>

    <h1>System Manager</h1>
    <h4 class="welcome">Welcome to System Manager</h4>
    <h4 class="overview">House Overview</h4>

    <div class="container1">  
            <br />  
            <br />
			<br />
			<div class="housetable">  
			<div id="live_data1"></div>                 
			</div>  
	</div>
    
    <h4 class="editacco">Booking Overview</h4>

    <div class="container2">  
            <br />  
            <br />
			<br />
			<div class="bookingtable">  
			<div id="live_data2"></div>                 
			</div>  
	</div>
    

    <h4 class="edituser">Users Overview</h4>

    <div class="container3">  
            <br />  
            <br />
			<br />
			<div class="usertable">  
			<div id="live_data3"></div>                 
			</div>  
	</div>

    <h4 class="reviewmana">Review Management</h4>

    <div class="container4">  
            <br />  
            <br />
			<br />
			<div class="reviewtable">  
			<div id="live_data4"></div>                 
			</div>  
	</div>
</body>
</html >

<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select1.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data1').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add1', function(){  
        var type = $('#type').text();  
        var description = $('#description').text(); 
        var max_guests = $('#max_guests').text();
        var total_rooms = $('#total_rooms').text();
        var total_bathrooms	 = $('#total_bathrooms').text();
        var address = $('#address').text();
        var published_at = $('#published_at').text();
        var price_per_night = $('#price_per_night').text();
        var created_at = $('#created_at').text();
        var updated_at = $('#updated_at').text();
        var house_name = $('#house_name').text();
        var city = $('#city').text();
        var has_garage = $('#has_garage').text();
        var has_internet = $('#has_internet').text();
        var allow_pet = $('#allow_pet').text();
        var allow_smoke = $('#allow_smoke').text();
        var owner_id = $('#owner_id').text();
        var image_url = $('#image_url').text();
        var available_from = $('#available_from').text();
        var available_to = $('#available_to').text();
        if(description == '')  
        {  
            alert("Enter Description");  
            return false;  
        }  
        if(address == '')  
        {  
            alert("Enter Address");  
            return false;  
        }  
        if(owner_id == '')  
        {  
            alert("Enter Owner Id");  
            return false;  
        }  
        $.ajax({  
            url:"insert1.php",  
            method:"POST",  
            data:{type:type, description:description, max_guests:max_guests, total_rooms:total_rooms, total_bathrooms:total_bathrooms, address:address, published_at:published_at, price_per_night:price_per_night, created_at:created_at, updated_at:updated_at, house_name:house_name, city:city, has_garage:has_garage, has_internet:has_internet, allow_pet:allow_pet, allow_smoke:allow_smoke, owner_id:owner_id, image_url:image_url, available_from:available_from, available_to:available_to},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit1.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
            }  
        });  
    }  
    $(document).on('blur', '.type', function(){  
        var id = $(this).data("id1");  
        var type = $(this).text();  
        edit_data(id, type, "type");  
    });  
    $(document).on('blur', '.description', function(){  
        var id = $(this).data("id2");  
        var description = $(this).text();  
        edit_data(id,description, "description");  
    });  
    $(document).on('blur', '.max_guests', function(){  
        var id = $(this).data("id3");  
        var max_guests = $(this).text();  
        edit_data(id, max_guests, "max_guests");  
    });  
    $(document).on('blur', '.total_rooms', function(){  
        var id = $(this).data("id4");  
        var total_rooms = $(this).text();  
        edit_data(id,total_rooms, "total_rooms");  
    });  
    $(document).on('blur', '.total_bathrooms', function(){  
        var id = $(this).data("id5");  
        var total_bathrooms = $(this).text();  
        edit_data(id,total_bathrooms, "total_bathrooms");  
    });  
    $(document).on('blur', '.address', function(){  
        var id = $(this).data("id6");  
        var address = $(this).text();  
        edit_data(id,address, "address");  
    });  
    $(document).on('blur', '.published_at', function(){  
        var id = $(this).data("id7");  
        var published_at = $(this).text();  
        edit_data(id,published_at, "published_at");  
    });  
    $(document).on('blur', '.price_per_night', function(){  
        var id = $(this).data("id8");  
        var price_per_night = $(this).text();  
        edit_data(id,price_per_night, "price_per_night");  
    });  
    $(document).on('blur', '.created_at', function(){  
        var id = $(this).data("id9");  
        var created_at = $(this).text();  
        edit_data(id,created_at, "created_at");  
    });  
    $(document).on('blur', '.updated_at', function(){  
        var id = $(this).data("id10");  
        var updated_at = $(this).text();  
        edit_data(id,updated_at, "updated_at");  
    });  
    $(document).on('blur', '.house_name', function(){  
        var id = $(this).data("id11");  
        var house_name = $(this).text();  
        edit_data(id,house_name, "house_name");  
    });  
    $(document).on('blur', '.city', function(){  
        var id = $(this).data("id12");  
        var city = $(this).text();  
        edit_data(id,city, "city");  
    });  
    $(document).on('blur', '.has_garage', function(){  
        var id = $(this).data("id13");  
        var has_garage = $(this).text();  
        edit_data(id,has_garage, "has_garage");  
    });  
    $(document).on('blur', '.has_internet', function(){  
        var id = $(this).data("id14");  
        var has_internet = $(this).text();  
        edit_data(id,has_internet, "has_internet");  
    });  
    $(document).on('blur', '.allow_pet', function(){  
        var id = $(this).data("id15");  
        var allow_pet = $(this).text();  
        edit_data(id,allow_pet, "allow_pet");  
    });  
    $(document).on('blur', '.allow_smoke', function(){  
        var id = $(this).data("id16");  
        var allow_smoke = $(this).text();  
        edit_data(id,allow_smoke, "allow_smoke");  
    });  
    $(document).on('blur', '.owner_id', function(){  
        var id = $(this).data("id17");  
        var owner_id = $(this).text();  
        edit_data(id,owner_id, "owner_id");  
    });  
    $(document).on('blur', '.image_url', function(){  
        var id = $(this).data("id18");  
        var image_url = $(this).text();  
        edit_data(id,image_url, "image_url");  
    });  
    $(document).on('blur', '.available_from', function(){  
        var id = $(this).data("id19");  
        var available_from = $(this).text();  
        edit_data(id,available_from, "available_from");  
    });  
    $(document).on('blur', '.available_to', function(){  
        var id = $(this).data("id20");  
        var available_to = $(this).text();  
        edit_data(id,available_to, "available_to");  
    });  
    $(document).on('click', '.btn_delete_accommodations', function(){  
        var id=$(this).data("id21");  
        if(confirm("Please confirm you want to delete this house?"))  
        {  
            $.ajax({  
                url:"delete1.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>

<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select2.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data2').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add2', function(){  
        var user_id = $('#user_id').text();  
        var price = $('#price').text(); 
        var start_date = $('#start_date').text();
        var end_date = $('#end_date').text(); 
        var created_at = $('#created_at').text(); 
        var no_guests = $('#no_guests').text(); 
        var is_accepted = $('#is_accepted').text(); 
        var rejected_reason = $('#rejected_reason').text(); 
        var checkout_date = $('#checkout_date').text(); 
        if(user_id == '')  
        {  
            alert("Enter User Id");  
            return false;  
        }  
        if(is_accepted == '')  
        {  
            alert("Enter Status");  
            return false;  
        }  
        if(rejected_reason == '')  
        {  
            alert("Enter Rejected Reason");  
            return false;  
        }  
        $.ajax({  
            url:"insert2.php",  
            method:"POST",  
            data:{user_id:user_id, price:price, start_date:start_date, end_date:end_date, created_at:created_at, no_guests:no_guests, is_accepted:is_accepted, rejected_reason:rejected_reason, checkout_date:checkout_date},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit2.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
            }  
        });  
    }  
    $(document).on('blur', '.user_id', function(){  
        var id = $(this).data("id1");  
        var user_id = $(this).text();  
        edit_data(id, user_id, "user_id");  
    });  
    $(document).on('blur', '.price', function(){  
        var id = $(this).data("id2");  
        var price = $(this).text();  
        edit_data(id,price, "price");  
    });  
    $(document).on('blur', '.start_date', function(){  
        var id = $(this).data("id3");  
        var start_date = $(this).text();  
        edit_data(id, start_date, "start_date");  
    });  
    $(document).on('blur', '.end_date', function(){  
        var id = $(this).data("id4");  
        var end_date = $(this).text();  
        edit_data(id,end_date, "end_date");  
    });  
    $(document).on('blur', '.created_at', function(){  
        var id = $(this).data("id5");  
        var created_at = $(this).text();  
        edit_data(id,created_at, "created_at");  
    });  
    $(document).on('blur', '.no_guests', function(){  
        var id = $(this).data("id6");  
        var no_guests = $(this).text();  
        edit_data(id,no_guests, "no_guests");  
    });  
    $(document).on('blur', '.is_accepted', function(){  
        var id = $(this).data("id7");  
        var is_accepted = $(this).text();  
        edit_data(id,is_accepted, "is_accepted");  
    });  
    $(document).on('blur', '.rejected_reason', function(){  
        var id = $(this).data("id8");  
        var rejected_reason = $(this).text();  
        edit_data(id,rejected_reason, "rejected_reason");  
    });  
    $(document).on('blur', '.checkout_date', function(){  
        var id = $(this).data("id9");  
        var checkout_date = $(this).text();  
        edit_data(id,checkout_date, "checkout_date");  
    });  
    $(document).on('click', '.btn_cancel', function(){  
        var id=$(this).data("id22");  
        if(confirm("Please confirm you want to cancel this booking?"))  
        {  
            $.ajax({  
                url:"delete2.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>

<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select3.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data3').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add3', function(){  
        var first_name = $('#first_name').text();  
        var last_name = $('#last_name').text(); 
        var mobile = $('#mobile').text();
        var email = $('#email').text(); 
        var password = $('#password').text(); 
        var access_level = $('#access_level').text(); 
        var postal_address	 = $('#postal_address').text(); 
        var ABN = $('#ABN').text(); 
        if(first_name == '')  
        {  
            alert("Enter First Name");  
            return false;  
        }  
        if(password == '')  
        {  
            alert("Enter Password");  
            return false;  
        }  
        if(access_level == '')  
        {  
            alert("Enter Access Level");  
            return false;  
        }  
        $.ajax({  
            url:"insert3.php",  
            method:"POST",  
            data:{first_name:first_name, last_name:last_name, mobile:mobile, email:email, password:password, access_level:access_level, postal_address:postal_address, ABN:ABN},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit3.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
            }  
        });  
    }  
    $(document).on('blur', '.first_name', function(){  
        var id = $(this).data("id1");  
        var first_name = $(this).text();  
        edit_data(id, first_name, "first_name");  
    });  
    $(document).on('blur', '.last_name', function(){  
        var id = $(this).data("id2");  
        var last_name = $(this).text();  
        edit_data(id, last_name, "last_name");  
    });  
    $(document).on('blur', '.mobile', function(){  
        var id = $(this).data("id3");  
        var mobile = $(this).text();  
        edit_data(id, mobile, "mobile");  
    }); 
    $(document).on('blur', '.email', function(){  
        var id = $(this).data("id4");  
        var email = $(this).text();  
        edit_data(id, email, "email");  
    });  
    $(document).on('blur', '.password', function(){  
        var id = $(this).data("id5");  
        var password = $(this).text();  
        edit_data(id, password, "password");  
    });  
    $(document).on('blur', '.access_level', function(){  
        var id = $(this).data("id6");  
        var access_level = $(this).text();  
        edit_data(id, access_level, "access_level");  
    });  
    $(document).on('blur', '.postal_address', function(){  
        var id = $(this).data("id7");  
        var postal_address = $(this).text();  
        edit_data(id, postal_address, "postal_address");  
    });  
    $(document).on('blur', '.ABN', function(){  
        var id = $(this).data("id8");  
        var ABN = $(this).text();  
        edit_data(id, ABN, "ABN");  
    });  
    $(document).on('click', '.btn_delete_user', function(){  
        var id=$(this).data("id23");  
        if(confirm("Please confirm you want to delete this user?"))  
        {  
            $.ajax({  
                url:"delete3.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>

<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select4.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data4').html(data);  
            }  
        });  
    }  
    fetch_data();  
$(document).on('click', '.btn_delete_review', function(){  
        var id=$(this).data("id24");  
        if(confirm("Please confirm you want to delete this review?"))  
        {  
            $.ajax({  
                url:"delete4.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>