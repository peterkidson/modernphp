<?php

header('Content-Type: text/plain; charset=utf-8');


$htmlContent = '<div class="main-section">
<p>Explore the wonders of our <i>unique</i> platform. Below are key links for navigation:</p>
<a href="http://example.com/services">Our Services</a>
<a href="http://example.com/contact" title="Get in touch">Get in Touch</a>
<img src="welcome.png">
<img src="our-mission.jpg" alt="Our Mission">
</div>';

//echo $htmlContent;

preg_match_all('/href="(.*)"/', $htmlContent, $matches);
var_dump($matches);
var_dump($1);