<?php
if (isset($_POST['email'])) {

        // EDITE LAS 2 LÍNEAS A CONTINUACIÓN SEGÚN SEA NECESARIO
        $email_to = "jpastucon@gmail.com";
        $email_subject = "New form submissions";

        function problem($error)
        {
                echo "Lo sentimos mucho, pero se encontraron errores en el formulario que envió.. ";
                echo "Estos errores aparecen a continuación.<br><br>";
                echo $error . "<br><br>";
                echo "Regrese y corrija estos errores.<br><br>";
                die();
        }

        // validación de datos esperados
        if (
                !isset($_POST['first_name']) ||
                !isset($_POST['last_name']) ||
                !isset($_POST['email']) ||
                !isset($_POST['phone']) ||
                !isset($_POST['comments'])
        ) {
                problem('Lo sentimos, pero parece haber un problema con el formulario que envió.');
        }

        $first_name = $_POST['first_name']; // required
        $last_name = $_POST['last_name']; // required
        $email = $_POST['email']; // required
        $phone = $_POST['phone']; // required
        $comments = $_POST['comments']; // required

        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

        if (!preg_match($email_exp, $email)) {
                $error_message .= 'La dirección de correo electrónico que ingresó no parece ser válida.<br>';
        }

        $string_exp = "/^[A-Za-z .'-]+$/";

        if (!preg_match($string_exp, $first_name)) {
                $error_message .= 'El nombre que ingresó no parece ser válido.<br>';
        }
        if (!preg_match($string_exp, $last_name)) {
                $error_message .= 'El apellido que ingresó no parece ser válido.<br>';
        }

        if (strlen($comments) < 2) {
                $error_message .= 'El mensaje que ingresó parece ser muy corto.<br>';
        }

        if (strlen($error_message) > 0) {
                problem($error_message);
        }

        $email_message = "Detalles del formulario a continuación.\n\n";

        function clean_string($string)
        {
                $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                return str_replace($bad, "", $string);
        }
        $name = $first_name . " " . $last_name;

        $email_message .= "Name: " . clean_string($name) . "\n";
        $email_message .= "Email: " . clean_string($email) . "\n";
        $email_message .= "Message: " . clean_string($comments) . "\n";

        // crea el encabezado del correo electrónico
        $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: ' . $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
?>
<?php
        header ("Location: index.html");
        }
?>