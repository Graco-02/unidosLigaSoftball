<!DOCTYPE html>

<?php 

//require 'ctrl/conexion.php';
include 'ctrl/mnt_temporadas.php';
include 'ctrl/mnt_equipos.php';
include 'ctrl/alerta.php';

if(count($_POST)>0) {
    $visitante = $_POST['visitante'];
    $home = $_POST['home'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$temporada = get_temporada_activa();
	
	
	if($visitante != $home && $fecha != " " && $hora != " "){
         set_nueva_agenda($visitante,$home,$fecha,$hora,$temporada);
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
        
	
         <div class="centro"> <!-- inicio div principal-->   
            <form  method="post" class='formulario' action=""> 
			  <table>

                    <div class="campo"> 
					   <label>Fecha</label>
					   <input type="date" id="fecha" name="fecha">
					</div>

                    <div class="campo"> 
					   <label>Hora</label>
					   <input type="time" id="fecha" name="hora">
					</div>
                    
					<div class="campo"> 
                        <label>Visitante</label>
                        <select name="visitante" id="equipos">
                            <?php get_equipos();?>
                        </select>
                    
                     
                        <label>Home club</label>
                        <select name="home" id="equipos">
                            <?php get_equipos();?>
                        </select>
						
                     </div>

			  </table>

			  <br> <br> 
              <input type="submit" value="Aceptar" align="center">
              <input type="reset">
			  
            </form> 
         </div> <!-- fin div principal-->
	
        </main>		

        <footer>
           <p>Todos los derechos reservados Francis Graco Ferrer Hierro</p>
        </footer>
        
</body>

</html>