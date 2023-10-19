
<?php //se abre php


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


while ($fila = mysqli_fetch_assoc($r)) {//recoge el recordset
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

    while ($fila = $resultado->fetch_assoc()) { // Recoge el recordset
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

    while ($fila = $resultado->fetch_assoc()) { // Recoge el recordset
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

    while ($fila = $resultado->fetch_assoc()) { // Recoge el recordset
        $salida = $fila['cantidad']; // Obtiene el valor del recuento
    }

    $conexion->close(); // Cierra la conexión

    return $salida; // Retorna el valor de la variable $salida
}



function insertarPersonas($Id, $nombre, $correo, $clave, $cumple, $telefono, $n) {//crear funcion insertarPersonas
    $salida = 0; // Inicializa la variable
    $conexion = mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT"); // Conexión a la base de datos

    if ($conexion === false) {//hacer una condicion con un if
        die("Error de conexión: " . mysqli_connect_error());//error de conexion
    }

    // Comprobamos si el ID ya existe
    $sql_comprobar = "SELECT * FROM Usuarios WHERE Id = ?"; // Usar un marcador de posición
    $stmt = mysqli_prepare($conexion, $sql_comprobar);//preparar una consulta SQL parametrizada usando MySQL
    mysqli_stmt_bind_param($stmt, "s", $Id);//vincular un valor a una consulta SQL parametrizada. La letra "s" indica que el valor es una cadena (string)
    //"String" o "cadena" se refiere a una secuencia de caracteres, como texto.
    mysqli_stmt_execute($stmt);//función que realiza la consulta SQL preparada con los valores proporcionados y la ejecuta en la base de datos
    $resultado = mysqli_stmt_get_result($stmt);//obtener el resultado de lo seleccionado

    if (mysqli_num_rows($resultado) > 0) {
        // Cuando el ID ya existe
        $salida = 0;
    } else {
        // Cuando el ID no existe
        $sql = "INSERT INTO Usuarios(Id, Nombre_usuario, Correo, Contraseña, Cumpleaños, Telefono, `N°`) VALUES (?, ?, ?, ?, ?, ?, ?)"; // Consulta parametrizada

        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssi", $Id, $nombre, $correo, $clave, $cumple, $telefono, $n);
        if (mysqli_stmt_execute($stmt)) {
            $salida = 1;
        } else {
            $salida = 0;
        }
    }

    mysqli_stmt_close($stmt);

    $conexion->close(); // Cierre de la conexión

    return $salida; // Retorna el resultado
}


function eliminarUsuario($Id) {
    $salida = 0; // Inicializa la variable
    $conexion = mysqli_connect("localhost", "root", "root", "RUBLE_FORGOTAPP_PROYECT"); // Conexión a la base de datos

    if ($conexion === false) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Comprobamos si el ID existe
    $sql_comprobar = "SELECT * FROM Usuarios WHERE Id = ?"; // Usamos un marcador de posición
    $stmt = mysqli_prepare($conexion, $sql_comprobar);
    mysqli_stmt_bind_param($stmt, "s", $Id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        // Cuando el ID existe
        $sql = "DELETE FROM Usuarios WHERE Id = ?"; // Consulta parametrizada para eliminar el usuario

        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $Id);
        if (mysqli_stmt_execute($stmt)) {
            $salida = 1; // Usuario eliminado con éxito
        } else {
            $salida = 0; // Error al eliminar el usuario
        }
    }

    mysqli_stmt_close($stmt);

    $conexion->close(); // Cierre de la conexión

    return $salida; // Retorna el resultado
}



