<!-- Autor: Camilo Figueroa ( Crivera ) 23/10/2016 -->

<?php
    
    include( "funciones.php" );
    
?>

<html ng-app="acumuladorApp"><!--Hay que observar que aquí se inicia el ng-app-->
    
    <head>
        <title>Ahorcado</title>
    
        <script src="js/angular.min.js"></script>
    
        <!-- -->
    	<link rel="stylesheet" type="text/css" href="css/estilo-general.css">    
        <script src="js/funciones_generales.js"></script>

        <?php include("libreria.php"); ?>
        
    </head>
    
	<body>

		<div class="container-fluid">

			<?php include('encabezado.php'); ?>

			<div class="row">
				
				<div ng-controller="acumuladorAppCtrl">
					
					<!-- <div id="gran-contenedor" ng-controller="acumuladorAppCtrl"> -->
					<div id="gran-contenedor">
						<!-- Todo el contenido de este div se creará automáticamente desde el js.  -->                
					</div>
				 
					<div> <!-- este div no tiene estilo ni nada, apenas es de agrupamiento -->
					
						<div class="row" id="contenedor-formulario-datos">
							
							<div class="col-xs-12 col-md-5">
								<input type="text" id="campo-documento" class="form-control" placeholder="Documento" ng-model="datos.documento" ng-change="traer_usuario_php();">
							</div>    
							
							<div class="col-xs-12 col-sm-5 col-md-5">
								<input type="text" id="campo-nombre" class="form-control" placeholder="Nombre" ng-model="datos.nombre">
							</div>    
							
							<div class="col-xs-12 col-md-2">
								<button id="boton-guardar" class="btn btn-primary" ng-click="guardar_datos_php()" value="Guardar y jugar.">Guardar y jugar.</button>
							</div>    
								
							<!-- Este botón permanecerá oculto pues su funcionalidad será usada por el javascript con Angular. -->
							<button id="boton-ranking" ng-click="cargar_datos_php()">Ver ranking.</button>
							
							<!-- Este botón permanecerá oculto pues su funcionalidad será usada por el javascript con Angular. -->
							<button id="boton-actualizar" ng-click="actualizar_fecha_fin( 54364, 0 )">Actualizar datos.</button>
								
						</div> <!-- contenedor-formulario-datos -->
						
					</div> <!-- este div no tiene estilo ni nada, apenas es de agrupamiento -->
						
					<!-- Desde aquí empieza el ranking  RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING -->
					<div id="contenedor-ranking">
						<div id="contenedor_titulo_ranking"><h3>Ranking</h3></div>
						<table>
							<tr>
								<td width="200px;"><b>Duración</b></td>
								<td width="150px;"><b>Documento</b></td>
								<td width="150px;"><b>Nombre</b></td>
								<td width="250px;"><b>Fecha inicio</b></td>
								<td width="250px;"><b>Fecha fin</b></td>
								<td width="150px;"><b>Estado</b></td>                            
							</tr>
						</table>
						<br>
						<!-- Esto sucede cuando se guarda un usuario. -->
						<div ng-repeat="x in campos">
							<table>
								<tr>
									<td width="200px;"><strong>{{ x.Tiempo_juego }}</strong></td>
									<td width="150px;">{{ x.Documento }}</td>
									<td width="150px;">{{ x.Nombre }}</td>
									<td width="250px;">{{ x.Fecha_registro }}</td>
									<td width="250px;">{{ x.Fecha_fin }}</td>
									<td width="150px;">{{ x.estado }}</td>
								</tr>
							</table>
						</div>
					</div> <!-- contenedor-ranking -->
					<!-- Aquí termina el ranking  RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING RANKING -->

				</div>

				<hr>
				
				<!-- <div class="row" padding='5px';"> este error es del señor Eduard Cruz y queda como evidencia de sus embarradas -->
				<div class="row"> 
					<div class="col-xs-12 col-md-3"></div>
					<div class="col-xs-12 col-md-6"><center><h4>TGO. ADSI</h4><h6>adsi1132133.blogspot.com</h6></center></div>
					<div class="col-xs-12 col-md-3"></div>
				</div>		   

			</div> <!-- row -->
		</div> <!-- container-fluid -->

	</body>
    
</html>