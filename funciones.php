
<?php

//se una funcion
function consulta(){
    $salida="";//inicializa la variable
    $salida=10*2/2; //calculo del area de un triangulo.
    return $salida; //retornar al valor de la variable $salida
};//cierra funcion


//se crea una nueva funcion (verbo infinitivo)
function calcular(){
    $salida = 0;//inicializa la variable

    $conexion=mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT");//conexion con la base de datos
    $sql= "SELECT 2+1 ";//realiza una suma sql
    $sql.= "AS suma";//renombrar la operacion.
    $r= $conexion->query($sql); //ejecuta una consulta.


while ($fila = mysqli_fetch_assoc($r)) {//recoge el recorset
    $salida += $fila['suma'];//incrementa o acumula
};

$conexion->close();//cierra la conexion

return $salida; //retornar al valor de la variable $salida

}; //cierra funcion

function calculo_v2()
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
