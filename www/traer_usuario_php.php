<?php
    /**
     * Autor: Camilo Figueroa ( Crivera ) 23/10/2016
     * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
     */
    
    include( "funciones.php" );
    
    $salida = "";
    
    if( isset( $_GET[ 'documento' ] ) )  $salida = retornar_datos( $_GET[ 'documento' ] );
    
    echo $salida;
    
?>