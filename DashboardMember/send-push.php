<?php
require_once '../config/config.php';
require '/vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

$auth = [
    'VAPID' => [
        'subject' => 'mailto:zidanealfareshy@gmail.com',
        'publicKey' => 'BCQBTd3KQxUfFvhBuTdOtPuhIu4FDdBw2dtm4aFNr23PlnGvpa9EWyTuQNybmiM31bgCsc5pSs9kO9x03DH71fA',
        'privateKey' => 'ahSWfhyUI9PVQl3ZW1o7-yZlKJMyrnIrihpnhMQEn90'
    ],
];

$webPush = new WebPush($auth);

$query = "SELECT * FROM subscriptions";
$result = $connection->query($query);

$subscriptions = [];
while ($row = $result->fetch_assoc()) {
    $subscriptions[] = Subscription::create([
        'endpoint' => $row['endpoint'],
        'keys' => [
            'auth' => $row['keys_auth'],
            'p256dh' => $row['keys_p256dh']
        ]
    ]);
}

$query = "SELECT b.judul, p.tgl_pengembalian, p.nisn 
          FROM peminjaman p 
          JOIN buku b ON p.id_buku = b.id_buku 
          WHERE p.tgl_pengembalian <= DATE_ADD(CURDATE(), INTERVAL 2 DAY) 
          AND p.tgl_pengembalian >= CURDATE()";
$result = $connection->query($query);

while ($book = $result->fetch_assoc()) {
    foreach ($subscriptions as $subscription) {
        $webPush->sendNotification(
            $subscription,
            json_encode([
                'title' => 'Pengingat Buku',
                'body' => 'Buku "' . $book['judul'] . '" mendekati tenggat waktu pengembalian.',
            ])
        );
    }
}

foreach ($webPush->flush() as $report) {
    $endpoint = $report->getRequest()->getUri()->__toString();

    if ($report->isSuccess()) {
        echo "[v] Message sent successfully for subscription {$endpoint}.";
    } else {
        echo "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
    }
}
?>
