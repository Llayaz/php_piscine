<?php 
	function ft_is_sort($arr)
	{
		$sorted = $arr;
		sort($sorted);
		if ($sorted != $arr)
			return false;
		return true;
	}
 ?>