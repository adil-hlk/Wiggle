<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'Utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section>
        <h2 class="text-uppercase fw-bold text-start pt-2">Rechercher des utilisateurs</h2>

        <!-- Barre de recherche et filtres -->
        <input type="text" id="searchInput" placeholder="Rechercher un nom..." />
        <select id="serviceFilter" multiple>
            <option value="Promenade">Promenade</option>
            <option value="Hébergement">Hébergement</option>
            <option value="Garderie">Garderie</option>
            <option value="Garderie de nuit">Garderie de nuit</option>
        </select>
        <button onclick="searchUsers()">Rechercher</button>

        <!-- Tableau des résultats -->
        <table id="userTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pays</th>
                    <th>Services</th>
                    <th>Disponibilité</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les résultats de recherche apparaîtront ici -->
            </tbody>
        </table>
    </section>

    <!-- Script JavaScript -->
    <script>
        async function searchUsers() {
            const searchInput = document.getElementById('searchInput').value;
            const serviceFilter = Array.from(document.getElementById('serviceFilter').selectedOptions)
                .map(option => option.value)
                .join(',');

            // Appel de l'API backend
            const response = await fetch(`getUsers.php?search=${searchInput}&services=${serviceFilter}`);
            const users = await response.json();

            // Affichage des résultats
            const userTable = document.getElementById('userTable').getElementsByTagName('tbody')[0];
            userTable.innerHTML = ''; // Réinitialiser le tableau

            users.forEach(user => {
                const row = userTable.insertRow();
                row.insertCell(0).textContent = user.name;
                row.insertCell(1).textContent = user.country;
                row.insertCell(2).textContent = user.services;
                row.insertCell(3).textContent = user.availability;
            });
        }
    </script>
</body>
</html>
