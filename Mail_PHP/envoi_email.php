<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; // Chemin vers PHPMailer autoloader

// Initialiser les variables de succès et d'erreur à false
$success = false;
$error = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['pseudo'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Envoyer un e-mail
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.ArcadiaZOO.fr';
        $mail->SMTPAuth = true;
        $mail->Username = 'Arcadia@ZOO.fr';
        $mail->Password = 'M1F7-56hA-ghf+';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Destinataire, sujet et contenu de l'e-mail
        $mail->setFrom($email, $nom);
        $mail->addAddress('contact.arcadiazoo@gmail.com'); // Votre adresse e-mail
        $mail->Subject = 'Nouveau message depuis le formulaire de contact';
        $mail->Body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";

        // Envoyer l'e-mail
        $mail->send();

        // Marquer l'envoi comme un succès
        $success = true;

    } catch (Exception $e) {
        // Capturer l'exception et stocker le message d'erreur
        $error = $e->getMessage();
    }
}

// Retourner une réponse JSON
header('Content-Type: application/json');
echo json_encode(array('success' => $success, 'error' => $error));
?>