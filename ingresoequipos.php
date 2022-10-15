<!DOCTYPE html>

<?php 

require 'ctrl/conexion.php';

if(count($_POST)>0) {
  $nombre = $_POST['equipo'];	
  $ruta =  $_FILES['logo_equipo']['name'];
  $directorio = 'imagenes/';
  $subir_archivo = $directorio.basename($_FILES['logo_equipo']['name']);
  
  if ($ruta != ""  && move_uploaded_file($_FILES['logo_equipo']['tmp_name'], $subir_archivo) )
   {   
	     $conn3 = conectar();
		 if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
         }else{
	  	   //   # Agregamos la imagen a la base de datos
            $sql="INSERT INTO equipos (id,nombre,logo) VALUES (0,'$nombre','$ruta')";
            if ($conn3->query($sql) == TRUE) {		   
              // # Cogemos el identificador con que se ha guardado
              $id=$conn3->insert_id;
		    }   else {
		   	 echo "Error: " . $sql . "<br>" . $conn3->error;
		    }
		 }
   }else{
	  echo 'debe cargar el logo';
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

        <main class="contenedor">
        
	
         <div class="contenedor__principal"> <!-- inicio div principal-->   
		  <div class="centro">	
            <form action="" method="post" class="formulario centro" enctype="multipart/form-data" >
		      <label for="nombre">Nombre:</label></td>
			  <input type="text" id="nombre" placeholder="A" name="equipo">
		    
		      <br> <br>
			  <label for="file">Logo :</label>
              <input id = "file" type="file" name="logo_equipo" size = "30">
			  
			  <br> <br> 
              <input type="submit" value="Aceptar" align="center">
              <input type="reset">
			  
            </form> 
          </div>  
         </div> <!-- fin div principal-->
	
        </main>		

        <footer>
           <p>Todos los derechos reservados Francis Graco Ferrer Hierro</p>
        </footer>
        
</body>

</html>