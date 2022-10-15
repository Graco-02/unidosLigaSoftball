<?php
	function get_jugadas(){
		$pos = 0;
		$colum;
		$id;
		$titulo;
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,tipo,jugada FROM jugadas"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
         		$id = $row["id"];
         		$tipo = $row["tipo"];
         		$jugada = $row["jugada"];
			    echo "<option value='$id' >$jugada</option>";
             }			 
         }
		 
         $conn->close();
	}
	
?>