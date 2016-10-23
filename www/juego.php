<!-- Autor: Camilo Figueroa ( Crivera ) 23/10/2016 -->

<html ng-app="acumuladorApp"><!--Hay que observar que aquí se inicia el ng-app-->
    
    <head>
        <title>Ahorcado</title>
    
        <script src="js/angular.min.js"></script>
    
        <!-- -->
    	<link rel="stylesheet" type="text/css" href="css/estilo-general.css">    
        <script src="js/funciones_generales.js"></script>
        
    </head>
    
    <body>
        
        Juego del ahorcado<br>
        
        <div ng-controller="acumuladorAppCtrl">
        
            <div id="gran-contenedor" ng-controller="acumuladorAppCtrl">
                
            </div>
            
            <div ng-model="datos" >{{ informacion  }}</div>            
        
        </div>

        
    </body>
    
</html>