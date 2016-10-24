<?php
    /**
     * Autor: Camilo Figueroa ( Crivera ) 23/10/2016
     * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
     */
    
    include( "funciones.php" );
    
    if( isset( $_GET[ 'documento' ] ) && isset( $_GET[ 'sn_ganador' ] ) )
    actualizar_fecha_fin( $_GET[ 'documento' ], $_GET[ 'sn_ganador' ] );
    
    echo  retornar_datos();
?>