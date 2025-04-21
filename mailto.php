<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "contacto@raicessostenibles.com"; // Reemplaza con tu dirección de correo electrónico
    $asunto = "Nuevo mensaje del formulario de contacto";
    $cuerpo = "Nombre: " . $nombre . "\n";
    $cuerpo .= "Correo Electrónico: " . $email . "\n";
    $cuerpo .= "Mensaje:\n" . $mensaje . "\n";

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Envío del correo electrónico
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        // Redirigir al usuario a la página "Gracias"
        header("Location: /gracias"); // Asegúrate de que esta ruta coincida con la de tu componente Gracias en React
        exit(); // Es importante terminar la ejecución del script después de la redirección
    } else {
        echo "<p>Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.</p>";
    }
} else {
    // Si alguien intenta acceder directamente al archivo PHP
    echo "<p>Acceso no permitido.</p>";
}
?>