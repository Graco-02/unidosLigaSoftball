<!DOCTYPE html>

<?php

  //require 'ctrl/conexion.php';
  include 'ctrl/mnt_posiciones.php';
  include 'ctrl/mnt_equipos.php';
  include 'ctrl/mnt_jugadas.php';   
  include 'ctrl/alerta.php';  

											  
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
               <a href="index.php">Inicio</a>
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
            <h2>Anotaciones</h2>
         <div > <!-- inicio div principal-->   
         
            <section class="">
             <p>
                 <form  method="post" class='formulario' action="ctrl/mnt_anotaciones.php"> 
              <!--   <form  class='formulario' > -->
                     <fieldset>
                     
                        <legend>Enfrentamiento</legend> 

                        <div class="campo"> 
						   <label>Fecha</label>
						   <input type="date" id="fecha" name="fecha">
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
						 
						<div class="campo"> 
                            <label>Arbitro</label>
                            <input class="input-text" type="text" name="arbitro"/>                    	
                         </div> 
                        
                        <hr>
                        <table>
                            <tr>
                              <th>
							     <label>VISITANTES</label>
                              </th>
                            </tr>
                            
                            <tr>
                                <th>No</th>
                                <th>Posicion</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                            </tr>
                             

                           <?php 
						   
                          //  <!-- INCIO CAMPOS CAPTURA-->							 
                      
						   for ($i = 1; $i <= 15; $i++) {
							   
						   echo "<tr> <td><input class='input-text' type='text' name='vjugador$i'/></td>";
						   
                           echo "						   
                            <td>
                              <select name='vposiciones$i' id='posiciones'>";
							     get_posiciones();
                           
						   echo "                     
     						   </select>
                            </td>";
                            
						   echo "  
                            <td>
                                <select name='vejecuciones1$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
						   echo " 		   
                              </select>
                            </td>  ";
							
						    echo " 	
                            <td>
                              <select name='vejecuciones2$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
								   
							 echo " 	   
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                              <select name='vejecuciones3$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                    get_jugadas();
							 echo " 		
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                              <select name='vejecuciones4$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
							       get_jugadas();
							 echo " 	   
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                              <select name='vejecuciones5$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
							 echo " 	   
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                              <select name='vejecuciones6$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                    get_jugadas();
							 echo " 		
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                              <select name='vejecuciones7$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
							        get_jugadas();
                             echo "	                             
							 </select>
                            </td>";
							
							 echo " 
                            <td>
                              <select name='vejecuciones8$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
							   get_jugadas();
                             echo "                             
							</select>
                            </td>";
							
							 echo " 
                            <td>
                              <select name='vejecuciones9$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
								   
							 echo " 	   
                              </select>
                            </td>
                            </tr>   <!-- final de fila-->		";	

                                                       							
						   }							   
						   
						   ?>

   
                        <br>
                        <hr>
                        <table>
                            <tr>
                              <th>
                             <!-- <select name="Equipo" id="equipo">
                                <option value="V">VISITANTES</option>
                                <option value="H">HOME CLUB</option>
                              </select> -->
							     <label>HOME CLUB</label>
                              </th>
                            </tr>
                            
                            <tr>
                                <th>No</th>
                                <th>Posicion</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                            </tr>
                             

                           <?php 
						   
                          //  <!-- INCIO CAMPOS CAPTURA-->							 
                      
						   for ($i = 1; $i <= 15; $i++) {
							   
						  echo "<tr> <td><input class='input-text' type='text' name='hjugador$i'/></td>";
						   
                           echo "						   
                            <td>
                              <select name='hposiciones$i' id='posiciones'>";
							     get_posiciones();
                           
						   echo "                     
     						   </select>
                            </td>";
                            
						   echo "  
                            <td>
                              <select name='hejecuciones1$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
						   echo " 		   
                              </select>
                            </td>  ";
							
						    echo " 	
                            <td>
                                 <select name='hejecuciones2$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
								   
							 echo " 	   
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                                 <select name='hejecuciones3$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                    get_jugadas();
							 echo " 		
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                               <select name='hejecuciones4$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
							       get_jugadas();
							 echo " 	   
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                                <select name='hejecuciones5$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
							 echo " 	   
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                               <select name='hejecuciones6$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                    get_jugadas();
							 echo " 		
                              </select>
                            </td>";
							
							 echo " 
                            <td>
                                <select name='hejecuciones7$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
							        get_jugadas();
                             echo "	                             
							 </select>
                            </td>";
							
							 echo " 
                            <td>
                                 <select name='hejecuciones8$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
							   get_jugadas();
                             echo "                             
							</select>
                            </td>";
							
							 echo " 
                            <td>
                                 <select name='hejecuciones9$i' id='ejecuciones'>
							  <option value='NN' >NN</option>";
                                   get_jugadas();
								   
							 echo " 	   
                              </select>
                            </td>
                            </tr>   <!-- final de fila-->		";	

                                                       							
						   }							   
						   
						   ?>

                          
                        <tr>
                            <td>
                             <h2>CARRERAS POR ENTRADA</h2>
                            </td>
                            
                            
						    <td>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                            </td>
							
							
						  <tr>	
						    <td>
							  <label>VISITANTES</label>
                            </td>
						    <td>
                            </td>
                           
						   <?php
						   for($i =1 ;$i<=9;$i++){
						   echo "
    						<td>
                              <input class='input-text__totales' type='text' id='' name='vining$i'/>
                            </td>"; }
							?>
                           </tr>
						   
						  <tr>	
						    <td>
							  <label>HOME CLUB</label>
                            </td>
						    <td>
                            </td>
                           
						   <?php
						   for($i =1 ;$i<=9;$i++){
						   echo "
    						<td>
                              <input class='input-text__totales' type='text' id='' name='hining$i'/>
                            </td>"; }
							?>
                           </tr>						   
						</tr> <!-- Final de totales --> 
                          
						<br>  
						<br>   
						  
                        <tr><!-- estadiscas picher-->
                          <tr>
                            <table class="picher-staf">
                              <tr>
                                <th><h3>Labor Pichers Home</h3></th>
                              </tr>
                              
                              <tr>
                                <th>No.</th>
								<th>Salida(V,P)</th>
                                <th>Desde</th>
                                <th>Hasta</th>
								<th>K</th>
                                <th>BB</th>
                              </tr> 
                              
							  <?php 
							  for($k = 1; $k <= 5; $k++){
							  echo "
                              <tr>
                                <td><input class='input-text' type='text' name='hpich$k'/></td>
								
								<td>
                                  <select name='hpich_salida$k' id='desde'>
                                    <option value='V'>V</option>
                                    <option value='P'>P</option>
                                    <option value='N'>N</option>
                                    <option value='S'>S</option>
                                  </select>
                                </td> 
                                
								<td>
                                  <select name='hdesde$k' id='desde'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                  </select>
                                </td> 
                                
                                <td>
                                  <select name='hhasta$k' id='hasta'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                  </select>
                                </td> 
                                
								<td>
                                  <select name='hpich_k$k' id='desde'>
                                    <option value='0'>0</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                    <option value='11'>11</option>
                                    <option value='12'>12</option>
                                    <option value='13'>13</option>
                                    <option value='14'>14</option>
                                    <option value='15'>15</option>
                                  </select>
                                </td> 
								
								<td>
                                  <select name='hpich_bb$k' id='desde'>
                                    <option value='0'>0</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                    <option value='11'>11</option>
                                    <option value='12'>12</option>
                                    <option value='13'>13</option>
                                    <option value='14'>14</option>
                                    <option value='15'>15</option>
                                  </select>
                                </td> 								
								
                              </tr>";}
                              ?>
                              
                            </table>
                          </tr>
						  
						  <br>
						  <br>
						  <br>
						  
						  <tr>
                            <table class="picher-staf">
                              <tr>
                                <th><h3>Labor Pichers Visitantes</h3></th>
                              </tr>
                              
                              <tr>
                                <th>No.</th>
                                <th>Salida(V,P)</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>K</th>
                                <th>BB</th>
                              </tr> 
                              
							  <?php 
							  for($k = 1; $k <= 5; $k++){
							  echo "
                              <tr>
                                <td><input class='input-text' type='text' name='vpich$k'/></td>
								<td>
                                  <select name='vpich_salida$k' id='desde'>
                                    <option value='V'>V</option>
                                    <option value='P'>P</option>
                                    <option value='N'>N</option>
                                    <option value='S'>S</option>
                                  </select>
                                </td> 
							   
                                <td>
                                  <select name='vdesde$k' id='desde'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                  </select>
                                </td> 
                                
                                <td>
                                  <select name='vhasta$k' id='hasta'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                  </select>
                                </td> 
								<td>
                                  <select name='vpich_k$k' id='desde'>
                                    <option value='0'>0</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                    <option value='11'>11</option>
                                    <option value='12'>12</option>
                                    <option value='13'>13</option>
                                    <option value='14'>14</option>
                                    <option value='15'>15</option>
                                  </select>
                                </td> 
								
								<td>
                                  <select name='vpich_bb$k' id='desde'>
                                    <option value='0'>0</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                    <option value='7'>7</option>
                                    <option value='8'>8</option>
                                    <option value='9'>9</option>
                                    <option value='10'>10</option>
                                    <option value='11'>11</option>
                                    <option value='12'>12</option>
                                    <option value='13'>13</option>
                                    <option value='14'>14</option>
                                    <option value='15'>15</option>
                                  </select>
                                </td> 	
								</tr>";}
                              ?>
                              
                            </table>
                          </tr>
						  
                        </tr>



                        </table>


                        <hr>
                        
                
                        <div class="alinear-derecha flex">
                            <input class="boton" type="submit" value="Aceptar" align="center">
                            <input class="boton" type="reset">
                        </div>
                        
                     </fieldset>
                 </form>
             </p>
          </section>
           
         </div> <!-- fin div principal-->
        
        </main>
            
        <footer>
           <p>Todos los derechos reservados Francis Graco Ferrer Hierro</p>
        </footer>
        
</body>

</html>