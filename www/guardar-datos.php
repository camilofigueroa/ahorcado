<?php
    /**
     * Autor: Camilo Figueroa ( Crivera ) 23/10/2016
     * Este php me permite usar el poder del php con un ejemplo de la tecnolog�a AngularJS...
     */
    
    include( "funciones.php" );
    
    //escribir_archivo( "Entrando nivel 0 programa.", "archivo0" );
    
    if( isset( $_GET[ 'documento' ] ) && isset( $_GET[ 'nombre' ] ) )
    {
        include( "config.php" );
     
        //escribir_archivo( "Entrando nivel 1 programa.", "archivo1" );
     
        $documento  = $_GET[ 'documento' ];
        $nombre     = $_GET[ 'nombre' ];
        $salida = "";
        
        /*Esta conexión se realiza para la prueba con angularjs*/
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        
        $conexion = new mysqli( $servidor, $usuario, $clave, $base_de_datos );
        
        $sql  = " INSERT INTO tb_usuarios( documento, nombre, fecha_registro, fecha_inicio )  ";
        $sql .= " VALUES( '$documento', '$nombre', NOW(), NOW() ); ";
        
        //escribir_archivo( $sql, "archivo1" );
        
        $result = $conexion->query( $sql );
        
        //Esta funci�n est� definida en el archivo de funciones.
        $salida = retornar_datos();
        
        echo( $salida );
    
    }
?>