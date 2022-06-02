#!/usr/local/bin/php
<?php
	function ft_split($str)
	{
		$words = array_filter(explode(' ', $str));
		sort($words);
		return($words);
	}
?>