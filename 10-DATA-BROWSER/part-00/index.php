<pre>
<?php

$rawJsonIndexFile = file_get_contents(__DIR__ . '/../data/index.json');

$indexJsonDecoded = json_decode($rawJsonIndexFile);
$berlinDataFileDecompressed = file_get_contents('compress.bzip2://' . __DIR__ . '/../data/berlin.json.bz2');
$berlinDataJsonDecoded = json_decode($berlinDataFileDecompressed);
$berlinDataArray = json_decode($berlinDataFileDecompressed,true);
$eg1 = $berlinDataArray['results'][0];

echo var_dump($eg1);
?>
</pre>
