<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreCompleto = $_POST["nombre_completo"];
    $correo = $_POST["correo"];
    $dniCe = $_POST["dni_ce"];
    $telefono = $_POST["telefono"];
    $provincia = $_POST["provincia"];
    $distrito = $_POST["distrito"];
    $direccion = $_POST["direccion"];
    $productoServicio = $_POST["producto_servicio"];
    $detalleReclamo = $_POST["detalle_reclamo"];

    $destinatario = "reclamos@raicessostenibles.com"; // Reemplaza con el correo para reclamos
    $asunto = "Nuevo Reclamo del Libro de Reclamaciones";
    $cuerpo = "Nombre Completo: " . $nombreCompleto . "\n";
    $cuerpo .= "Correo Electrónico: " . $correo . "\n";
    $cuerpo .= "DNI o CE: " . $dniCe . "\n";
    $cuerpo .= "Teléfono: " . $telefono . "\n";
    $cuerpo .= "Provincia: " . $provincia . "\n";
    $cuerpo .= "Distrito: " . $distrito . "\n";
    $cuerpo .= "Dirección: " . $direccion . "\n";
    $cuerpo .= "Producto/Servicio: " . $productoServicio . "\n";
    $cuerpo .= "Detalle del Reclamo:\n" . $detalleReclamo . "\n";

    $headers = "From: " . $correo . "\r\n";
    $headers .= "Reply-To: " . $correo . "\r\n";

    // Envío del correo electrónico
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        // Redirigir al usuario a la página "Gracias"
        header("Location: /gracias");
        exit();
    } else {
        echo "<p>Hubo un error al enviar su reclamo. Por favor, inténtelo de nuevo más tarde.</p>";
    }
} else {
    // Si alguien intenta acceder directamente al archivo PHP
    echo "<p>Acceso no permitido.</p>";
}
?>