<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "killersquadron@gmail.com"; // Reemplaza con tu dirección de correo electrónico
    $asunto = "Nuevo mensaje del formulario de contacto";
    $cuerpo = "Nombre: " . $nombre . "\n";
    $cuerpo .= "Correo Electrónico: " . $email . "\n";
    $cuerpo .= "Mensaje:\n" . $mensaje . "\n";

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Envío del correo electrónico
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "<p>¡Gracias por tu mensaje! Te responderemos a la brevedad.</p>";
    } else {
        echo "<p>Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.</p>";
    }
} else {
    // Si alguien intenta acceder directamente al archivo PHP
    echo "<p>Acceso no permitido.</p>";
}
?>