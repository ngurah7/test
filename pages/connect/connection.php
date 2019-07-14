<?php 
		
		// database
        $server 	= 'localhost';
        $username 	= 'root';
        $pass		= '';
        $database 	= 'db_sports';
     	
     	// koneksi ke database
     	$connect = new PDO("mysql:host=$server;dbname=$database", $username, $pass);
     		     
 ?>