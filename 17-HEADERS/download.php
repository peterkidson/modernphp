<?php

const FILENAME = __DIR__ . '../../images/IMG_0294.jpeg';

header('Content-Type: image/jpeg');
header('Content-Disposition: attachment; filename=theimage.jpg');
header('Content-Length: ' . filesize(FILENAME));

readfile(FILENAME);

