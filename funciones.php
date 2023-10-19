
<?php


function consulta()//se crea una funcion
{
    $salida="";//inicializa la variable
    $salida=10*2/2; //calculo del area de un triangulo.
    return $salida; //retornar al valor de la variable $salida
};//cierra funcion



function calcular()//se crea una nueva funcion (verbo infinitivo)
{
    $salida = 0;//inicializa la variable

    $conexion=mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT");//conexion con la base de datos
    $sql= "SELECT 2+1 as suma";//realiza una suma y renombrar sql
    $r= $conexion->query($sql); //ejecuta una consulta.


while ($fila = mysqli_fetch_assoc($r)) {//recoge el recorset
    $salida += $fila['suma'];//incrementa o acumula
};

$conexion->close();//cierra la conexion

return $salida; //retornar al valor de la variable $salida

}; //cierra funcion

function calculo_v2()//se crea una funcion
{
    $salida = 0; // Inicializa la variable

    $conexion = mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT"); // Conexión con la base de datos
    $sql = "SELECT 10 as n1, 20 as n2, (10 + 20) as sumas"; // Consulta SQL para calcular la suma de 10 y 20 y renombrarla como 'sumas'
    $resultado = $conexion->query($sql); // Ejecuta la consulta

    while ($fila = $resultado->fetch_assoc()) { // Recoge el recorset
        $salida += $fila['sumas']; // Incrementa o acumula
    };

    $conexion->close(); // Cierra la conexión

    return $salida; // Retorna el valor de la variable $salida
}

function edad()//se crea una funcion
{
    $salida = 0; // Inicializa la variable

    $conexion = mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT"); // Conexión con la base de datos
    $sql = "SELECT 30 as edad"; // Consulta SQL para obtener la edad 
    $resultado = $conexion->query($sql); // Ejecuta la consulta

    while ($fila = $resultado->fetch_assoc()) { // Recoge el recorset
        $salida = $fila['edad']; // Almacena la edad en la variable $salida

        $mensaje = ($salida >= 18) ? "Es mayor de edad" : "Es menor de edad";//se realiza un operador ternario (forma que reemplaza el if/also y es mas corta)
    }

    $conexion->close(); // Cierra la conexión

    return $mensaje; // Retorna el mensaje de edad
}

function conteo_usuario()//se crea una funcion
{
    $salida = 0; // Inicializa la variable

    $conexion = mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT"); // Conexión con la base de datos
    $sql = "SELECT COUNT(*) AS cantidad FROM Usuarios"; // Consulta SQL para contar los usuarios
    $resultado = $conexion->query($sql); // Ejecuta la consulta

    while ($fila = $resultado->fetch_assoc()) { // Recoge el recorset
        $salida = $fila['cantidad']; // Obtiene el valor del recuento
    }

    $conexion->close(); // Cierra la conexión

    return $salida; // Retorna el valor de la variable $salida
}
