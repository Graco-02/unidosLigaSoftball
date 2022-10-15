<?php
function conectar(){
    /*local*/ $servername = "localhost";
    $username = "root";
    $password = "0287";
    $dbname = "unidos";
  

  /*  $servername = "localhost";
    $username = "id17622284_graco";
    $password = "02Octubre1987**";
    $dbname = "id17622284_unidos";*/
  
	
	/*$servername = "localhost";
    $username = "root";
    $password = "0287";
    $dbname = "padron";*/
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        return $conn;
    }
}

?>