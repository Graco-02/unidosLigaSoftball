<?php
	function get_posiciones(){
		$pos = 0;
		$colum;
		$id;
		$titulo;
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,nombre,siglas FROM posiciones"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
         		$id = $row["id"];
         		$titulo = $row["nombre"];
         		$siglas = $row["siglas"];
			    echo "<option value='$id' >$siglas</option>";
             }			 
         }
		 
         $conn->close();
	}
	
?>