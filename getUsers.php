<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les paramètres de recherche
$search = $_GET['search'] ?? '';
$services = $_GET['services'] ?? '';

// Construire la requête SQL
$sql = "SELECT * FROM users WHERE name LIKE ?";

// Ajouter un filtre pour les services si fourni
if (!empty($services)) {
    $serviceList = explode(',', $services);
    $placeholders = implode(',', array_fill(0, count($serviceList), '?'));
    $sql .= " AND (";
    foreach ($serviceList as $index => $service) {
        if ($index > 0) $sql .= " OR ";
        $sql .= "FIND_IN_SET(?, services)";
    }
    $sql .= ")";
}

$stmt = $conn->prepare($sql);

// Ajouter les paramètres dynamiquement
$params = ["%$search%"];
foreach ($serviceList as $service) {
    $params[] = $service;
}
$stmt->bind_param(str_repeat('s', count($params)), ...$params);

$stmt->execute();
$result = $stmt->get_result();

// Retourner les résultats sous forme de JSON
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);

$conn->close();
?>
