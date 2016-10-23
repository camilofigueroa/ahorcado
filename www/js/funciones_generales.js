/**
 * Autor: Camilo Figueroa ( Crivera ) 23/10/2016
 * Este es el código para el clásico juego del ahorcado. Aunque con unas variaciones.
 */


//------------------- Declaración de variables globales -----------------------------------------------------------------------------------------

const g_maximo_fallos = 7;
const g_tiempo_iteracion = 1000;
const g_maximo_tiempo = 2;

var g_arreglo_palabras = []; //Arreglo multidimensional para almacenar todas las palabras y sus características.
var g_indice_palabra = -1;
var g_palabra = "";
var g_conteo_equivocaciones = 0;
var g_minuto = 0, g_segundo = 0;
var g_objeto_temporizador = "";


//--------------------Desde aquí se empieza a cargar todo ---------- From here everything is loaded -------------------------------------------
window.onload = function()
{
    console.log( "Funcionando." );   
    colocar_palabras();    
    document.getElementById( "gran-contenedor" ).innerHTML = definir_interfaz();
};


//---------------------------------- F U N C I O N E S ------------------------------------------------------------------------------------------

/**
 * Esta función define gran parte de la interfaz del sistema con respecto a la palabra elegida y a los controles que existen para el juego|.
 * 
 */
function definir_interfaz()
{
	var salida = "";

    g_indice_palabra = traer_aleatorio_en_rango( 0, g_arreglo_palabras.length - 1 );
    g_palabra = g_arreglo_palabras[ g_indice_palabra ].palabra;
    //console.log( "La palabra elegida es: " + g_palabra + " y su longitud es " + g_palabra.length  );
    salida += definir_html_indicadores();
    salida += definir_textos( g_palabra.length );
    salida += definir_teclado();

    //Ojo, aqupi está el botón empezar.
    salida += "<div id='contenedor-navegacion-grande'><input type='button' id='boton-empezar' value='Jugar' onclick='empezar( this );'></div>";

    return salida;
}

/**
 * Define los contenedores y el html de las cosas que se tiene que mostrar, como la imagen del muñeco y el temporizaror.
 */
function definir_html_indicadores()
{
    var salida = "";

    salida += "<div id='contenedor-temporizador'>";
    salida += "0";
    salida += "</div>";

    salida += "<div id='contenedor-imagen'>";
    salida += "0";
    salida += "</div>";

    return salida;
}

/**
 * Esta función se encarga de pintar y definir los métodos y eventos del teclado.
 */
function definir_teclado()
{
    var salida = "";

    salida += "<div id='contenedor-teclado'>";

    for( var i = 65; i <= 65 + 25; i ++ )
    {
        salida += "<input type='button' id='boton" + i + "' class='botonera' value='" + String.fromCharCode( i ) + "' onclick='al_dar_clic( this );' >";
    }

    salida += "</div>";

    return salida; 
}

/**
 * Define las cajas de texto de acuerdo a un valor numérico.
 * @param       numero          Cuantos es cuántos textos se deben colocar de acuerdo a las letras de la palabra.
 * @return      texto           Html o texto que lo representa, y formará las cajas de texto sobre las que se podrá escribir.
 */
function definir_textos( cuantos )
{
    var salida = "";

    salida += "<div id='contenedor-textos-letras'>";

    for( var i = 1; i <= cuantos; i ++ )
    {
        //salida += "<input type='text' id='texto-entrada-" + i + "' class='texto-entrada' name='" + i + "' maxlength='1' size='1' onkeyup ='al_digitar_letra( this );'>";
        salida += "<input type='text' id='texto-entrada-" + i + "' class='texto-entrada' name='" + i + "' maxlength='1' size='1'>";
    }

    salida += "</div>";

    return salida;
}

/**
 * Esta función se encarga de verificar si alguien ha ganado, o ha perdido.
 */
function verificar_ganador( des )
{
    var sn_ganador = 0;
    var i = 0;
    var tmp_input = "";
    var arreglo = g_palabra.split( "" );
    var agrupa_palabra = "";

    for( i = 1; i <= g_palabra.length; i ++ )
    {
        tmp_input = document.getElementById( "texto-entrada-" + i );
        //console.log( i + ": " + tmp_input.value + " -> " + arreglo[ i - 1 ] );
        agrupa_palabra += tmp_input.value;
    }

    //Aquí se verifica si la palabra compuesta de letras digitadas es la mismas de la palabra aleatoria del juego.
    if( agrupa_palabra.toLowerCase() == g_palabra.toLowerCase() )
    {
        sn_ganador = 1;
        clearInterval( g_objeto_temporizador );

    }else{
            //En esta parte se establece un perdedor si es lo que se desea de esta función, 
            if( des == -1 )
            {
                sn_ganador = -1;
                clearInterval( g_objeto_temporizador );
            }
        }


    return sn_ganador;
    //console.log( objeto );
}

/**
 * Inicialmente se había planeado digitar el texto, pero después de recordar como era el juego original se procedió a crear
 * un teclado para facilitar el tema de usabilidad.
 * @param           objeto          El texto del cual se está tecleando.
 */
function verificar_letra_digitada( objeto )
{
    var cad = objeto.value + "";
    var nom = objeto.name;
    var letra_de_palabra = g_palabra.substr( nom * 1 - 1, 1 ); 

    //Convertimos todo a minúsculas.
    objeto.value = cad.toLowerCase();

    if( letra_de_palabra.toLowerCase() != cad.toLowerCase() )
    {
        g_conteo_equivocaciones ++;
        document.getElementById( "contenedor-imagen" ).innerHTML = g_conteo_equivocaciones;
    }

    //console.log( "Se digitó sobre el texto " + objeto.name );
    //Aquí se imprimen valores que son contra lo que ha digitado el usuario.
    //console.log( cad + " " + letra_de_palabra );
}

/**
 * Verifica si la letra que se ha oprimido desde un botón está en la palabra y la acomoda.
 * @param       objeto          botón que representa una letra al cual se le dió clic.
 */
function verificar_letra_oprimida( objeto )
{
    var arreglo = g_palabra.split( "" );
    var cad1 = "", cad2 = objeto.value;
    var sn_encontrada = 0;

    for( var i = 0; i < arreglo.length; i ++  )
    {
        cad1 = arreglo[ i ] + "";

        //console.log( cad1.toLowerCase() + " " + cad2.toLowerCase() );

        if( cad1.toLowerCase() == cad2.toLowerCase() )
        {
            sn_encontrada = 1; //Se ha encontrado la letra entonces no será un error.
            console.log( "Encontrada la letra " + cad2 + " en " + g_palabra );
            document.getElementById( "texto-entrada-" + ( i + 1 ) ).value = cad1.toLowerCase();  
        }
    }

    if( sn_encontrada != 1 )
    {
        g_conteo_equivocaciones ++;
        document.getElementById( "contenedor-imagen" ).innerHTML = g_conteo_equivocaciones;
        objeto.style.color = "RED";
        objeto.style.fontSize = 15; 

    }else{
            objeto.style.color = "BLUE";
        }

    //Hay que desaparecer la letra.
}

/**
 * Trae un número aleatorio definido entre un rango.
 * @param       número          Mínimo valor que se puede traer en un aleatorio.
 * @param       número          Máximo número aleatorio que se puede traer en un rango.
 * @return      número          Valor aleatorio o número aleatorio entre ese rango definido.
 */
function traer_aleatorio_en_rango( minimo, maximo ) 
{
    return Math.floor(Math.random() * ( maximo - minimo + 1)) + minimo;
}

/**
 * Esta función almacena todas las palabras en el vector para el juego.
 *
 */
function colocar_palabras()
{
    g_arreglo_palabras.push( { palabra: "monetizar",        descripcion: "Todo escritor de blogs y páginas web debería realizar esta actividad." } );
    g_arreglo_palabras.push( { palabra: "teletrabajo",      descripcion: "Es una modalidad de trabajo que se vale de las TIC y le permite al trabajor laborar desde un lugar diferente a la oficina." } );
    g_arreglo_palabras.push( { palabra: "tecnologia" ,      descripcion: "Es una parte importante de la modalidad de teletrabajo pues permite realizar lo técnico, desde el mismo trabajo hasta el cobro del pago." } );
}

/**
 * Esta función se encarga de mostrar solamente lo que se vería si alguien ganara o perdiera. No toma desiciones a no ser que sean de aspecto. 
 */
function mostrar_ganador_perdedor( mensaje )
{
    //Esto se debe remplazar por una imagen.
    document.getElementById( "contenedor-imagen" ).innerHTML = mensaje;
}

//------------------------------ E V E N T O S ------------------------------------------------------------------------------------------------

/**
 * Da inicio a todo esto.
 */
function empezar( objeto )
{
    definir_temporizador();
    objeto.style.visibility = "hidden";
}

/**
 * Recoge lo que implica el evento keyup en cada texto de cada letra de la palabra secreta del juego.
 * Esta función pasará a ser obsoleta cuando se construya el teclado del juego. No se juega oprimiendo, se juega dando clic.
 */
function al_digitar_letra( objeto )
{
    verificar_letra_digitada( objeto );

    if( verificar_ganador( 0 ) == 1 )
    {
        mostrar_ganador_perdedor( "¡Ganaste!" );
    } 
}

/**
 * Esta función se encarga de tomar el evento de cada botón del teclado.
 */
function al_dar_clic( objeto )
{
    verificar_letra_oprimida( objeto );

    if( verificar_ganador( 0 ) == 1 )
    {
        mostrar_ganador_perdedor( "¡Ganaste!" );
    }
}

/**
 * Se encarga de definir el reloj. 
 */
function definir_temporizador()
{
    g_objeto_temporizador = setInterval( al_suceder_tiempo, g_tiempo_iteracion );
}

/**
 * Esta función se encarga de ejecutar todo lo que tiene que ver con el tiempo.
 */
function al_suceder_tiempo()
{
    var d = new Date();
    var tiempo_local = d.toLocaleTimeString();
    var cad = "";

    g_segundo ++; //Como esta función se ejecuta cada segundo, los segundos deberán incrementarse.
    
    if( g_segundo >= 60 ) //Si el contador de segundos llega a sesenta, los segundos deberán ser cero para dar llevar el tiempo como un cronómetro.
    {
        g_segundo = 0;
        g_minuto ++;
    }

    //Si el tiempo en minutos supera el máximo escogido en la declaración de variables, se deberá verificar si se ganó o perdió y terminar el juego. 
    if( g_minuto > g_maximo_tiempo - 1 ) 
    {
        //Se verifica si el jugador ha perdido, no se verifica si ha ganado porque esto sucederá instantáneamente cuando suceda indiferente del tiempo.
        if( verificar_ganador( -1 ) == -1 )
        {
            //Aquí se muestra el mensaje.
            mostrar_ganador_perdedor( "¡Perdiste!" );
        }
    }

    //El sistema está verificando en todo moemnto que las equivocaciones no sobrepasen las máximas permitidas.
    if( g_conteo_equivocaciones >= g_maximo_fallos )
    {
        g_conteo_equivocaciones = g_maximo_fallos; //Esto se acomoda porque los fallos darán paso a los gráficos.
        mostrar_ganador_perdedor( "¡Perdiste!" );
        clearInterval( g_objeto_temporizador );
    }         

    //Esta cadena organiza el tiempo para que se vea como un cronómetro.
    cad = ( g_minuto < 10 ? "0" + g_minuto: g_minuto + "" ) + ":" + ( g_segundo < 10 ? "0" + g_segundo: g_segundo + "" );

    //console.log( g_minuto + ": " + g_segundo );

    //Aquí se afecta el contenedor o div para que muestre la cadena o el cronómetro.
    document.getElementById( "contenedor-temporizador" ).innerHTML = cad + " " + d.toLocaleTimeString();  
}