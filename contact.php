<?php 
if(isset($_POST['submit'])){
        $to = "nishoful@gmail.com"; // Tu email
        $from = $_POST['email'];
        $name = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $phone = $_POST['phone'];
        $subject = "Mensaje enviado";
        $message = $name . $lastname . " escribió lo siguiente:" . "\n\n" . $_POST['comments'];

        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        echo "Mensaje enviado. Gracias " . $name . ", me pondré en contacto lo antes posible.";
    
}
?>