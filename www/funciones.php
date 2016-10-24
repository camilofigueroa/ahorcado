<?php

    /**
     * Autor: Camilo Figueroa ( Crivera ) 23/10/2016
     * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
     */

     /**
      * Esta función se encarga de escribir datos en un archivo, es solo una función para pruebas, no es funcional en el programa.
      */
    function retornar_datos( $dato = null )
    {
        include( "config.php" );
        
        $salida = "";

        //Solo los registros del día serán tomados en cuenta.        
        $sql  = " SELECT *, CASE WHEN sn_ganador = 1 THEN 'A' ELSE 'D' END AS estado FROM tb_usuarios ";
        
        if( $dato != null )
        {
            $sql .= " WHERE TRIM( documento ) = TRIM( '$dato' ) ";
            
        }else{
            
            $sql .= " WHERE YEAR( NOW() ) * 10000 + MONTH( NOW() ) * 100 + DAY( NOW() ) = YEAR( fecha_registro ) * 10000 + MONTH( fecha_registro ) * 100 + DAY( fecha_registro )  ";
            $sql .= " AND tiempo_juego IS NOT NULL ";
            $sql .= " AND sn_ganador IS NOT NULL ";
            $sql .= " AND sn_ganador = 1 ";
            $sql .= " ORDER BY tiempo_juego ASC, fecha_registro DESC LIMIT 10  ";    
        }
        
        
        
        escribir_archivo( $sql." -> ".$dato, "archivo_select" );
        
        $conexion = new mysqli( $servidor, $usuario, $clave, $base_de_datos );
        $result = $conexion->query( $sql );
        
        while( $rs = $result->fetch_array( MYSQLI_ASSOC ) ) 
        {
            //Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
            if ($salida != "") {$salida .= ",";}
            $salida .= '{"Documento":"'.$rs["documento"].'",';            // <-- La tabla MySQL debe tener este campo.
            $salida .= '"Nombre":"'.$rs["nombre"].'",';         // <-- La tabla MySQL debe tener este campo.
            $salida .= '"Fecha_fin":"'.$rs["fecha_fin"].'",';
            $salida .= '"Tiempo_juego":"'.$rs["tiempo_juego"].'",';
            $salida .= '"sn_ganador":"'.$rs["sn_ganador"].'",';
            $salida .= '"estado":"'.$rs["estado"].'",';     
            $salida .= '"Fecha_registro":"'.$rs["fecha_registro"].'"}';     // <-- La tabla MySQL debe tener este campo.
        }
        
        $salida ='{"records":['.$salida.']}';        
        
        $conexion->close();
        
        //escribir_archivo( "Salida ".$salida, "archivo_funciones_1" );
        
        return $salida;
    }
    
     /**
      * Esta función se encarga de actualizar la fecha de fin del jugador.
      */
    function actualizar_fecha_fin( $documento = null, $sn_ganador = null )
    {
        include( "config.php" );
        
        $salida = "";
        
        $sql  = " UPDATE tb_usuarios  ";
        $sql .= " SET fecha_fin    = NOW(),  ";
        $sql .= "     tiempo_juego = TIMEDIFF( fecha_fin, fecha_inicio ) ";
        if( $sn_ganador != null  ) $sql .= ", sn_ganador = '$sn_ganador' ";
        $sql .= " WHERE TRIM( documento ) = TRIM( '$documento' ) ";
        
        $conexion = new mysqli( $servidor, $usuario, $clave, $base_de_datos );
        $result = $conexion->query( $sql );
        
        $conexion->close();
        
        //escribir_archivo( "Salida ".$salida, "archivo_funciones_1" );
    }
    
    
    /**
    * Escribe en un archivo un resultado enviado por parámetro.
    * @param        texto       mensaje a escribir en el archivo.
    */
    function escribir_archivo( $mensaje, $complemento_nombre = null )
    {
        if( $complemento_nombre == null ) $complemento_nombre = "";

        $apuntador = fopen( "sql".$complemento_nombre.".txt", "w" );
        fwrite( $apuntador, $mensaje );
        fclose( $apuntador );
    }