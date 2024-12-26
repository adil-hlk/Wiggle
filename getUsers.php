<?php
// Récupérer les paramètres de recherche
$search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
$services = isset($_GET['services']) ? sanitize_text_field($_GET['services']) : '';

// Construire la requête pour rechercher les utilisateurs
$args = [
    'meta_query' => [],
    'search'     => '*' . $search . '*',
    'search_columns' => ['display_name', 'user_email'],
];

// Ajouter un filtre pour les services si fourni
if (!empty($services)) {
    $service_list = explode(',', $services);

    $args['meta_query'][] = [
        'key'     => 'services',
        'value'   => $service_list,
        'compare' => 'IN',
    ];
}

// Récupérer les utilisateurs correspondants
$user_query = new WP_User_Query($args);
$users = [];

if (!empty($user_query->get_results())) {
    foreach ($user_query->get_results() as $user) {
        $users[] = [
            'ID'         => $user->ID,
            'display_name' => $user->display_name,
            'services'   => explode(',', get_user_meta($user->ID, 'services', true)),
        ];
    }
}


// Retourner les résultats sous forme de JSON
echo json_encode($users);
exit;