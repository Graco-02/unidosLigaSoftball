<?php 

	function get_estadisticas(){
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
 
         $sql = "SELECT id,conmemoracion,fecha_inicio,estado from temporadas where estado = 0"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
				 
		      $id_temporada = $row["id"];				  
			  $temporada_conmemoracion = $row["conmemoracion"];
			  $temporada_fecha_inicio = $row["fecha_inicio"];
			  
			  $sql2 = "SELECT id,id_equipo,ganados,perdidos,porcentage,total_juegos,id_temporada from estadisticas_equipos where id_temporada = '$id_temporada' order by porcentage desc" ; 
              $result2 = $conn->query($sql2);
			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc()) {
			          $id_equipo = $row2["id_equipo"];
			          $porcentage = $row2["porcentage"];
			          $ganados = $row2["ganados"];
			          $perdidos = $row2["perdidos"];
                      get_mostrar($id_equipo,$porcentage,$ganados,$perdidos);      								
                   }				
                 }else{
		         	  echo "   <section class='servicio'>";
		         
                      echo "  <span class='producto__nombre'>No hay estadisticas </span>";
                      echo "   </section>";   
		         }	

			 }		 
			 
         }else{
			  echo "   <section class='servicio'>";

              echo "  <span class='producto__nombre'>No hay estadisticas </span>";
              echo "   </section>";   
		 }
		 
         $conn->close();
	}
	
	
	     	function get_mostrar($id_equipo,$porcentage,$ganados,$perdidos){
			 $conn = conectar();
              $sql3 = "SELECT id,nombre from equipos where id = '$id_equipo'" ; 
              $result3 = $conn->query($sql3);
			  
			     if ($result3->num_rows > 0) {
                   while($row3 = $result3->fetch_assoc() ) {
			          $nombre = $row3["nombre"];
                            echo "<tr>
                                        <td>$nombre</td>
                                        <td>$ganados</td>
                                        <td>$perdidos</td>
                                        <td>$porcentage</td>
						     </tr> ";		
				    }				
                   				
                 }else{
		         	  echo "   <section class='servicio'>";
		         
                      echo "  <span class='producto__nombre'>No hay estadisticas </span>";
                      echo "   </section>";   
		         }	
		}
	
?>	