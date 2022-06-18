<?php 

	$data = (isset($_POST))? $_POST : "";
	$str = "";

	if ($data != "")
	{
		for ($i = 0; $i < count($data['items']); $i++)
		{
			$str = $str . $i . ";" . $data['items'][$i] . $data['separator'];
		}
	}
	file_put_contents('list.csv', $str);
	echo($str);
?>