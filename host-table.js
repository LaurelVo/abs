function edit_row(no)
	{
	document.getElementById("edit_button" + no).style.display = "none";
	document.getElementById("save_button" + no).style.display = "block";

	var room = document.getElementById("room_row" + no);
	var status = document.getElementById("status_row" + no);
	var period = document.getElementById("period_row" + no);

	var room_data = room.innerHTML;
	var status_data = status.innerHTML;
	var period_data = period.innerHTML;

	room.innerHTML = "<input type='text' id='room_text" + no + "' value='" + room_data + "'>";
	status.innerHTML = "<input type='text' id='status_text" + no + "' value='" + status_data + "'>";
	period.innerHTML = "<input type='text' id='period_text" + no + "' value='" + period_data + "'>";
}

function save_row(no)
	{
	var room_val = document.getElementById("room_text" + no).value;
	var status_val = document.getElementById("status_text" + no).value;
	var period_val = document.getElementById("period_text" + no).value;

	document.getElementById("room_row" + no).innerHTML = room_val;
	document.getElementById("status_row" + no).innerHTML = status_val;
	document.getElementById("period_row" + no).innerHTML = period_val;

	document.getElementById("edit_button" + no).style.display = "block";
	document.getElementById("save_button" + no).style.display = "none";
}

function remove_row(no)
	{
	document.getElementById("row" + no + "").outerHTML = "";
}

function add_row()
	{
	var new_room = document.getElementById("new_room").value;
	var new_status = document.getElementById("new_status").value;
	var new_period = document.getElementById("new_period").value;

	var table = document.getElementById("table");
	var table_len = (table.rows.length) - 1;
	var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td id='room_row" + table_len + "'>" + new_room + "</td><td id='status_row" + table_len + "'>" + new_status + "</td><td id='period_row" + table_len + "'>" + new_period + "</td><td><input type='button' id='edit_button" + table_len + "' value='Edit' class='edit' onclick='edit_row(" + table_len + ")'> <input type='button' id='save_button" + table_len + "' value='Save' class='save' onclick='save_row(" + table_len + ")'> <input type='button' value='Delete' class='delete' onclick='delete_row(" + table_len + ")'></td></tr>";

	document.getElementById("new_room").value = "";
	document.getElementById("new_status").value = "";
	document.getElementById("new_period").value = "";
}

//Calculation for ratings----------------------------

function divideBy()
	{
	rating = document.getElementById("num1").value;
	review = document.getElementById("num2").value;

	document.getElementById("result").innerHTML = rating / review;
}


