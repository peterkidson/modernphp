<?php

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


function ep($name) {
	return e(!empty($_POST[$name]) ? $_POST[$name] : '');
}


