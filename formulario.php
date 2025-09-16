<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = strip_tags(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = trim($_POST["mensaje"]);

   
    if (empty($nombre) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, completa el formulario correctamente.";
        exit;
    }

    
    $destinatario = "sofiapatinocampou@gmail.com";  
    $asunto = "Nuevo mensaje de contacto de $nombre";

   
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    
    $headers = "From: $nombre <$email>";

   
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "Gracias por contactarme, te responderé pronto.";
    } else {
        echo "Lo siento, ha ocurrido un error al enviar el mensaje.";
    }
} else {
    
    header("Location: index.html");
    exit;
}
?>
