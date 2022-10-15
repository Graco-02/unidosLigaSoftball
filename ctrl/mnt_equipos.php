<?php

  include 'conexion.php';
  
	function get_equipos(){
		$pos = 0;
		$colum;
		$id;
		$titulo;
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,nombre FROM equipos"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
         		$id = $row["id"];
         		$titulo = $row["nombre"];
			    echo "<option value='$id' >$titulo</option>";
             }			 
         }
		 
         $conn->close();
	}
	
    function get_equipo($equipo){
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,nombre FROM equipos where id = $equipo"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
         	 $id = $row["id"];
         	 $titulo = $row["nombre"];
			 $conn->close();
             return $titulo;		 
         }
		 
       //  $conn->close();
	}
	
	
	function valida_existencia_jugador($numero){
		$id=0;
		$conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT id,id_persona,id_posicion_primaria,id_posicion_secundaria,id_equipo FROM jugadores where id = $numero"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
             $id = $row["id"];
         }
		 
         $conn->close();
		 
		 return $id;
	}
	
  function inserta_juego($visitante,$home,$arbitro,$fecha,$ganador,$perdedor,$carreras_ganador,$carrerar_perdedor){
  
		 // si no se inserta los datos de la nueva temporada a 0
		 $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA PERSONA a la base de datos
            $sql="INSERT INTO juegos (id,visitante,home,arbitro,fecha,ganador,perdedor,carreras_ganador,carrerar_perdedor) 
			VALUES (0,$visitante,$home,'$arbitro','$fecha',$ganador,$perdedor,$carreras_ganador,$carrerar_perdedor)";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;	
              			  
		    }   else {
		   	  echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
	  
  }
  
  function actualizar_esta_equipos($id_equipo,$ganados,$perdidos,$porcentage,$total_juegos,$id_temporada){
	     $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA PERSONA a la base de datos
            $sql="UPDATE estadisticas_equipos set id_equipo= $id_equipo, ganados=$ganados , perdidos=$perdidos , porcentage=$porcentage , total_juegos= $total_juegos, id_temporada=$id_temporada
			       WHERE id_jugador = $jugador and id_temporada = $temporada";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;	
              			  
		    }   else {
		   	  echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
  }  
  
  
  function recuperar_estadisticas_equipos($equipo){
	  $temporada = get_temporada_activa();
	  if($temporada > 0){
         $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # selecciono las estadisticas actuales del jugador
            $sql="SELECT id_equipo,ganados,perdidos,porcentage,total_juegos,id_temporada FROM estadisticas_equipos WHERE id_temporada = $temporada and id_equipo = $$equipo";
				 
	     $result = $conn3->query($sql);		
		 
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
              return array ($row["id_equipo"],$row["ganados"],$row["perdidos"],$row["porcentage"],$row["total_juegos"],$row["id_temporada"]);			  
			 }
		 }   else {
		   	  return  array(0 , 0 , 0, 0 , 0 , 0);
		    }
		 }
      }
  }    
	
	
?>