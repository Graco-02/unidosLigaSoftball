<?php

//controlador vista anotaciones
  include 'alerta.php'; 
  include 'mnt_temporadas.php'; 
  include 'mnt_equipos.php'; 


  if(count($_POST)>0) {
	  $home = $_POST['home'];
	  $visita = $_POST['visitante'];
	  
	  //primero valido que los equipos sean diferentes
	  if($home==$visita){
	  	alert("Los quipos a enfrentar no puedes ser los mismos. Home = $home Visitante = $visita" );
			  echo "<a href='../anotaciones.php'>volver</a>";
      }else{
		  //valido que se haya informado la fecha del juego
		  $fecha = $_POST['fecha'];
		  if($fecha != ""){
			//valido que se haya informado por lo menos los datos de 9 jugadores de ambos equipos
            $contador_visita=0;
            $contador_home=0;
			for ($i = 1; $i <= 15; $i++) {
				$jugadorv=$_POST['vjugador'.$i];
				$jugadorh=$_POST['hjugador'.$i];
				 
                 if($jugadorv>"0" ){
					$contador_visita++; 
				 }
                 if($jugadorh>"0"){
					$contador_home++; 
				 } 				 
			}
			
			if($contador_visita <9 && $contador_home <9){//valido la cantidad minima de 9 jugadores que hayan tomado turnos en el juego
		//	if($contador_visita<1 && $contador_home <1){//valido la cantidad minima de 9 jugadores que hayan tomado turnos en el juego
			  alert("Se deben informar almenos 9 jugadores para cada equipo --   visita = $contador_visita home = $contador_home" );
			  echo "<a href='../anotaciones.php'>volver</a>";
			}else{
			   //valido los jugadores informado. a los que no tienen apariciones en la temporada les agrego nuevos registro
			       for ($i = 1; $i <= 15; $i++) { // proceso las estadisticas ofensivas
			       	$jugadorv=$_POST['vjugador'.$i];
			       	$jugadorh=$_POST['hjugador'.$i];
			       	 
                        if($jugadorv>"0" ){
                           list ($avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb) = procesar_estadisticas_ofensivas($jugadorv,$i);
						    print_r("estadisticas: $avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb" );
					    }
						
                        if($jugadorh>"0"){
			       		  list ($avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb) =  procesar_estadisticas_ofensivas($jugadorh,$i);
						   print_r("estadisticas: $avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb" );
						} 				 
			       }// fin validaciones ofensivas
				   
				    $temporada = get_temporada_activa();
					$equipo_ganador = 0;
					$equipo_perdedor = 0;
					$carreras_visitante=0;
					$carreras_home=0;
					$visitante = $_POST['visitante'];
					$home = $_POST['home'];
					$arbitro = $_POST['arbitro'];
					$fecha = $_POST['fecha'];
					
				    for ($i = 1; $i <= 5; $i++) { // proceso las estadisticas defensivas
			         	$jugadorv=$_POST['vpich'.$i];
			         	$jugadorh=$_POST['hpich'.$i];
			       	 
                        if($jugadorv>"0" ){
                           list ($efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados)
	 					   = recuperar_estadisticas_defensivas($jugadorv);
	                        					
						   $desde=$_POST['vdesde'.$i];
						   $hasta=$_POST['vhasta'.$i];
						   
						   for($ining=$desde;$ining<=$hasta;$ining++){
							   $vining = $_POST['hining'.$ining];
							   $cp+=$vining;
							   $carreras_home+=$vining;
						   }
						   
						   $k+=$_POST['vpich_k'.$i];
						   $bb+=$_POST['vpich_bb'.$i];
						   $entradas+= ($hasta-$desde)+1;
       		               
						   switch ($_POST['vpich_salida'.$i]) {
                             case 'V':
							    $equipo_ganador = $_POST['visitante'];
							    $equipo_perdedor = $_POST['home'];
                                $ganados++;
                                break;
							 case 'P':
                                $perdidos++;
                                break;
							 case 'N':
                                $nodecididos++;
                                break;
							 case 'S':
                                $salvados++;
                                break;								
						   }
						   
						   $efectividad = ($cp * 9) / $entradas;
						 //  actualizar_esta_defensiva($jugadorv,$temporada,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados);
						 valida_aparicion_defensivas($jugadorv,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados);
						    
						 //   print_r("estadisticas_defensivas home: $efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados" );
					    }
						
                        if($jugadorh>"0"){
                           list ($efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados)
						   = recuperar_estadisticas_defensivas($jugadorh);
						   $desde=$_POST['hdesde'.$i];
						   $hasta=$_POST['hhasta'.$i];
						   
						   for($ining=$desde;$ining<=$hasta;$ining++){
							   $vining = $_POST['vining'.$ining];
							   $cp+=$vining;
							   $carreras_visitante+=$vining;
						   }
						   
						   $k+=$_POST['hpich_k'.$i];
						   $bb+=$_POST['hpich_bb'.$i];
						   $entradas+= ($hasta-$desde)+1;
       		               
						   switch ($_POST['hpich_salida'.$i]) {
                             case 'V':
							    $equipo_ganador = $_POST['home'];
							    $equipo_perdedor = $_POST['visitante'];							 
                                $ganados++;
                                break;
							 case 'P':
                                $perdidos++;
                                break;
							 case 'N':
                                $nodecididos++;
                                break;
							 case 'S':
                                $salvados++;
                                break;								
						   }
						   
						   $efectividad = ($cp * 9) / $entradas;
						  valida_aparicion_defensivas($jugadorh,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados);
						  // actualizar_esta_defensiva($jugadorh,$temporada,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados);
						 //  print_r("estadisticas_defensivas home: $efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados" );
						} 				 
			       }// fin validaciones defensivas
				     //inserto el juego
					 $carreras_ganador=0;
					 $carrerar_perdedor=0;
					 if($equipo_ganador == $home){
						 $carreras_ganador = $carreras_home;
						 $carrerar_perdedor = $carreras_visitante;
					 }else{
						 $carreras_ganador = $carreras_visitante;
						 $carrerar_perdedor = $carreras_home;						 
					 }
					 
					 //inserto los datos del juego esta funcion esta en el objeto mnt_equipos.php
				    inserta_juego($visitante,$home,$arbitro,$fecha,$equipo_ganador,$equipo_perdedor,$carreras_ganador,$carrerar_perdedor); 
                  
      				for($equipo_c=1;$equipo_c<=2;$equipo_c++){
					   if($equipo_c==1){
						 list($id_equipo,$ganados,$perdidos,$porcentage,$total_juegos,$id_temporada) =  recuperar_estadisticas_equipos($visitante);  
 					    
   						 if($equipo_ganador==$visitante){
							$ganados++; 
						 }else{
							 $perdidos++;
						 }
						 $total_juegos++;
						 $porcentage = ($ganados / $total_juegos) * 1000;
						 $id_equipo = $visitante;
					   }else{
						   list($id_equipo,$ganados,$perdidos,$porcentage,$total_juegos,$id_temporada) =  recuperar_estadisticas_equipos($home);	
					     if($equipo_ganador==$home){
							$ganados++; 
						 }else{
							 $perdidos++;
						 }				

						 $total_juegos++;
						 $porcentage = ($ganados / $total_juegos) * 1000;
						  $id_equipo = $home;
					   }	
					   //actualizo las estadisticas del juego. esta funcion esta en el objeto mnt_equipos.php
					    actualizar_esta_equipos($id_equipo,$ganados,$perdidos,$porcentage,$total_juegos,$id_temporada);
					   
					}
					
					alert("Se han creado los datos" ); 
					 echo "<a href='../anotaciones.php'>volver</a>";
			}
			
		  }else{
			 	alert("Se debe informar una fecha" );
               //  header("Location:../anotaciones.php");
			  echo "<a href='../anotaciones.php'>volver</a>";
		  }
	  }	  
	  
  } //fin del procesamiento


  function valida_aparicion_ofensivas($jugador,$avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb){
	  list ($avg2,$ca2,$ce2,$k2,$bb2,$h2,$h22,$h32,$h42,$vb2,$sb2) = recuperar_estadisticas_ofensivas($jugador);
	  $temporada = get_temporada_activa();
	  
	  if($vb2 > 0){
		 // si es mayor que cero es que ya tiene apariciones 
		 actualizar_esta_ofensivas($jugador,$temporada,$avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb);
	  }else{
		 // si no se inserta los datos de la nueva temporada a 0
		 $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA PERSONA a la base de datos
            $sql="INSERT INTO estadisticas_ofensivas (id,id_temporada,id_jugador,avg,ca,ce,k,bb,h,h2,h3,h4,vb,sb) 
			VALUES (0,$temporada,$jugador,$avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb)";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;	
              			  
		    }   else {
		   	  echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
	  }
  }

  function valida_aparicion_defensivas($jugador,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados){
      list ($efectividad2,$cp2,$k2,$bb2,$wp2,$entradas2,$ganados2,$perdidos2,$nodecididos2,$salvados2)
	  = recuperar_estadisticas_defensivas($jugador);
	  $temporada = get_temporada_activa();
	  
	  if($entradas2 > 0){
		 // si es mayor que cero es que ya tiene apariciones 
		 actualizar_esta_ofensivas($jugador,$temporada,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados);
	  }else{
		 // si no se inserta los datos de la nueva temporada a 0
		 $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA PERSONA a la base de datos
            $sql="INSERT INTO estadisticas_defensivas (id,id_temporada,id_jugador,efectividad,cp,k,bb,wp,entradas,ganados,perdidos,nodecididos,salvados) 
			VALUES (0,$temporada,$jugador,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados)";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;	
              			  
		    }   else {
		   	  echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
	  }
  }


  function recuperar_estadisticas_ofensivas($jugador){
	  $temporada = get_temporada_activa();
	  if($temporada > 0){
         $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # selecciono las estadisticas actuales del jugador
            $sql="SELECT avg,ca,ce,k,bb,h,h2,h3,h4,vb,sb FROM  estadisticas_ofensivas  
			     WHERE id_temporada = $temporada and id_jugador = $jugador";
	     $result = $conn3->query($sql);		
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
              return array ($row["avg"],$row["ca"],$row["ce"],$row["k"],$row["bb"],$row["h"],$row["h2"],$row["h3"],$row["h4"],$row["vb"],$row["sb"]);			  
			 }
		 }   else {
		   	  return  array(0 , 0 , 0, 0 , 0 , 0, 0 , 0 , 0 , 0,0);
		    }
		 }
      }
  }
  
  function recuperar_estadisticas_defensivas($jugador){
	  $temporada = get_temporada_activa();
	  if($temporada > 0){
         $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # selecciono las estadisticas actuales del jugador
            $sql="SELECT id,id_temporada,id_jugador,efectividad,cp,k,bb,wp,entradas,ganados,perdidos,nodecididos,salvados FROM  estadisticas_defensivas  
			     WHERE id_temporada = $temporada and id_jugador = $jugador";
				 
	     $result = $conn3->query($sql);		
		 
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
              return array ($row["efectividad"],$row["cp"],$row["k"],$row["bb"],$row["wp"],$row["entradas"],$row["ganados"],$row["perdidos"],$row["nodecididos"],$row["salvados"]);			  
			 }
		 }   else {
			 
		   	  return  array(0 , 0 , 0, 0 , 0 , 0, 0 , 0 , 0 , 0);
		    }
		 }
      }
  }  
  

  function actualizar_esta_ofensivas($jugador,$temporada,$avg , $ca , $ce , $k , $bb , $h , $h2 , $h3 , $h4 , $vb ,$sb){
	     $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA PERSONA a la base de datos
            $sql="UPDATE estadisticas_ofensivas set avg= $avg, ca=$ca , ce=$ce , k=$k , bb= $bb, h=$h , h2=$h2 , h3=$h3 , h4= $h4, vb= $vb, sb = $sb
			       WHERE id_jugador = $jugador and id_temporada = $temporada";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;	
              			  
		    }   else {
		   	  echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
  }
  
  function actualizar_esta_defensiva($jugador,$temporada,$efectividad,$cp,$k,$bb,$wp,$entradas,$ganados,$perdidos,$nodecididos,$salvados){
	     $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA PERSONA a la base de datos
            $sql="UPDATE estadisticas_defensivas set efectividad= $efectividad, cp=$cp , k=$k , bb=$bb , wp= $wp, entradas=$entradas , ganados=$ganados , perdidos=$perdidos , nodecididos= $nodecididos, salvados= $salvados
			       WHERE id_jugador = $jugador and id_temporada = $temporada";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;	
              			  
		    }   else {
		   	  echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
  }

  function procesar_estadisticas_ofensivas($jugador,$pos){
	    if (valida_existencia_jugador($jugador) > 0 ){//valido si el jugador inmformado existe en BBDD
       	  list ($avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb) = recuperar_estadisticas_ofensivas($jugador);
		  
           for ($contador = 1; $contador <= 9; $contador++) {
           	$jugada=$_POST['vejecuciones'.$contador.$pos];
       		if($jugada != "NN"){
       			$vb++;
       		}
			
       		switch ($jugada) {
               case 1:
                  $k++;
                  break;										
               case 6:
                  $sb++;
                  break;
               case 7:
                  $bb++;
                  break;									   
                case 9:
                  $h++;
                  break;
                case 10:
                  $h2++;
       		   break;
                case 11:
                  $h3++;
                  break;
                case 12:
                  $h4++;
       		   break;
                case 13:
                  $ca++;
       		   break;
                case 14:
                  $ce++;
       		   break;
                case 15:
                  $ce+=2;
       		   break;
                case 16:
                  $ce+=3;
       		   break;
                case 17:
                  $ce+=4;
       		   break;									   
              }
           }	
          
		  //calculo el nuevo average formula = ((total de turnos buenos) / total de turnos ) * 1000
		  $avg = (( $h + $h2 + $h3 + $h4 ) / $vb ) * 1000;
		  valida_aparicion_ofensivas($jugador,$avg,$ca,$ce,$k,$bb,$h,$h2,$h3,$h4,$vb,$sb);
		  	   
       }
  }
  
?>