<?php
    //include 'mnt_equipos.php';
	
	
	function get_lista_jugadores(){
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,id_persona,id_posicion_primaria,id_posicion_secundaria,id_equipo FROM jugadores"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
         		$id = $row["id"];
         		$id_persona = $row["id_persona"];
         		$id_equipo = $row["id_equipo"];
				$equipo_nombre = get_equipo($id_equipo);
				list ($nombres,$apellidos,$numdoc) = get_persona($id_persona);
				
			    echo "<tr>";
			    echo "<td><a href='index.php'>$nombres.','.$apellidos</a></td>";
			    echo "<td>$numdoc</td>";
			    echo "<td>$id</td>";
			    echo "<td>$equipo_nombre</td>";
			    echo "</tr>";
             }			 
         }
		 
         $conn->close();
	}


	function get_persona($id_persona){
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,nombres,apellidos,tipdoc,numdoc,foto,telefono from persona where id = '$id_persona'"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
         		$id = $row["id"];
         		$nombres = $row["nombres"];
         		$apellidos = $row["apellidos"];
         		$numdoc = $row["numdoc"];
			    return array ($nombres,$apellidos,$numdoc);
             }			 
         }
		 
         $conn->close();
	}

?>