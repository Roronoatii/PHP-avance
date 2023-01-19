<?php
function getRandomIban()
{
	$iban = "FR";
	for ($i = 0; $i < 5; $i++) {
		$iban .= strval(rand(10000, 99999));
	}
	return $iban;
}