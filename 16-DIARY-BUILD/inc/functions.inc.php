<?php

function e($value)
{
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
function nl($value = "\n")
{
	echo nl2br(e($value));
}
