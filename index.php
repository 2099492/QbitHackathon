<?php
require __DIR__ . '/vendor/autoload.php';
//xml fetch link and put in array
$xml = simplexml_load_file('BWBR0001854_2021-07-01_0.xml');
$xml_array = json_decode(json_encode($xml), true);

$wetten = [];

foreach ($xml_array['wetgeving']['wet-besluit']['wettekst']['boek'] as $wetboeken){
    foreach($wetboeken['titeldeel'] as $titeldeel) {
        foreach ($titeldeel['artikel'] as $wet) {
//            if (!empty($wet['kop']['nr'])) {
//                echo '<h1>Artikel: ' . $wet['kop']['nr'] . '</h1>';
//            }
            if (!empty($wet['lid'])) {
                foreach ($wet['lid'] as $data) {
//                    if (!empty($data['lidnr'])) {
//                        echo '<h2>' . $data['lidnr'] . '</h2>';
//                    }
//                    if (!empty($data['al'])) {
//                        echo '<p>' . $data['al'] . '</p>';
//                    }
                    array_push($wetten, ['artikel' => $wet['kop']['nr'], 'wet_id' => $data['lidnr'], 'wet_text' => $data['al']]);
                }
            }
        }
    }
}

dd($wetten);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/" method="post">
    <input type="search" name="art_nummer">
    dshfudshf
    <input type="submit">
</form>
</body>
</html>