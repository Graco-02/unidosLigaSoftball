<?php 

	function get_estadisticas_avg($contador){
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
 
         $sql = "SELECT id,conmemoracion,fecha_inicio,estado from temporadas where estado = 0"; 
         $result = $conn->query($sql);
	     $count=1;         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc() ) {
				 
		      $id_temporada = $row["id"];				  
			  $temporada_conmemoracion = $row["conmemoracion"];
			  $temporada_fecha_inicio = $row["fecha_inicio"];
			  
			  $sql2 = "SELECT id,id_temporada,id_jugador,avg,ca,ce,k,bb,h,h2,h3,h4,vb,sb from estadisticas_ofensivas where id_temporada = '$id_temporada' order by avg desc" ; 
              $result2 = $conn->query($sql2);

			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc() and $count <= $contador ) {
			          $id_jugador = $row2["id_jugador"];
			          $avg_jugador = $row2["avg"];
					  if($avg_jugador>1000){
						 $avg_jugador = 1000; 
					  }
					  if($count<=$contador){
                        get_mostrar_avg($id_jugador,$avg_jugador);      
					  }
					  $count++;									
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


	function get_estadisticas_hr($contador){
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
			  
			  $sql2 = "SELECT id,id_temporada,id_jugador,avg,ca,ce,k,bb,h,h2,h3,h4,vb,sb from estadisticas_ofensivas where id_temporada = '$id_temporada' order by h4 desc" ; 
              $result2 = $conn->query($sql2);
			  $count=1;
			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc() and $count <= $contador ) {
			          $id_jugador = $row2["id_jugador"];
			          $h4_jugador = $row2["h4"];
                      get_mostrar_avg($id_jugador,$h4_jugador);      
                       $count = $count + 1;									
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

	function get_estadisticas_ce($contador){
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
			  
			  $sql2 = "SELECT id,id_temporada,id_jugador,avg,ca,ce,k,bb,h,h2,h3,h4,vb,sb from estadisticas_ofensivas where id_temporada = '$id_temporada' order by ce desc" ; 
              $result2 = $conn->query($sql2);
			  $count=1;
			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc() and $count <= $contador ) {
			          $id_jugador = $row2["id_jugador"];
			          $h4_jugador = $row2["ce"];
                      get_mostrar_avg($id_jugador,$h4_jugador);      
                       $count = $count + 1;									
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

     	function get_mostrar_avg($id_jugador,$avg){
			 $conn = conectar();
              $sql3 = "SELECT id,id_persona,id_posicion_primaria,id_posicion_secundaria,id_equipo from jugadores where id = '$id_jugador'" ; 
              $result3 = $conn->query($sql3);
			 
			  
			     if ($result3->num_rows > 0) {
                   while($row3 = $result3->fetch_assoc() ) {
			          $id_persona = $row3["id_persona"];
					   $id_equipo=$row3["id_equipo"];
					   
				         $sql4 = "SELECT id,nombres,apellidos,tipdoc,numdoc,foto,telefono from persona where id = '$id_persona'" ; 
                         $result4 = $conn->query($sql4);
			             
                         $sql5 = "SELECT id,nombre FROM equipos where id = '$id_equipo'" ; 
                         $result5 = $conn->query($sql5);						 
			             
                        					 
						 
						 if ($result5->num_rows > 0) {
							 $row5 = $result5->fetch_assoc();
			                 $equipo_nombre = $row5["nombre"];	
						 }
						 
						 if ($result4->num_rows > 0) {
                           while($row4 = $result4->fetch_assoc() ) {
				             $nombres = $row4["nombres"];
				             $apellidos = $row4["apellidos"];
                            echo "<tr>
                                        <td> $nombres , $apellidos </td>
                                        <td>$avg</td>
                                        <td>$equipo_nombre</td>
						     </tr> ";		}
						 }					
                   }				
                 }else{
		         	  echo "   <section class='servicio'>";
		         
                      echo "  <span class='producto__nombre'>No hay estadisticas </span>";
                      echo "   </section>";   
		         }	
		}



		
		
	function get_estadisticas_efectividad($contador){
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
			  
			  $sql2 = "SELECT id,id_temporada,id_jugador,efectividad,cp,k,bb,wp,entradas from estadisticas_defensivas where id_temporada = '$id_temporada' order by efectividad desc" ; 
              $result2 = $conn->query($sql2);
			  $count=1;
			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc() and $count <= $contador ) {
			          $id_jugador = $row2["id_jugador"];
			          $efe_jugador = $row2["efectividad"];
                      get_mostrar_avg($id_jugador,$efe_jugador);      
                       $count = $count + 1;									
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
		
		
	function get_estadisticas_k($contador){
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
			  
			  $sql2 = "SELECT id,id_temporada,id_jugador,efectividad,cp,k,bb,wp,entradas from estadisticas_defensivas where id_temporada = '$id_temporada' order by k desc" ; 
              $result2 = $conn->query($sql2);
			  $count=1;
			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc() and $count <= $contador ) {
			          $id_jugador = $row2["id_jugador"];
			          $efe_jugador = $row2["k"];
                      get_mostrar_avg($id_jugador,$efe_jugador);      
                       $count = $count + 1;									
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
		
	
	function get_estadisticas_ganados($contador){
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
			  
			  $sql2 = "SELECT id,id_temporada,id_jugador,efectividad,cp,k,bb,wp,entradas,ganados from estadisticas_defensivas where id_temporada = '$id_temporada'  order by k desc" ; 
              $result2 = $conn->query($sql2);
			  $count=1;
			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc() and $count <= $contador ) {
			          $id_jugador = $row2["id_jugador"];
			          $efe_jugador = $row2["ganados"];
                      get_mostrar_avg($id_jugador,$efe_jugador);      
                       $count = $count + 1;									
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

	function get_estadisticas_salvados($contador){
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
			  
			  $sql2 = "SELECT id,id_temporada,id_jugador,efectividad,cp,k,bb,wp,entradas,salvados from estadisticas_defensivas where id_temporada = '$id_temporada'  order by k desc" ; 
              $result2 = $conn->query($sql2);
			  $count=1;
			  
			     if ($result2->num_rows > 0) {
                   while($row2 = $result2->fetch_assoc() and $count <= $contador ) {
			          $id_jugador = $row2["id_jugador"];
			          $efe_jugador = $row2["salvados"];
                      get_mostrar_avg($id_jugador,$efe_jugador);      
                       $count = $count + 1;									
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

?>