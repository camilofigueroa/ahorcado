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
        
    </head>
    
    <body>
        
        <div ng-controller="acumuladorAppCtrl">
        
            <div id="gran-contenedor" ng-controller="acumuladorAppCtrl">
                <!-- Todo el contenido de este div se creará automáticamente desde el js.  -->                
            </div>
            
            <div>
            
                <div id="contenedor-formulario-datos">
                    
                    Documento   <input type="text" ng-model="datos.documento" ng-change="traer_usuario_php();"> <br>
                    Nombre   <input type="text" ng-model="datos.nombre"> <br>
                    <button id="boton-guardar" ng-click="guardar_datos_php()" value="Guardar y jugar.">Guardar y jugar.</button>
                    
                    <!-- Este botón permanecerá oculto pues su funcionalidad será usada por el javascript con Angular. -->
                    <button id="boton-ranking" ng-click="cargar_datos_php()">Ver ranking.</button>
                    
                    <!-- Este botón permanecerá oculto pues su funcionalidad será usada por el javascript con Angular. -->
                    <button id="boton-actualizar" ng-click="actualizar_fecha_fin( 54364, 0 )">Actualizar datos.</button>
                    
                </div>
                
                
                <div id="contenedor-ranking">
                    
                    <h3>Ranking</h3> o resultados de la b&uacute;squeda. 
                    
                    <!-- Esto sucede cuando se guarda un usuario. -->
                    <div ng-repeat="x in campos">
                        <strong>{{ x.Tiempo_juego }}</strong>
                        Documento: {{ x.Documento }}
                        Nombre: {{ x.Nombre }}
                        Fecha inicio: {{ x.Fecha_registro }}
                        Fecha fin: {{ x.Fecha_fin }}
                        [{{ x.estado }}]
                    </div>
                    
                </div>
            </div>
        
        </div>

        
    </body>
    
</html>