<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=test_strip_travel', 'root', '');

// Fonction pour récupérer les 5 utilisateurs les plus récents
function getRecentUsers($pdo) {
    $stmt = $pdo->query('SELECT username, email, created_at FROM users ORDER BY created_at DESC LIMIT 5');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour récupérer les 5 réservations les plus récentes
function getRecentReservations($pdo) {
    $stmt = $pdo->query('SELECT from_location, to_destination, departure_date FROM reservations ORDER BY created_at DESC LIMIT 5');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer les données
$recentUsers = getRecentUsers($pdo);
$recentReservations = getRecentReservations($pdo);

// Récupérer le nombre total d'utilisateurs
$stmt = $pdo->query('SELECT COUNT(*) AS total FROM users');
$usersCount = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Récupérer le nombre total de réservations
$stmt = $pdo->query('SELECT COUNT(*) AS total FROM reservations');
$reservationsCount = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
      <ul>
    <li><a href="#" class="logo" style="font-weight: 900;">
     Travel <span style="color: red;">Plus</span> 
            </a></li>
      </ul> 
        <h2>Menu</h2>
        <ul>
          <li><a href="list_users.php"><i class="fas fa-users"></i> Utilisateurs</a></li>
          <li><a href="list_reservations.php"><i class="fas fa-ticket-alt"></i> Reservations</a></li>
          <li><a href="list_Trips.php"><i class="fas fa-users"></i> Trips</a></li>
          <li><a href="list_Drivers.php"><i class="fas fa-ticket-alt"></i> Driver</a></li>
          <li><a href="list_notification.php"><i class="fas fa-users"></i> Notification</a></li>
          <li><a href="list_setting.php"><i class="fas fa-users"></i> Setting</a></li> 
        </ul>
        <div style="margin-top: 150px; padding: 10px 20px;">
          <li style="list-style-type: none"><a href="#" style="color: white; text-decoration: none;">Logout</a></li>
        </div>
      </div>
  <div class="dashboard">
    <h1> DASHBORD </h1>
    <div class="cards">
      <div class="card">
        <h2>Number of accounts created</h2>
        <p>Total number of users  : <span id="usersCount"><?php echo $usersCount; ?></span></p>
      </div>
      <div class="card">
        <h2>Number of reservations</h2>
        <p> Total number of reservation : <span id="reservationsCount"><?php echo $reservationsCount; ?></span></p>
      </div>
      <div class="card">
      <h2>Buses</h2>
        <p>Total number of buses : <span id="usersCount"><?php echo $usersCount; ?></span></p>
        <p>buses available : <span id="usersCount"><?php echo $usersCount; ?></span></p>
      </div>
      <div class="card">
        <h2>Drivers</h2>
        <p>Total number of drivers: <span id="reservationsCount"><?php echo $usersCount; ?></span></p>
        <p>Drivers available : <span id="usersCount"><?php echo $usersCount; ?></span></p>
      </div>
      <div class="card">
        <h2>Trips</h2>
        <p>Total number of Trips: <span id="reservationsCount"><?php echo $usersCount; ?></span></p>
        <p>scheduled : <span id="usersCount"><?php echo $usersCount; ?></span></p>
        <p>completed : <span id="usersCount"><?php echo $usersCount; ?></span></p>
      </div>

    </div>
    <div class="tables">
      <div class="table">
        <h2>recent Users</h2>
        <table>
          <thead>
            <tr>
              <th>Number of users</th>
              <th>Email</th>
              <th>registration date</th>
            </tr>
          </thead>
          <tbody id="recentUsers">
            <?php foreach ($recentUsers as $user): ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="table">
        <h2>Réservations récentes</h2>
        <table>
          <thead>
            <tr>
              <th>Départ</th>
              <th>Destination</th>
              <th>Date de départ</th>
            </tr>
          </thead>
          <tbody id="recentReservations">
            <?php foreach ($recentReservations as $reservation): ?>
                <tr>
                    <td><?php echo $reservation['from_location']; ?></td>
                    <td><?php echo $reservation['to_destination']; ?></td>
                    <td><?php echo $reservation['departure_date']; ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
