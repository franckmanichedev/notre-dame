<?php
header('Content-Type: application/json; charset=utf-8');

// Chemins absolus
define('ROOT_PATH', dirname(__DIR__));
$cache_dir = ROOT_PATH.'/api/cache';
$local_dir = ROOT_PATH.'/api/local_lectures';

// Vérification des dossiers
if (!is_dir($cache_dir)) mkdir($cache_dir, 0755, true);
if (!is_dir($local_dir)) mkdir($local_dir, 0755, true);

$current_date = date('Y-m-d');
$cache_file = "$cache_dir/$current_date.json";
$local_file = "$local_dir/$current_date.json";

// Fonction pour formater les données
function formatLectures($data) {
    if (empty($data['messes'])) return [];
    
    $formatted = [];
    foreach ($data['messes'] as $messe) {
        if (!empty($messe['lectures'])) {
            foreach ($messe['lectures'] as $lecture) {
                $formatted[] = [
                    'type' => $lecture['type'] ?? 'lecture',
                    'titre' => $lecture['titre'] ?? '',
                    'reference' => $lecture['ref'] ?? '',
                    'contenu' => $lecture['contenu'] ?? ''
                ];
            }
        }
    }
    return $formatted;
}

// Tentative API
$api_url = "https://api.aelf.org/v1/messes/$current_date/afrique";
$api_response = @file_get_contents($api_url);

if ($api_response !== false) {
    $api_data = json_decode($api_response, true);
    $response = [
        'status' => 'success',
        'date' => $current_date,
        'lectures' => formatLectures($api_data),
        'source' => 'api'
    ];
    file_put_contents($cache_file, json_encode($response));
} elseif (file_exists($local_file)) {
    $local_data = json_decode(file_get_contents($local_file), true);
    $response = [
        'status' => 'success',
        'date' => $current_date,
        'lectures' => formatLectures($local_data),
        'source' => 'local'
    ];
} else {
    $response = [
        'status' => 'error',
        'message' => 'Aucune donnée disponible',
        'date' => $current_date
    ];
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>