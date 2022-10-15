<!DOCTYPE html>

<?php
   require 'ctrl/conexion.php';
   include 'ctrl/alerta.php';
   include 'ctrl/estadisticas_bateo.php';
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
               <a href="index.php" >Inicio</a>
               <a href="nosotros.html">Nosotros</a>
           </nav>
        </div>      
              
        <section class="titulo2">
          <div class="contenido-titulo2">
          
            <h2 class="titulo">LIGA DE SOFTBALL <span>UNIDOS DE VILLAS AGRICOLAS</span></h2>         
          
          </div>
        </section>
        
        <main class="contenedor sombra">
                    <h2>Estadisticas</h2>
         <div class="contenedor__principal"> <!-- inicio div principal-->   
         
            <div class="servicios grid_2">    

                 <section class="servicio">
                 <h2>Picheo</h2>  

                        <table class="posiciones">
                            <tr>
                              <th>GANADOS</th>
                              <th>V</th>
							  <th>EQUIPO</th>
                            </tr>
                            
							<?php get_estadisticas_ganados(10); ?>
					   
                            
                        </table>

                        <table class="posiciones">
                            <tr>
                              <th>PONCHES</th>
                              <th>K</th>
							  <th>EQUIPO</th>							  
                            </tr>
                            
                           <?php get_estadisticas_k(10); ?>                 
                            
                        </table>

                        <table class="posiciones">
                            <tr>
                              <th>SALVAMENTOS</th>
                              <th>SV</th>
							  <th>EQUIPO</th>							  
                            </tr>
                            
                            <?php get_estadisticas_salvados(10);?>                        
                            
                        </table>
                    
                        <table class="posiciones">
                            <tr>
                              <th>EFECTIVIDAD</th>
                              <th>ERA</th>
							  <th>EQUIPO</th>							  
                            </tr>
                            
                          <?php get_estadisticas_efectividad(10); ?>
                            
                        </table>
                                       
                 </section>                                 
            </div> 

            <div class="servicios grid_2">    
                 <section class="servicio">
                 <h2>Bateo</h2>  


                        <table class="posiciones">
                            <tr>
                              <th>CUADRANGULARES</th>
                              <th>HR</th>
							  <th>EQUIPO</th>							  
                            </tr>
                                <?php get_estadisticas_hr(10); ?>  
                        </table>
                     
                        <table class="posiciones">
                            <tr>
                              <th>PROMEDIO</th>
                              <th>AVG</th>
							  <th>EQUIPO</th>							  
                            </tr>
                            
                             <?php get_estadisticas_avg(10); ?>                     
                            
                        </table>
                     

                        <table class="posiciones">
                            <tr>
                              <th>EMPUJADAS</th>
                              <th>RBI</th>
							  <th>EQUIPO</th> 							  
                            </tr>
                            
                            <?php get_estadisticas_ce(10); ?>                        
                            
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