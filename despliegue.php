<?php //se abre php

//se incluye el archivo funciones.
include("funciones.php");


echo conteo_usuario();//se invoca la funcion consulta

echo "<br>";//se hace espacio

echo calculo_v2(); //se invoca la funcion calculo_v2

echo "<br>";//se hace espacio

// Llama a la función para insertar un usuario
$resultado = insertarPersonas('4', 'maria sanches', '@weeen', '3', '1976-10-25', '3456744', '7');//digitar la informacion dek nuevo usuario

if ($resultado == 1) {//hacer una decicion con una condicion
    echo "Usuario agregado con éxito.";//primer resultado
} else {//si no se cumple la decicion
    echo "Error al agregar el usuario.";//resultado si no se cumple la condicion
}


echo "<br>";//se hace espacio


$Id = '2'; // Reemplaza '3' con el ID del usuario que deseas eliminar

$resultado = eliminarUsuario($Id); // Llama a la función eliminarUsuario

if ($resultado == 1) { // Comprueba si el usuario se eliminó con éxito
    echo "Usuario eliminado con éxito."; // Mensaje si el usuario se eliminó
} else {
    echo "Error al eliminar el usuario."; // Mensaje si hubo un error al eliminar el usuario
}



