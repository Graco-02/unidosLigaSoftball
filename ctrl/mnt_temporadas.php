<?php

	function get_temporada_activa(){
		$id=0;
		$conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,conmemoracion,fecha_inicio,estado FROM temporadas where estado = 0"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
             $id = $row["id"];
             			 
         }
		 
         $conn->close();
		 
		 return $id;
	}
	
	function set_nueva_agenda($visitante,$home,$fecha,$hora,$temporada){
			     $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA AGENDA a la base de datos
            $sql="INSERT INTO agendados (id,visitante,home,fecha,hora,temporada) 
			VALUES (0,'$visitante','$home','$fecha','$hora','$temporada')";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;
			  alert("Juego agendado");
            //  header('location:index.php');			  
		    } else {
		   	 echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
	}
	
	
?>