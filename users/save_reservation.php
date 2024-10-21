<?php
session_start(); // Démarrez la session si ce n'est pas déjà fait

// Vérifiez si l'utilisateur est connecté et s'il a un ID utilisateur dans la session
 if (!isset($_SESSION['user_id'])) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login.php");
    exit(); // requete pour sortir du script après la redirection
}

// Vérification des champs requis
$requiredFields = ['from_location', 'to_destination', 'departure_date', 'departure_time', 'number_of_seats', 'preferred_agency', 'status'];
$errors = array();

foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $errors[] = "Le champ $field est requis.";
    }
}

// Si des erreurs sont présentes, il seront afficher et le script sera arrêter
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    exit();
}

// Connexion à la base de données (à adapter en fonction  des informations de connexion)
$pdo = new PDO('mysql:host=localhost;dbname=test_strip_travel', 'root', '');

// Préparation de la requête SQL pour insérer une nouvelle réservation dans la base de données
$stmt = $pdo->prepare('INSERT INTO reservations (user_id, numb_adult, numb_children, infant, fare, round_trip, return_details, message, from_location, to_destination, departure_date, departure_time, number_of_seats, preferred_agency, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

// Récupération de l'ID utilisateur à partir de la session
$userId = $_SESSION['user_id'];

// Exécution de la requête SQL avec les données du formulaire et l'ID utilisateur
$stmt->execute([
    $userId, // Utilisation de l'ID utilisateur récupéré à partir de la session
    $_POST['numb_adult'] ?? 0,
    $_POST['numb_children'] ?? 0,
    $_POST['infant'] ?? 0,
    $_POST['fare'] ?? '',
    $_POST['round_trip'] ?? '',
    $_POST['return_details'] ?? '',
    $_POST['message'] ?? '',
    $_POST['from_location'] ?? '',
    $_POST['to_destination'] ?? '',
    $_POST['departure_date'] ?? '',
    $_POST['departure_time'] ?? '',
    $_POST['number_of_seats'] ?? 0,
    $_POST['preferred_agency'] ?? '',
    $_POST['status'] ?? ''
]);

// Réponse au client
echo 'Réservation enregistrée avec succès !';
header("Location: index.php");
?>
