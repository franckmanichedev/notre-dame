<?php
    $test_url = 'https://api.aelf.org/v1/messes/' . date('Y-m-d') . '/afrique';
    $response = file_get_contents($test_url);

    if ($response === false) {
        echo "<h3>Erreur de connexion</h3>";
        echo "<p>Vérifiez :</p>";
        echo "<ol>";
        echo "<li>Connectivité Internet</li>";
        echo "<li>Configuration PHP (allow_url_fopen=On)</li>";
        echo "<li>Firewall/Pare-feu</li>";
        echo "</ol>";
        
        // Test alternatif
        echo '<h4>Test cURL :</h4>';
        $ch = curl_init($test_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_res = curl_exec($ch);
        echo curl_errno($ch) ? "Erreur cURL: " . curl_error($ch) : "Réponse cURL OK";
        curl_close($ch);
    } else {
        echo "<h3>Connexion API réussie !</h3>";
        echo "<pre>" . json_encode(json_decode($response), JSON_PRETTY_PRINT) . "</pre>";
    }
?>