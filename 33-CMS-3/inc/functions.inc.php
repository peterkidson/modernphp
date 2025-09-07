<?php

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function epost($name) {
	return e(!empty($_POST[$name]) ? $_POST[$name] : '');
}

function csrfToken() {
	global $container;
	$csrfHelper = $container->get('csrfHelper');
	return $csrfHelper->generateToken();
}


