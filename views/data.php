<?php
	$negara = array(
		"Indonesia", "Malaysia", "Amerika"
	);
	public function readCountry(Type $var = null)
	{
		foreach ($negara as $value) {
			echo $value;
		}
	}
?>