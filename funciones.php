
<?php

//se una funcion
function consulta(){
    $salida="";//inicializa la variable
    $salida=10*2/2; //calculo del area de un triangulo.
    return $salida; //retornar al valor de la variable $salida
};


//se crea una nueva funcion (verbo infinitivo)
function calcular(){
    $salida = 0;//inicializa la variable
    $conexion=mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT");//conexion con la base de datos
    $sql= "SELECT 2+1 ";//realiza una suma sql
    $sql.= "AS suma";//renombrar la operacion.
    $r= $conexion->query($sql);//ejecuta una consulta.
    return $salida;//retornar al valor de la variable $salida
};