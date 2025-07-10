<?php
require_once __DIR__.'/../../config/dbconfig.php';
require_once __DIR__.'/../../middleware/adminMiddleware.php';

header('Content-Type: application/json');

try {
    // Récupérer toutes les messes (régulières et spéciales)
    $query = "SELECT id, `type`, 
              CASE WHEN `type` = 'regular' THEN day_of_week ELSE DAYOFWEEK(`date`) END as day_num,
              `time`, `date`, occasion, notes 
              FROM messe";
    
    $result = mysqli_query($con, $query);
    
    $events = [];
    $daysMap = [1 => 0, 2 => 1, 3 => 2, 4 => 3, 5 => 4, 6 => 5, 7 => 6]; // Conversion pour FullCalendar
    
    if(mysqli_num_rows($result) > 0) {
        while($mass = mysqli_fetch_assoc($result)) {
            if($mass['type'] === 'regular') {
                // Pour les messes régulières (événements récurrents)
                $events[] = [
                    'id' => 'r'.$mass['id'],
                    'title' => 'Messe: '.($mass['occasion'] ?: 'Messe régulière'),
                    'startTime' => $mass['time'],
                    'daysOfWeek' => [$daysMap[$mass['day_num']], // FullCalendar: 0=dimanche, 1=lundi, etc.
                    'allDay' => false,
                    'color' => '#28a745',
                    'extendedProps' => [
                        'type' => 'regular',
                        'notes' => $mass['notes']
                    ],
                    'display' => 'auto'
                ];
            } else {
                // Pour les messes spéciales (événements ponctuels)
                $events[] = [
                    'id' => 's'.$mass['id'],
                    'title' => 'Messe: '.$mass['occasion'],
                    'start' => $mass['date'].'T'.$mass['time'],
                    'allDay' => false,
                    'color' => '#dc3545',
                    'extendedProps' => [
                        'type' => 'special',
                        'notes' => $mass['notes']
                    ],
                    'display' => 'auto'
                ];
            }
        }
    }
    
    echo json_encode($events);
    
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>