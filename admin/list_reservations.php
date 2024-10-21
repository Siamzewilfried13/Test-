<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des réservations</title>
  <link href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }
    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #333;
      padding-top: 20px;
    }
    .sidebar h2 {
      color: white;
      text-align: center;
      margin-bottom: 20px;
    }
    .sidebar ul {
      padding: 0;
      list-style-type: none;
    }
    .sidebar ul li {
      padding: 10px;
    }
    .sidebar ul li a {
      color: white;
      text-decoration: none;
    }
    .sidebar ul li a:hover {
      background-color: #555;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #f2f2f2;
    }
    .action-buttons {
      display: flex;
    }
    .action-buttons a {
      margin-right: 5px; /* Ajout d'un léger espace entre les boutons */
    }
    @media (max-width: 768px) {
      .sidebar {
        width: 100%; /* Pour occuper la largeur de l'écran sur les petits appareils */
        height: auto; /* Pour ajuster la hauteur en fonction du contenu */
        position: static; /* Pour le flux normal du document */
      }
    
      .content {
        margin-left: 0; /* Pour enlever la marge sur les petits appareils */
      }
    }
  </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
          <li><a href="dashboard.php"><i class="bx bx-home"></i> Tableau de bord</a></li>
          <li><a href="users.php"><i class="bx bx-user"></i> Utilisateurs</a></li>
          <li><a href="reservations.php"><i class="bx bx-calendar"></i> Réservations</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Liste des réservations</h1>
        <table>
          <thead>
            <tr>
              <th>Nom du client</th>
              <th>Email</th>
              <th>Destination</th>
              <th>Date de départ</th>
              <th>Nombre de passagers</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Connexion à la base de données
            $pdo = new PDO('mysql:host=localhost;dbname=test_strip_travel', 'root', '');

            // Requête SQL pour récupérer les réservations avec les informations utilisateur
            $sql = "SELECT u.username, u.email, r.from_location, r.to_destination, r.departure_date, r.number_of_seats
                    FROM reservations r
                    JOIN users u ON r.user_id = u.user_id";
            $stmt = $pdo->query($sql);

            // Boucle à travers les réservations et affichage dans le tableau
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['to_destination'] . "</td>";
              echo "<td>" . $row['departure_date'] . "</td>";
              echo "<td>" . $row['number_of_seats'] . "</td>";
              echo "<td class='action-buttons'>";
              echo "<a href='#' class='btn btn-primary'><i class='bx bxs-edit'></i> Éditer</a>";
              echo "<a href='#' class='btn btn-danger'><i class='bx bxs-trash'></i> Supprimer</a>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
    </div>
</body>
</html>
