<?php
	include("conexion.php");
    echo "bbb1";


if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);

    $query = "UPDATE usuarios SET imagen = ? WHERE id = 1";
    $stmt = $conex->prepare($query);
    $stmt->bind_param("b", $imagen); // Cambiado a "s" para datos binarios
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(500);
}
?>
