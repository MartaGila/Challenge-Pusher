<?php
// Primero, ejecute  'composer require pusher/pusher-php-server'
require __DIR__ . '/vendor/autoload.php';

$pusher = new Pusher\Pusher(
    "cd1d2621fa7c15a422ba",
    "a4e6384bd0a63e9c5812",
    "1760128",
    array(
        'cluster' => 'eu'
    )
);

for ($i = 0; $i <= 9; $i++) {
    $xValues = ["Java", "React", "PHP", "Angular", "Python", "C#"];
    $yValues = [];

    for ($j = 0; $j < count($xValues); $j++) {
        $yValues[] = rand(1000, 5000);
    }

    $pusher->trigger('market-cap', 'new-price', array('values' => $yValues));

    //sleep(3);
    time_nanosleep(1, 0);
}

header("Location: index.html");
exit();
?>
