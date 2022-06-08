#!/usr/local/bin/php
<?php
	if ($argc == 2)
	{
		$url = $argv[1];
		if (filter_var($url, FILTER_VALIDATE_URL))
		{
//			$folder = parse_url($url)['host'];
			$dir = preg_replace('#^https?://#', '', $url);
			$dir = preg_replace('/\/.*$/', '', $dir);
			if (!file_exists($dir))
				mkdir("$dir");
			$page = file_get_contents($url);
			if ($page)
			{
				preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $page, $matches);
				foreach ($matches[1] as $pic)
				{
					$pic = preg_replace('/(\?.*)/', '', $pic);
					$path = $dir . "/" . basename($pic);
					$file = fopen($path, 'w+');
					$host = curl_init($pic);
					curl_setopt($host, CURLOPT_FILE, $file);
					curl_setopt($host, CURLOPT_TIMEOUT, $file);
					curl_setopt($host, CURLOPT_CONNECTTIMEOUT, $file);
					curl_exec($host);
					curl_close($host);
					fclose($file);
				}
			}
		}
	}
?>