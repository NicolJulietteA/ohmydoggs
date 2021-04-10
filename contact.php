<?php
if (!empty($_POST["submit"])) {

        // EDITE LAS 2 LÍNEAS A CONTINUACIÓN SEGÚN SEA NECESARIO
        $email_to = "contacto@ohmydoggs.cl";

        $first_name = $_POST['first_name']; // required
        $last_name = $_POST['last_name']; // required
        $email = $_POST['user_email']; // required
        $phone = $_POST['user_phone']; // required
        $subject = $_POST['subject']; // required
        $content = $_POST['content']; // required

        $from = $first_name ." ". $last_name;
        $mailHeaders = "From: " . $from . "<" . $email . ">\r\n";

        if (mail($email_to, $subject, $content, $mailHeaders)) {
                $message = "Su información de contacto fue enviada con éxito.";
                $type = "success";
        }
?>
<?php
        header("Location: index.html");
}
?>