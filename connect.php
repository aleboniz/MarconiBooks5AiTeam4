<?php

$connect = mysql_connect(“server_name”, “admin_name”, “password”); 
	if (!connect) { 
		die('Connection Failed: ' . mysql_error()); { 
		mysql_select_db(“book”, $connect); 
	}
$user_info = “INSERT INTO account (username, password) VALUES ('$_POST[username]', '$_POST[email]')”; 
	if (!mysql_query($user_info, $connect)) { 
		die('Error: ' . mysql_error()); 
	}

echo “Your information was added to the database.”;

mysql_close($connect); ?>

