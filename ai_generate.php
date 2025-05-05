<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$naslov = $input['naslov'] ?? '';
$podnaslov = $input['podnaslov'] ?? '';
$kljucneRijeci = $input['kljucneRijeci'] ?? '';

if (!$naslov || !$podnaslov || !$kljucneRijeci) {
    echo json_encode(['success' => false, 'error' => 'Nedostaju podaci.']);
    exit;
}

$prompt = "Napiši blog na temu:\nNaslov: $naslov\nPodnaslov: $podnaslov\nKljučne riječi: $kljucneRijeci\n\nNapiši uvod, 2-3 paragrafa razrade i zaključak. Koristi angažovan, edukativan ton. Ne ponavljaj rečenice.";

$data = [
    "model" => "llama3",
    "prompt" => $prompt,
    "stream" => false
];

$ch = curl_init('http://localhost:11434/api/generate');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => ['Content-Type: application/json']
]);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$content = $result['response'] ?? '';

if (!$content) {
    echo json_encode(['success' => false, 'error' => 'Nema sadržaja u odgovoru.']);
    exit;
}

echo json_encode(['success' => true, 'content' => nl2br(htmlspecialchars($content))]);
