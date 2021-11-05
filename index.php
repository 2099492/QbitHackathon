<?php
require __DIR__ . '/vendor/autoload.php';
//xml fetch link and put in array
$xml = simplexml_load_file('BWBR0001854_2021-07-01_0.xml');
$xml_array = json_decode(json_encode($xml), true);
foreach ($xml_array['wetgeving']['wet-besluit']['wettekst']['boek'] as $wetboeken){
    foreach($wetboeken['titeldeel'] as $titeldeel) {
        foreach ($titeldeel['artikel'] as $wet) {
//            dd($wet['kop']['nr']);
            echo '<h1>Artikel: ' . $wet['kop']['nr'] . '</h1>';
            foreach ($wet['lid'] as $data) {
                echo '<h2>' . $data['lidnr'] . '</h2>';
                echo '<p>' . $data['al'] . '</p>';
            }
        }
    }
}



?>

<form action="/" method="post">
    <input type="search" name="art_nummer">
    <input type="submit">
</form>