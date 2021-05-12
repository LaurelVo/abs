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
        <a class="accommodation" a href="#accommodation">Accommodations</a>
        <a href="#user">Users</a>
        <a href="review">Reviews</a>
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
    

    <h4 class="edituser">Edit Users</h4>

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
        var owner = $('#owner').text();  
        var location = $('#location').text(); 
        var status = $('#status').text();
        if(owner == '')  
        {  
            alert("Enter Owner");  
            return false;  
        }  
        if(location == '')  
        {  
            alert("Enter Location");  
            return false;  
        }  
        if(status == '')  
        {  
            alert("Enter Status");  
            return false;  
        }  
        $.ajax({  
            url:"insert1.php",  
            method:"POST",  
            data:{owner:owner, location:location, status:status},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(house_id, text, column_name)  
    {  
        $.ajax({  
            url:"edit1.php",  
            method:"POST",  
            data:{house_id:house_id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
            }  
        });  
    }  
    $(document).on('blur', '.owner', function(){  
        var house_id = $(this).data("id1");  
        var owner = $(this).text();  
        edit_data(house_id, owner, "owner");  
    });  
    $(document).on('blur', '.location', function(){  
        var house_id = $(this).data("id2");  
        var location = $(this).text();  
        edit_data(house_id,location, "location");  
    });  
    $(document).on('blur', '.status', function(){  
        var house_id = $(this).data("id3");  
        var status = $(this).text();  
        edit_data(house_id, status, "status");  
    });  
    $(document).on('click', '.btn_delete', function(){  
        var house_id=$(this).data("id4");  
        if(confirm("Please confirm you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete1.php",  
                method:"POST",  
                data:{house_id:house_id},  
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
        var stay_period = $('#stay_period').text();  
        var payment = $('#payment').text(); 
        var contact = $('#contact').text();
        if(stay_period == '')  
        {  
            alert("Enter Stay Period");  
            return false;  
        }  
        if(payment == '')  
        {  
            alert("Enter Payment Status");  
            return false;  
        }  
        if(contact == '')  
        {  
            alert("Enter Contact Info");  
            return false;  
        }  
        $.ajax({  
            url:"insert2.php",  
            method:"POST",  
            data:{stay_period:stay_period, payment:payment, contact:contact},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(booking_id, text, column_name)  
    {  
        $.ajax({  
            url:"edit2.php",  
            method:"POST",  
            data:{booking_id:booking_id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
            }  
        });  
    }  
    $(document).on('blur', '.stay_period', function(){  
        var booking_id = $(this).data("id1");  
        var stay_period = $(this).text();  
        edit_data(booking_id, stay_period, "stay_period");  
    });  
    $(document).on('blur', '.payment', function(){  
        var booking_id = $(this).data("id2");  
        var payment = $(this).text();  
        edit_data(booking_id,payment, "payment");  
    });  
    $(document).on('blur', '.contact', function(){  
        var booking_id = $(this).data("id3");  
        var contact = $(this).text();  
        edit_data(booking_id, contact, "contact");  
    });  
    $(document).on('click', '.btn_cancel', function(){  
        var booking_id=$(this).data("id5");  
        if(confirm("Please confirm you want to cancel this booking?"))  
        {  
            $.ajax({  
                url:"delete2.php",  
                method:"POST",  
                data:{booking_id:booking_id},  
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
        var name = $('#name').text();  
        var access = $('#access').text(); 
        var info = $('#info').text();
        if(name == '')  
        {  
            alert("Enter Name");  
            return false;  
        }  
        if(access == '')  
        {  
            alert("Enter Access Level");  
            return false;  
        }  
        if(info == '')  
        {  
            alert("Enter Personal Info");  
            return false;  
        }  
        $.ajax({  
            url:"insert3.php",  
            method:"POST",  
            data:{name:name, access:access, info:info},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(user_id, text, column_name)  
    {  
        $.ajax({  
            url:"edit3.php",  
            method:"POST",  
            data:{user_id:user_id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
            }  
        });  
    }  
    $(document).on('blur', '.name', function(){  
        var user_id = $(this).data("id1");  
        var name = $(this).text();  
        edit_data(user_id, name, "name");  
    });  
    $(document).on('blur', '.access', function(){  
        var user_id = $(this).data("id2");  
        var access = $(this).text();  
        edit_data(user_id,access, "access");  
    });  
    $(document).on('blur', '.info', function(){  
        var user_id = $(this).data("id3");  
        var info = $(this).text();  
        edit_data(user_id, info, "info");  
    });  
    $(document).on('click', '.btn_delete_user', function(){  
        var user_id=$(this).data("id6");  
        if(confirm("Please confirm you want to delete this user?"))  
        {  
            $.ajax({  
                url:"delete3.php",  
                method:"POST",  
                data:{user_id:user_id},  
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
        var review_id=$(this).data("id7");  
        if(confirm("Please confirm you want to delete this review?"))  
        {  
            $.ajax({  
                url:"delete4.php",  
                method:"POST",  
                data:{review_id:review_id},  
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