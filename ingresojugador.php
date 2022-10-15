<!DOCTYPE html>

<?php 

//require 'ctrl/conexion.php';
include 'ctrl/mnt_posiciones.php';
include 'ctrl/mnt_equipos.php';
include 'ctrl/mnt_jugadores.php';
include 'ctrl/alerta.php';

if(count($_POST)>0) {
   
   $nombre = $_POST['nombre'];	
   $apellido = $_POST['apellido'];	
   $tipdoc = $_POST['tipdoc'];	
   $numdoc = $_POST['numdoc'];	
   $telefono = $_POST['telefono'];	
   $equipo = $_POST['equipo'];	
   $pos1 = $_POST['pospri'];	
   $pos2 = $_POST['possec'];	
   
   if($nombre != "" && $apellido != "" && $numdoc != "" ){
	   	 $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la LOS DATOS DE LA PERSONA a la base de datos
            $sql="INSERT INTO persona (id,nombres,apellidos,tipdoc,numdoc,telefono) 
			VALUES (0,'$nombre','$apellido','$tipdoc','$numdoc','$telefono')";
			
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;
			 
            // agrego los datos del jugador			 
	        $sql2="INSERT INTO jugadores (id,id_persona,id_posicion_primaria,id_posicion_secundaria,id_equipo) 
	        		VALUES (0,$id,$pos1,$pos2,$equipo)";			  
			  
                if ($conn3->query($sql2) == TRUE) {		   
                  // # Cogemos el identificador con que se ha guardado
                  $id=$conn3->insert_id;
			      alert("ACCION REALIZADA ");
		        }   else {
		   	     echo "Error: " . $sql2 . "<br>" . $conn3->error;
		        }			
		    }   else {
		   	 echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
	   
   }else{
	   alert("DEBE LLENAR TODOS LOS DATOS");
   }
    
}	

?>

<html lang="en">
<html>
<head>
    <title>Unidos</title>
    <meta charset="UTF-8">
    <meta name="viewport" conten="width=device-width, initial-scale=1.0">
    <link href="css/normalize.css" rel="stylesheet"/>   
    <link href="https://fonts.googleapis.com/css2?family=Castoro&display=swap" rel="stylesheet">
    <link rel="preload" href="css/index.css" as="style">
    <link href="css/index.css" rel="stylesheet"/>   
</head>

<body >
    <main>
        <header class="header">
          <a href="index.php">
            <img class="header__logo" src="imagenes/logo_unidos2.jpg" alt="Logotipo">
          </a>
        </header>
                
        <section class="titulo2">
          <div class="contenido-titulo2">
          
            <h2 class="titulo">LIGA DE SOFTBALL <span>UNIDOS DE VILLAS AGRICOLAS</span></h2>         
          
          </div>
        </section>

        <main class="contenedor ">
        
         <div class="contenedor__principal"> <!-- inicio div principal-->   
		   <div class="section__formulario">
               <form action="" method="post" class="formulario">
			     <table>
			       <tr>
			   	  <td> <label for="Nombres">Nombre:</label>
			   	  <input type="text" id="nombre" placeholder="Fulanito" name="nombre"></td>
			       </tr>
		      
			   	<tr>
			   	  <td> <label for="Apellidos">Apellidos:</label>
			   	  <input type="text" id="apellidos" placeholder="De tal" name="apellido">
			   	  </td>
			   	</tr> 
		      
                    <tr>	
 			   	  <td>
			   	  <label for="Numdoc">NUMDOC:</label>
			   	  <input type="text" id="numdoc" placeholder="001-0000000-0" name="numdoc">
			   	  	 <select name="tipdoc" id="tipdoc">
                          <option value="CED">CED</option>
                          <option value="PSS">PSS</option>
                        </select>
			   	  </td></tr>
			   
			   	  <tr> <td><label for="Telefono">Telfono:</label>
			   	  <input type="text" id="telefono" placeholder="809-000-0000" name="telefono"></td></tr>			
		      
		      
                   <tr>					
			   	  <td>
			   	     <label for="Posicion primaria">Posicion primaria:</label>
			   	     <select name="pospri" id="tipdoc">
                           <?php get_posiciones();?>
                        </select>
			   	  </td>
			   	</tr> 
			   	
                   <tr>					
			   	  <td>
			   	     <label for="Posicion secundaria">Posicion secundaria:</label>
			   	     <select name="possec" id="tipdoc">
                            <?php get_posiciones();?>
                        </select>
			   	  </td>
			   	</tr> 
		      
		      
                   <tr>					
			   	  <td>
			   	     <label for="Equipo">Equipo:</label>
			   	     <select name="equipo" id="equipos">
                          <?php get_equipos();?>
                        </select>
			   	  </td>
			   	</tr> 				
			   	
			     </table>
		      
			     <br> <br> 
                 <input type="submit" value="Aceptar" align="center">
                 <input type="reset">
			     
               </form> 
			</div>
			
			<div class="section__lista__jugadores">
			  <table class="posiciones lista_jugadores">
			    <tr>
                 <th>Jugador</th>				
				 <th>Identificacion</th>
				 <th>Num.</th>
				 <th>Equipo</th>
				</tr>
				
				<?php get_lista_jugadores(); ?>
		      </table>
			</div>
			
         </div> <!-- fin div principal-->
	
        </main>		

        <footer>
           <p>Todos los derechos reservados Francis Graco Ferrer Hierro</p>
        </footer>
        
</body>

</html>