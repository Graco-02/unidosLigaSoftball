<!DOCTYPE html>

<?php
   require 'ctrl/conexion.php';
   include 'ctrl/alerta.php';
   include 'ctrl/agendados.php';
   include 'ctrl/estadisticas_bateo.php';
   include 'ctrl/estadisticas_equipos.php';
//   session_start();
   
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
                
        <div class="nav-bg">
           <nav class="navegacion-principal contenedor">
               <a href="nosotros.html">Nosotros</a>
               <a href="estadisticas.php">Estadisticas</a>
           </nav>
        </div>      
              
        <section class="titulo2">
          <div class="contenido-titulo2">
          
            <h2 class="titulo">LIGA DE SOFTBALL <span>UNIDOS DE VILLAS AGRICOLAS</span></h2>         
          
          </div>
        </section>
        
        <main class="contenedor sombra">
        
         <div class="contenedor__principal"> <!-- inicio div principal-->   
         
            <div class="servicios grid_2">    
                 <h2>Proximos Eventos</h2>
                 
				 <?php
                      get_agendados (); 
				 ?>
				      
            </div> 

            <div class="servicios grid_2">    
                 <section class="servicio">
                 <h2>Lideres</h2>  

                        <span>Picheo</span>
                        <table class="posiciones">
                            <tr>
                              <th>EFECTIVIDAD</th>
                              <th>ERA</th>
                              <th>EQUIPO</th>
                            </tr>
                           
                            <?php get_estadisticas_efectividad(3); ?>
                        </table>
                   
                       <span>Bateo</span>
                        <table class="posiciones">
                            <tr>
                              <th>PROMEDIO</th>
                              <th>AVG</th>
							  <th>EQUIPO</th>
                            </tr>
							
							<?php get_estadisticas_avg(3); ?>
                    
                        </table>
                     
                 </section>           


                 <section class="servicio">
                 <h2>Posiciones</h2>  

                        <table class="posiciones">
                            <tr>
                              <th>Equipo</th>
                              <th>Ganados</th>
                              <th>Perdidos</th>
                              <th>PCT</th>
                            </tr>
                            
							
							<?php get_estadisticas();?>
                        </table>
                   
                     
                 </section>
				 
            </div> 
            
         </div> <!-- fin div principal-->
        
        </main>
            
        <footer>
           <p>Todos los derechos reservados Francis Graco Ferrer Hierro</p>
        </footer>
        
</body>

</html>