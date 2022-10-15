<?php 
	
	function get_agendados(){
		 $conn = conectar();
         // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
		 $fecha = date('Y-m-d');
		 
         $sql = "SELECT visitante,home,fecha,hora from agendados where fecha >= '$fecha'"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
				 
		      $hora = $row["hora"];				  
			  $visitante = $row["visitante"];
			  $home = $row["home"];
			  $fecha2 = $row["fecha"];
			  
			  //llamo a los datos del equipo por una lista
			  list($nom,$color,$logo) = get_equipo($visitante);
			   //llamo a los datos del equipo por una lista
			  list($nom2,$colo2,$logo2) = get_equipo($home);
			  
              echo "   <section class='servicio'>";
              echo "   <span class='producto__nombre'>Estadio Moscoso Puello</span>";
              echo "   <div class='iconos grid_3'>";
              echo "   <img class='producto' src='imagenes/$logo' onclick=''> ";
              echo "   <span>VS</span>";                  
              echo "   <img class='producto' src='imagenes/$logo2' onclick=''> </div>";                
              echo "  <span class='producto__nombre'> $fecha2 </span>";
              echo "  <span class='producto__nombre'>   $hora  </span>";
              echo "   </section>";                  
                				
             }			 
			 
         }else{
			  echo "   <section class='servicio'>";

              echo "  <span class='producto__nombre'>No hay juegos $fecha</span>";
              echo "   </section>";   
		 }
		 
         $conn->close();
	}

	function get_equipo($equipo){
		 $conn = conectar();
         // Check connection
		 
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }
         
         $sql = "SELECT nombre,color,logo from equipos where id = '$equipo'"; 
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
               return array($row["nombre"],$row["color"],$row["logo"]);  				
             }			 
			 
         }
		 
         $conn->close();
	}


?>