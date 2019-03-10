<?php
include "common.php ";
?>

<html>
<head>
<title>Chat Box</title>

<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>

function submitChat() {
	if(form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var c_id = <?php echo $_GET['id'];?>;
	var msg = form1.msg.value;
  var uname = form1.uname.value;
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg'&c_id='+c_id,true);
	xmlhttp.send();
	form1.msg.value = '';
}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	$( "#msg_area" ).keyup(function(e) {
		  var code = e.keyCode || e.which;
		 if(code == 13) { //Enter keycode
		   submitChat();
		 }
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>


</head>
<body>
<form name="form1">
Enter Your Chatname: <input type="text" name="uname" /> <br />
Your Message: <br />
<textarea id="msg_area" name="msg"></textarea><br />
<a href="#" onclick="submitChat()">Send</a><br /><br />
</form>
<div id="chatlogs">
LOADING CHATLOG...
</div>

</body>
