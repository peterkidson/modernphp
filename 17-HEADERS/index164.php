<?php

//include './haswhitespace.php';
const BUFSIZE = 4096;

for ($i=1; $i<BUFSIZE; $i++) { echo ' ';}

header('Content-type: text/plain');

var_dump(ini_get('output_buffering'));

echo file_get_contents('pg1513.txt');
